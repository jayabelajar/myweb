<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('admin.blog.index', [
            'title' => 'Blog Posts',
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('admin.blog.create', [
            'title' => 'New Post',
            'categories' => Category::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['required', 'string'],
            'intro' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'author' => ['nullable', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer', 'exists:tags,id'],
        ]);

        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['title']);
        $data['read_time'] = $this->estimateReadTime($data['content'], $data['intro'] ?? '', $data['excerpt'] ?? '');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post = Post::create($data);
        $post->tags()->sync($data['tags'] ?? []);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Post created.');
        }

        return redirect()->route('admin.blog.index')->with('success', 'Post created.');
    }

    public function edit(Post $blog)
    {
        return view('admin.blog.edit', [
            'title' => 'Edit Post',
            'post' => $blog,
            'categories' => Category::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Post $blog)
    {
        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['required', 'string'],
            'intro' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'author' => ['nullable', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer', 'exists:tags,id'],
        ]);

        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['title']);
        $data['read_time'] = $this->estimateReadTime($data['content'], $data['intro'] ?? '', $data['excerpt'] ?? '');
        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        } else {
            unset($data['image']);
        }

        $blog->update($data);
        $blog->tags()->sync($data['tags'] ?? []);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Post updated.');
        }

        return redirect()->route('admin.blog.index')->with('success', 'Post updated.');
    }

    public function destroy(Post $blog)
    {
        $blog->tags()->detach();
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Post deleted.');
    }

    private function estimateReadTime(string $content, string $intro = '', string $excerpt = ''): string
    {
        $source = trim($content . "\n\n" . $intro . "\n\n" . $excerpt);
        $plain = trim(strip_tags((string) Str::markdown($source)));
        $words = 0;
        if ($plain !== '') {
            preg_match_all('/\\p{L}+/u', $plain, $matches);
            $words = count($matches[0] ?? []);
        }
        $minutes = max(1, (int) ceil($words / 200));
        return $minutes . ' min read';
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
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
            'sections' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:2048'],
            'author' => ['nullable', 'string', 'max:255'],
            'read_time' => ['nullable', 'string', 'max:50'],
            'published_at' => ['nullable', 'date'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer', 'exists:tags,id'],
        ]);

        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['title']);
        $data['sections'] = $this->decodeSections($data['sections'] ?? null);

        $post = Post::create($data);
        $post->tags()->sync($data['tags'] ?? []);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Post created.');
        }

        return redirect()->route('admin.blog.index')->with('success', 'Post created.');
    }

    public function edit(Post $post)
    {
        return view('admin.blog.edit', [
            'title' => 'Edit Post',
            'post' => $post,
            'categories' => Category::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['required', 'string'],
            'intro' => ['nullable', 'string'],
            'sections' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:2048'],
            'author' => ['nullable', 'string', 'max:255'],
            'read_time' => ['nullable', 'string', 'max:50'],
            'published_at' => ['nullable', 'date'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer', 'exists:tags,id'],
        ]);

        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['title']);
        $data['sections'] = $this->decodeSections($data['sections'] ?? null);

        $post->update($data);
        $post->tags()->sync($data['tags'] ?? []);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Post updated.');
        }

        return redirect()->route('admin.blog.index')->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Post deleted.');
    }

    private function decodeSections(?string $value): ?array
    {
        if (!$value) {
            return null;
        }
        $decoded = json_decode($value, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }
        return $decoded;
    }
}

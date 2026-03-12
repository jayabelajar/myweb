<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;

class BlogController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $query = Post::with('category')
            ->whereNotNull('published_at');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhereHas('category', function($q2) use ($search) {
                      $q2->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $posts = $query->orderByDesc('published_at')->get();

        return view('blog.index', [
            'title' => 'Blog',
            'posts' => $posts,
        ]);
    }

    public function show(string $slug)
    {
        $post = Post::with(['category', 'tags'])
            ->whereNotNull('published_at')
            ->where('slug', $slug)
            ->first();

        if (!$post) {
            return response()->view('blog.show', [
                'title' => 'Artikel Tidak Ditemukan',
                'post' => null,
                'posts' => collect(),
                'topTags' => collect(),
            ], 404);
        }

        $posts = Post::with('category')
            ->whereNotNull('published_at')
            ->where('id', '!=', $post->id)
            ->orderByDesc('published_at')
            ->get();

        $topTags = Tag::withCount('posts')
            ->orderByDesc('posts_count')
            ->take(5)
            ->get();

        return view('blog.show', [
            'title' => $post ? $post->title : 'Blog Detail',
            'post' => $post,
            'posts' => $posts,
            'topTags' => $topTags,
        ]);
    }
}

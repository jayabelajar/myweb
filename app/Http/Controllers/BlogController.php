<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')
            ->orderByDesc('published_at')
            ->get();

        return view('blog.index', [
            'title' => 'Blog',
            'posts' => $posts,
        ]);
    }

    public function show(string $slug)
    {
        $post = Post::with(['category', 'tags'])
            ->where('slug', $slug)
            ->first();

        $posts = Post::with('category')
            ->when($post, fn($query) => $query->where('id', '!=', $post->id))
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

<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class BlogTagController extends Controller
{
    public function show(string $slug)
    {
        $tag = Tag::where('slug', $slug)->first();

        $posts = $tag
            ? $tag->posts()->with('category')->orderByDesc('published_at')->get()
            : collect();

        return view('blog.tag', [
            'title' => $tag ? $tag->name : 'Blog Tag',
            'tag' => $tag,
            'posts' => $posts,
        ]);
    }
}

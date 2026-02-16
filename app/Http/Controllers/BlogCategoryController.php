<?php

namespace App\Http\Controllers;

use App\Models\Category;

class BlogCategoryController extends Controller
{
    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)->first();

        $posts = $category
            ? $category->posts()->orderByDesc('published_at')->get()
            : collect();

        return view('blog.category', [
            'title' => $category ? $category->name : 'Blog Category',
            'category' => $category,
            'posts' => $posts,
        ]);
    }
}

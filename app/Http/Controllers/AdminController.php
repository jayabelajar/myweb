<?php

namespace App\Http\Controllers;

use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('published_at')->take(5)->get();
        $totalPosts = Post::count();
        $drafts = Post::whereNull('published_at')->count();

        return view('admin.index', [
            'title' => 'Admin Panel',
            'posts' => $posts,
            'totalPosts' => $totalPosts,
            'drafts' => $drafts,
        ]);
    }
}

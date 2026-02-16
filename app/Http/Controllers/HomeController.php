<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();
        $posts = Post::with('category')
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('home', [
            'title' => 'Home',
            'services' => $services,
            'posts' => $posts,
        ]);
    }
}

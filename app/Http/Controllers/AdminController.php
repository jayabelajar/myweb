<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(5)->get();
        $totalPosts = Post::count();
        $totalProjects = Project::count();
        $totalServices = Service::count();
        $totalTestimonials = Testimonial::count();

        return view('admin.index', [
            'title' => 'Admin Panel',
            'posts' => $posts,
            'totalPosts' => $totalPosts,
            'totalProjects' => $totalProjects,
            'totalServices' => $totalServices,
            'totalTestimonials' => $totalTestimonials,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;
use App\Models\HomepageSection;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();
        $homeSections = HomepageSection::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
        $posts = Post::with('category')
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->take(3)
            ->get();
        $companyTestimonials = Testimonial::query()
            ->where('type', Testimonial::TYPE_COMPANY)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
        $personTestimonials = Testimonial::query()
            ->where('type', Testimonial::TYPE_PERSON)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('home', [
            'title' => 'Home',
            'services' => $services,
            'posts' => $posts,
            'homeSections' => $homeSections,
            'companyTestimonials' => $companyTestimonials,
            'personTestimonials' => $personTestimonials,
        ]);
    }
}

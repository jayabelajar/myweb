<?php

namespace App\Http\Controllers;

use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();

        return view('home', [
            'title' => 'Home',
            'services' => $services,
        ]);
    }
}

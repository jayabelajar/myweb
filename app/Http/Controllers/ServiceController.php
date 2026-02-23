<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();

        return view('services', [
            'title' => 'Services',
            'services' => $services,
        ]);
    }
}


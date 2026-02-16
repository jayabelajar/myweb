<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();

        return view('projects', [
            'title' => 'Projects',
            'projects' => $projects,
        ]);
    }
}

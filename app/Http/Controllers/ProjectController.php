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

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        
        return view('project.show', [
            'title' => $project->title,
            'project' => $project,
        ]);
    }
}

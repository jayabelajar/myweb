<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('created_at')->paginate(12);

        return view('admin.projects.index', [
            'title' => 'Projects',
            'projects' => $projects,
        ]);
    }

    public function create()
    {
        return view('admin.projects.create', [
            'title' => 'New Project',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'stack' => ['nullable', 'string'],
            'link' => ['nullable', 'string', 'max:2048'],
        ]);

        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['title']);
        $data['stack'] = $data['stack'] ? array_values(array_filter(array_map('trim', explode(',', $data['stack'])))) : [];
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Project created.');
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', [
            'title' => 'Edit Project',
            'project' => $project,
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'stack' => ['nullable', 'string'],
            'link' => ['nullable', 'string', 'max:2048'],
        ]);

        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['title']);
        $data['stack'] = $data['stack'] ? array_values(array_filter(array_map('trim', explode(',', $data['stack'])))) : [];
        if ($request->hasFile('image')) {
            if ($project->image && !Str::startsWith($project->image, ['http://', 'https://', '//'])) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        } else {
            unset($data['image']);
        }

        $project->update($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Project updated.');
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        if ($project->image && !Str::startsWith($project->image, ['http://', 'https://', '//'])) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }
}

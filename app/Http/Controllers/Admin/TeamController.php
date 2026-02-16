<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('sort_order')->orderByDesc('created_at')->paginate(12);

        return view('admin.teams.index', [
            'title' => 'Teams',
            'teams' => $teams,
        ]);
    }

    public function create()
    {
        return view('admin.teams.create', [
            'title' => 'New Team Member',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'photo_url' => ['nullable', 'image', 'max:4096'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'dribbble_url' => ['nullable', 'url', 'max:255'],
            'behance_url' => ['nullable', 'url', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        if ($request->hasFile('photo_url')) {
            $data['photo_url'] = $request->file('photo_url')->store('teams', 'public');
        }

        Team::create($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Team member created.');
        }

        return redirect()->route('admin.teams.index')->with('success', 'Team member created.');
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', [
            'title' => 'Edit Team Member',
            'team' => $team,
        ]);
    }

    public function update(Request $request, Team $team)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'photo_url' => ['nullable', 'image', 'max:4096'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'dribbble_url' => ['nullable', 'url', 'max:255'],
            'behance_url' => ['nullable', 'url', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        if ($request->hasFile('photo_url')) {
            if ($team->photo_url && !Str::startsWith($team->photo_url, ['http://', 'https://', '//'])) {
                Storage::disk('public')->delete($team->photo_url);
            }
            $data['photo_url'] = $request->file('photo_url')->store('teams', 'public');
        } else {
            unset($data['photo_url']);
        }

        $team->update($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Team member updated.');
        }

        return redirect()->route('admin.teams.index')->with('success', 'Team member updated.');
    }

    public function destroy(Team $team)
    {
        if ($team->photo_url && !Str::startsWith($team->photo_url, ['http://', 'https://', '//'])) {
            Storage::disk('public')->delete($team->photo_url);
        }
        $team->delete();

        return redirect()->route('admin.teams.index')->with('success', 'Team member deleted.');
    }

}

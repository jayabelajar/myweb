<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

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
            'photo_url' => ['nullable', 'string', 'max:2048'],
            'socials' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $data['socials'] = $data['socials']
            ? $this->normalizeSocials($data['socials'])
            : [];

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
            'photo_url' => ['nullable', 'string', 'max:2048'],
            'socials' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $data['socials'] = $data['socials']
            ? $this->normalizeSocials($data['socials'])
            : [];

        $team->update($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Team member updated.');
        }

        return redirect()->route('admin.teams.index')->with('success', 'Team member updated.');
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('admin.teams.index')->with('success', 'Team member deleted.');
    }

    private function normalizeSocials(string $value): array
    {
        $items = array_filter(array_map('trim', explode(',', $value)));
        $socials = [];
        foreach ($items as $item) {
            if (!str_contains($item, ':')) {
                continue;
            }
            [$key, $url] = array_map('trim', explode(':', $item, 2));
            if ($key && $url) {
                $socials[$key] = $url;
            }
        }
        return $socials;
    }
}

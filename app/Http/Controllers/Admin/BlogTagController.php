<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogTagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('name')->paginate(20);

        return view('admin.blog.tags.index', [
            'title' => 'Blog Tags',
            'tags' => $tags,
        ]);
    }

    public function create()
    {
        return view('admin.blog.tags.create', [
            'title' => 'New Tag',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
        ]);

        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['name']);

        Tag::create($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Tag created.');
        }

        return redirect()->route('admin.blog.tags.index')->with('success', 'Tag created.');
    }

    public function edit(Tag $tag)
    {
        return view('admin.blog.tags.edit', [
            'title' => 'Edit Tag',
            'tag' => $tag,
        ]);
    }

    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
        ]);

        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['name']);

        $tag->update($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Tag updated.');
        }

        return redirect()->route('admin.blog.tags.index')->with('success', 'Tag updated.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.blog.tags.index')->with('success', 'Tag deleted.');
    }
}

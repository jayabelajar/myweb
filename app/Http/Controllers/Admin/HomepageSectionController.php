<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSection;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HomepageSectionController extends Controller
{
    public function index()
    {
        $sections = HomepageSection::orderBy('sort_order')
            ->orderBy('id')
            ->paginate(20);

        return view('admin.homepage-sections.index', [
            'title' => 'Homepage Sections',
            'sections' => $sections,
        ]);
    }

    public function create()
    {
        return view('admin.homepage-sections.create', [
            'title' => 'New Homepage Section',
            'availableSections' => HomepageSection::availableSections(),
        ]);
    }

    public function store(Request $request)
    {
        $keys = array_keys(HomepageSection::availableSections());

        $data = $request->validate([
            'key' => ['required', 'string', Rule::in($keys), 'max:50', 'unique:homepage_sections,key'],
            'name' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        HomepageSection::create($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Homepage section created.');
        }

        return redirect()->route('admin.homepage-sections.index')->with('success', 'Homepage section created.');
    }

    public function edit(HomepageSection $homepageSection)
    {
        return view('admin.homepage-sections.edit', [
            'title' => 'Edit Homepage Section',
            'section' => $homepageSection,
            'availableSections' => HomepageSection::availableSections(),
        ]);
    }

    public function update(Request $request, HomepageSection $homepageSection)
    {
        $keys = array_keys(HomepageSection::availableSections());

        $data = $request->validate([
            'key' => [
                'required',
                'string',
                Rule::in($keys),
                'max:50',
                Rule::unique('homepage_sections', 'key')->ignore($homepageSection->id),
            ],
            'name' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        $homepageSection->update($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Homepage section updated.');
        }

        return redirect()->route('admin.homepage-sections.index')->with('success', 'Homepage section updated.');
    }

    public function destroy(HomepageSection $homepageSection)
    {
        $homepageSection->delete();

        return redirect()->route('admin.homepage-sections.index')->with('success', 'Homepage section deleted.');
    }
}

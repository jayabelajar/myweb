<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('type')
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('admin.testimonials.index', [
            'title' => 'Testimonials',
            'testimonials' => $testimonials,
        ]);
    }

    public function create()
    {
        return view('admin.testimonials.create', [
            'title' => 'New Testimonial',
            'types' => Testimonial::typeOptions(),
        ]);
    }

    public function store(Request $request)
    {
        $types = array_keys(Testimonial::typeOptions());

        $data = $request->validate([
            'type' => ['required', Rule::in($types)],
            'name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'quote' => ['nullable', 'string'],
            'badge' => ['nullable', 'string', 'max:20'],
            'photo_url' => ['nullable', 'image', 'max:4096'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');
        if ($request->hasFile('photo_url')) {
            $data['photo_url'] = $request->file('photo_url')->store('testimonials', 'public');
        }
        if ($data['type'] === Testimonial::TYPE_COMPANY) {
            $data['quote'] = null;
            if (!empty($data['photo_url']) && !Str::startsWith($data['photo_url'], ['http://', 'https://', '//'])) {
                Storage::disk('public')->delete($data['photo_url']);
            }
            $data['photo_url'] = null;
        }

        Testimonial::create($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Testimonial created.');
        }

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', [
            'title' => 'Edit Testimonial',
            'testimonial' => $testimonial,
            'types' => Testimonial::typeOptions(),
        ]);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $types = array_keys(Testimonial::typeOptions());

        $data = $request->validate([
            'type' => ['required', Rule::in($types)],
            'name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'quote' => ['nullable', 'string'],
            'badge' => ['nullable', 'string', 'max:20'],
            'photo_url' => ['nullable', 'image', 'max:4096'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');
        if ($request->hasFile('photo_url')) {
            if ($testimonial->photo_url && !Str::startsWith($testimonial->photo_url, ['http://', 'https://', '//'])) {
                Storage::disk('public')->delete($testimonial->photo_url);
            }
            $data['photo_url'] = $request->file('photo_url')->store('testimonials', 'public');
        } else {
            unset($data['photo_url']);
        }
        if ($data['type'] === Testimonial::TYPE_COMPANY) {
            $data['quote'] = null;
            if ($testimonial->photo_url && !Str::startsWith($testimonial->photo_url, ['http://', 'https://', '//'])) {
                Storage::disk('public')->delete($testimonial->photo_url);
            }
            $data['photo_url'] = null;
        }

        $testimonial->update($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Testimonial updated.');
        }

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo_url && !Str::startsWith($testimonial->photo_url, ['http://', 'https://', '//'])) {
            Storage::disk('public')->delete($testimonial->photo_url);
        }
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted.');
    }
}

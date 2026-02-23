<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->orderByDesc('created_at')->paginate(12);

        return view('admin.services.index', [
            'title' => 'Services',
            'services' => $services,
        ]);
    }

    public function create()
    {
        return view('admin.services.create', [
            'title' => 'New Package',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:80'],
            'price' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'benefits' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['benefits'] = $this->normalizeBenefits($data['benefits'] ?? null);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Package created.');
        }

        return redirect()->route('admin.services.index')->with('success', 'Package created.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', [
            'title' => 'Edit Package',
            'service' => $service,
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:80'],
            'price' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'benefits' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['benefits'] = $this->normalizeBenefits($data['benefits'] ?? null);
        if ($request->hasFile('image')) {
            if ($service->image && !Str::startsWith($service->image, ['http://', 'https://', '//'])) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        } else {
            unset($data['image']);
        }

        $service->update($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Package updated.');
        }

        return redirect()->route('admin.services.index')->with('success', 'Package updated.');
    }

    public function destroy(Service $service)
    {
        if ($service->image && !Str::startsWith($service->image, ['http://', 'https://', '//'])) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Package deleted.');
    }

    private function normalizeBenefits(?string $benefits): ?array
    {
        if (!$benefits) {
            return null;
        }

        $lines = preg_split('/\r\n|\r|\n/', $benefits) ?: [];
        $normalized = [];

        foreach ($lines as $line) {
            $value = trim($line);
            if ($value !== '') {
                $normalized[] = $value;
            }
        }

        return $normalized !== [] ? $normalized : null;
    }
}


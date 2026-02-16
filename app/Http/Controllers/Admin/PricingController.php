<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicePlan;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $plans = ServicePlan::orderBy('sort_order')->orderByDesc('created_at')->paginate(12);

        return view('admin.pricing.index', [
            'title' => 'Pricing',
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        return view('admin.pricing.create', [
            'title' => 'New Pricing Plan',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'features' => ['nullable', 'string'],
            'highlight' => ['nullable', 'boolean'],
            'cta_label' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['features'] = $this->normalizeFeatures($data['features'] ?? '');
        $data['highlight'] = (bool) ($data['highlight'] ?? false);
        $data['cta_label'] = $data['cta_label'] ?: 'Konsultasi';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        ServicePlan::create($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Pricing plan created.');
        }

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing plan created.');
    }

    public function edit(ServicePlan $pricing)
    {
        return view('admin.pricing.edit', [
            'title' => 'Edit Pricing Plan',
            'plan' => $pricing,
        ]);
    }

    public function update(Request $request, ServicePlan $pricing)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'features' => ['nullable', 'string'],
            'highlight' => ['nullable', 'boolean'],
            'cta_label' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['features'] = $this->normalizeFeatures($data['features'] ?? '');
        $data['highlight'] = (bool) ($data['highlight'] ?? false);
        $data['cta_label'] = $data['cta_label'] ?: 'Konsultasi';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $pricing->update($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Pricing plan updated.');
        }

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing plan updated.');
    }

    public function destroy(ServicePlan $pricing)
    {
        $pricing->delete();

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing plan deleted.');
    }

    private function normalizeFeatures(string $input): array
    {
        $lines = preg_split('/\r\n|\r|\n/', $input);
        $lines = array_map(fn ($line) => trim($line), $lines ?: []);
        $lines = array_filter($lines, fn ($line) => $line !== '');

        return array_values($lines);
    }
}
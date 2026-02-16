<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkflowStep;
use Illuminate\Http\Request;

class WorkflowController extends Controller
{
    public function index()
    {
        $steps = WorkflowStep::orderBy('sort_order')->orderByDesc('created_at')->paginate(12);

        return view('admin.workflows.index', [
            'title' => 'Workflow',
            'steps' => $steps,
        ]);
    }

    public function create()
    {
        return view('admin.workflows.create', [
            'title' => 'New Workflow Step',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;

        WorkflowStep::create($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Workflow step created.');
        }

        return redirect()->route('admin.workflows.index')->with('success', 'Workflow step created.');
    }

    public function edit(WorkflowStep $workflow)
    {
        return view('admin.workflows.edit', [
            'title' => 'Edit Workflow Step',
            'workflow' => $workflow,
        ]);
    }

    public function update(Request $request, WorkflowStep $workflow)
    {
        $data = $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;

        $workflow->update($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Workflow step updated.');
        }

        return redirect()->route('admin.workflows.index')->with('success', 'Workflow step updated.');
    }

    public function destroy(WorkflowStep $workflow)
    {
        $workflow->delete();

        return redirect()->route('admin.workflows.index')->with('success', 'Workflow step deleted.');
    }
}
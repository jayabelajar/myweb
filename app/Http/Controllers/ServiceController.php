<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServicePlan;
use App\Models\WorkflowStep;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();
        $workflows = WorkflowStep::orderBy('sort_order')->get();
        $plans = ServicePlan::orderBy('sort_order')->get();

        return view('services', [
            'title' => 'Services',
            'services' => $services,
            'workflows' => $workflows,
            'plans' => $plans,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\WorkflowStep;
use Illuminate\Database\Seeder;

class WorkflowStepSeeder extends Seeder
{
    public function run(): void
    {
        $steps = [
            [
                'label' => '01. Discovery',
                'title' => 'Scope & Strategy',
                'description' => 'Align tujuan bisnis, user needs, dan KPI sejak awal.',
                'sort_order' => 1,
            ],
            [
                'label' => '02. Design',
                'title' => 'UX Architecture',
                'description' => 'Flow, prototipe, dan validasi cepat sebelum build.',
                'sort_order' => 2,
            ],
            [
                'label' => '03. Build',
                'title' => 'Engineering Sprint',
                'description' => 'Pengembangan modular dengan QA berlapis.',
                'sort_order' => 3,
            ],
            [
                'label' => '04. Launch',
                'title' => 'Go Live',
                'description' => 'Deploy aman, monitoring, dan handover rapi.',
                'sort_order' => 4,
            ],
        ];

        foreach ($steps as $step) {
            WorkflowStep::updateOrCreate(
                ['label' => $step['label']],
                $step
            );
        }
    }
}
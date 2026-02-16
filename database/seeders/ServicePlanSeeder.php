<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServicePlan;

class ServicePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Starter',
                'price' => 'Rp 7jt+',
                'description' => 'Landing page, company profile, atau microsite.',
                'features' => ['1-3 halaman', 'Responsive + SEO basic', 'Setup analytics'],
                'highlight' => false,
                'sort_order' => 1,
            ],
            [
                'name' => 'Growth',
                'price' => 'Rp 25jt+',
                'description' => 'Web app atau dashboard internal untuk operasional.',
                'features' => ['Auth + role', 'CRUD + reporting', 'Integrasi API'],
                'highlight' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Scale',
                'price' => 'Custom',
                'description' => 'SaaS platform dengan modul lengkap dan roadmap jangka panjang.',
                'features' => ['Multi-tenant', 'Billing & subscription', 'Observability & SLA'],
                'highlight' => false,
                'sort_order' => 3,
            ],
        ];

        foreach ($plans as $plan) {
            ServicePlan::updateOrCreate(
                ['name' => $plan['name']],
                $plan
            );
        }
    }
}

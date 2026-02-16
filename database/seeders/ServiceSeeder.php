<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'label' => 'Web Apps',
                'title' => 'Dashboard & Internal Tools',
                'description' => 'Sistem internal, portal admin, dan workflow automation dengan akses role-based.',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80',
                'sort_order' => 1,
            ],
            [
                'label' => 'SaaS Build',
                'title' => 'MVP to Scale',
                'description' => 'Validasi cepat, modular, siap grow dengan billing dan analytics.',
                'image' => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=1200&q=80',
                'sort_order' => 2,
            ],
            [
                'label' => 'Landing',
                'title' => 'High-Convert Pages',
                'description' => 'Page cepat, ringan, SEO-ready untuk campaign dan produk baru.',
                'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80',
                'sort_order' => 3,
            ],
            [
                'label' => 'Performance',
                'title' => 'Audit & Optimization',
                'description' => 'Refactor, caching, dan observability untuk latency rendah.',
                'image' => 'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1200&q=80',
                'sort_order' => 4,
            ],
            [
                'label' => 'Integrations',
                'title' => 'API & Automations',
                'description' => 'Integrasi payment, CRM, email, dan third-party services.',
                'image' => 'https://images.unsplash.com/photo-1487058792275-0ad4aaf24ca7?auto=format&fit=crop&w=1200&q=80',
                'sort_order' => 5,
            ],
            [
                'label' => 'UI System',
                'title' => 'Design System',
                'description' => 'Komponen konsisten untuk scaling tim product dan engineering.',
                'image' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=80',
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['title' => $service['title']],
                $service
            );
        }
    }
}

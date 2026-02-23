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
                'title' => 'Internal Dashboard',
                'price' => 'Rp 8 - 12jt',
                'description' => 'Sistem internal, portal admin, dan workflow automation dengan akses role-based.',
                'benefits' => [
                    'Role-based access dan manajemen user',
                    'Audit log dan reporting dashboard',
                    'Integrasi API internal/perusahaan',
                ],
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80',
                'sort_order' => 1,
            ],
            [
                'label' => 'SaaS Build',
                'title' => 'SaaS MVP',
                'price' => 'Rp 15 - 30jt',
                'description' => 'Validasi cepat, modular, siap grow dengan billing dan analytics.',
                'benefits' => [
                    'Arsitektur modular siap scale',
                    'Billing, subscription, dan analytics',
                    'Setup CI/CD dan monitoring production',
                ],
                'image' => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=1200&q=80',
                'sort_order' => 2,
            ],
            [
                'label' => 'Landing',
                'title' => 'Landing Page',
                'price' => 'Rp 2 - 5jt',
                'description' => 'Page cepat, ringan, SEO-ready untuk campaign dan produk baru.',
                'benefits' => [
                    'Copy section terstruktur untuk conversion',
                    'Performa cepat dan SEO basic on-page',
                    'Integrasi form leads ke email/CRM',
                ],
                'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80',
                'sort_order' => 3,
            ],
            [
                'label' => 'Performance',
                'title' => 'Performance Audit',
                'price' => 'Rp 5 - 9jt',
                'description' => 'Refactor, caching, dan observability untuk latency rendah.',
                'benefits' => [
                    'Audit query, caching, dan bottleneck',
                    'Refactor komponen kritikal performa',
                    'Baseline metrics sebelum/sesudah optimasi',
                ],
                'image' => 'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1200&q=80',
                'sort_order' => 4,
            ],
            [
                'label' => 'Integrations',
                'title' => 'API Integration',
                'price' => 'Rp 4 - 10jt',
                'description' => 'Integrasi payment, CRM, email, dan third-party services.',
                'benefits' => [
                    'Integrasi payment gateway/VA/e-wallet',
                    'Sinkronisasi data ke CRM dan tools marketing',
                    'Automasi workflow lintas platform',
                ],
                'image' => 'https://images.unsplash.com/photo-1487058792275-0ad4aaf24ca7?auto=format&fit=crop&w=1200&q=80',
                'sort_order' => 5,
            ],
            [
                'label' => 'UI System',
                'title' => 'Design System Kit',
                'price' => 'Rp 6 - 11jt',
                'description' => 'Komponen konsisten untuk scaling tim product dan engineering.',
                'benefits' => [
                    'Komponen reusable dan style token',
                    'Dokumentasi komponen untuk tim',
                    'Guideline implementasi di codebase',
                ],
                'image' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=80',
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['sort_order' => $service['sort_order']],
                $service
            );
        }
    }
}

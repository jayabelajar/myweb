<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'RevenueOS',
                'slug' => 'revenueos',
                'category' => 'SaaS Platform',
                'description' => 'Web CRM + billing engine dengan role-based access dan audit log.',
                'image' => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=1200&q=80',
                'stack' => ['Laravel', 'Postgres', 'Stripe'],
            ],
            [
                'title' => 'UrbanMart',
                'slug' => 'urbanmart',
                'category' => 'E-Commerce',
                'description' => 'Storefront web + inventory realtime dan checkout cepat.',
                'image' => 'https://images.unsplash.com/photo-1521334884684-d80222895322?auto=format&fit=crop&w=1200&q=80',
                'stack' => ['Next.js', 'Redis', 'Elastic'],
            ],
            [
                'title' => 'Payglow',
                'slug' => 'payglow',
                'category' => 'Fintech Web',
                'description' => 'Portal merchant web untuk payout, settlement, dan laporan.',
                'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1200&q=80',
                'stack' => ['Laravel', 'Queue', 'Observability'],
            ],
            [
                'title' => 'CareSync',
                'slug' => 'caresync',
                'category' => 'HealthTech Web',
                'description' => 'Portal pasien + jadwal dokter dengan alur booking rapi.',
                'image' => 'https://images.unsplash.com/photo-1526256262350-7da7584cf5eb?auto=format&fit=crop&w=1200&q=80',
                'stack' => ['Vue', 'Laravel', 'Twilio'],
            ],
            [
                'title' => 'AgriPulse',
                'slug' => 'agripulse',
                'category' => 'Analytics Web',
                'description' => 'Dashboard web untuk monitoring sensor & report.',
                'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80',
                'stack' => ['Vue', 'API', 'Charts'],
            ],
            [
                'title' => 'SkillForge',
                'slug' => 'skillforge',
                'category' => 'Education Web',
                'description' => 'LMS web modular dengan kelas, quiz, dan progress.',
                'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80',
                'stack' => ['Laravel', 'S3', 'Video'],
            ],
            [
                'title' => 'PulseIQ',
                'slug' => 'pulseiq',
                'category' => 'Analytics Web',
                'description' => 'Web analytics real-time untuk growth team.',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80',
                'stack' => ['React', 'Charts', 'API'],
            ],
            [
                'title' => 'RouteX',
                'slug' => 'routex',
                'category' => 'Operations Web',
                'description' => 'Web ops untuk route planning dan fleet tracking.',
                'image' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1200&q=80',
                'stack' => ['Laravel', 'Maps', 'Redis'],
            ],
            [
                'title' => 'MediLoop',
                'slug' => 'mediloop',
                'category' => 'Clinic Web',
                'description' => 'Web manajemen klinik dengan antrian pintar.',
                'image' => 'https://images.unsplash.com/photo-1504814532849-92702c8f4f4f?auto=format&fit=crop&w=1200&q=80',
                'stack' => ['Vue', 'MySQL', 'Queue'],
            ],
            [
                'title' => 'CardSpring',
                'slug' => 'cardspring',
                'category' => 'Fintech Web',
                'description' => 'Web portal untuk expense management dan approval flow.',
                'image' => 'https://images.unsplash.com/photo-1556740749-887f6717d7e4?auto=format&fit=crop&w=1200&q=80',
                'stack' => ['Laravel', 'Postgres', 'Queue'],
            ],
            [
                'title' => 'StreamHive',
                'slug' => 'streamhive',
                'category' => 'Media Web',
                'description' => 'Portal streaming internal dengan akses role-based.',
                'image' => 'https://images.unsplash.com/photo-1489515217757-5fd1be406fef?auto=format&fit=crop&w=1200&q=80',
                'stack' => ['Next.js', 'S3', 'Streaming'],
            ],
            [
                'title' => 'ShieldOps',
                'slug' => 'shieldops',
                'category' => 'Security Web',
                'description' => 'Portal security audit dengan access management.',
                'image' => 'https://images.unsplash.com/photo-1510511459019-5dda7724fd87?auto=format&fit=crop&w=1200&q=80',
                'stack' => ['Node', 'WAF', 'SIEM'],
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => $project['slug']],
                $project
            );
        }
    }
}

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
                'image' => null,
                'stack' => ['Laravel', 'Postgres', 'Stripe'],
            ],
            [
                'title' => 'UrbanMart',
                'slug' => 'urbanmart',
                'category' => 'E-Commerce',
                'description' => 'Storefront web + inventory realtime dan checkout cepat.',
                'image' => null,
                'stack' => ['Next.js', 'Redis', 'Elastic'],
            ],
            [
                'title' => 'Payglow',
                'slug' => 'payglow',
                'category' => 'Fintech Web',
                'description' => 'Portal merchant web untuk payout, settlement, dan laporan.',
                'image' => null,
                'stack' => ['Laravel', 'Queue', 'Observability'],
            ],
            [
                'title' => 'CareSync',
                'slug' => 'caresync',
                'category' => 'HealthTech Web',
                'description' => 'Portal pasien + jadwal dokter dengan alur booking rapi.',
                'image' => null,
                'stack' => ['Vue', 'Laravel', 'Twilio'],
            ],
            [
                'title' => 'AgriPulse',
                'slug' => 'agripulse',
                'category' => 'Analytics Web',
                'description' => 'Dashboard web untuk monitoring sensor & report.',
                'image' => null,
                'stack' => ['Vue', 'API', 'Charts'],
            ],
            [
                'title' => 'SkillForge',
                'slug' => 'skillforge',
                'category' => 'Education Web',
                'description' => 'LMS web modular dengan kelas, quiz, dan progress.',
                'image' => null,
                'stack' => ['Laravel', 'S3', 'Video'],
            ],
            [
                'title' => 'PulseIQ',
                'slug' => 'pulseiq',
                'category' => 'Analytics Web',
                'description' => 'Web analytics real-time untuk growth team.',
                'image' => null,
                'stack' => ['React', 'Charts', 'API'],
            ],
            [
                'title' => 'RouteX',
                'slug' => 'routex',
                'category' => 'Operations Web',
                'description' => 'Web ops untuk route planning dan fleet tracking.',
                'image' => null,
                'stack' => ['Laravel', 'Maps', 'Redis'],
            ],
            [
                'title' => 'MediLoop',
                'slug' => 'mediloop',
                'category' => 'Clinic Web',
                'description' => 'Web manajemen klinik dengan antrian pintar.',
                'image' => null,
                'stack' => ['Vue', 'MySQL', 'Queue'],
            ],
            [
                'title' => 'CardSpring',
                'slug' => 'cardspring',
                'category' => 'Fintech Web',
                'description' => 'Web portal untuk expense management dan approval flow.',
                'image' => null,
                'stack' => ['Laravel', 'Postgres', 'Queue'],
            ],
            [
                'title' => 'StreamHive',
                'slug' => 'streamhive',
                'category' => 'Media Web',
                'description' => 'Portal streaming internal dengan akses role-based.',
                'image' => null,
                'stack' => ['Next.js', 'S3', 'Streaming'],
            ],
            [
                'title' => 'ShieldOps',
                'slug' => 'shieldops',
                'category' => 'Security Web',
                'description' => 'Portal security audit dengan access management.',
                'image' => null,
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


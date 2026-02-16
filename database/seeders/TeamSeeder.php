<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        Team::truncate();

        Team::insert([
            [
                'name' => 'Jaya Kusuma',
                'role' => 'Fullstack Engineer',
                'bio' => 'Spesialis pengembangan sistem end-to-end dan scalable.',
                'photo_url' => '/image/jaya.png',
                'github_url' => 'https://github.com/jayabelajar',
                'linkedin_url' => 'https://linkedin.com/in/jykusuma',
                'instagram_url' => null,
                'dribbble_url' => null,
                'behance_url' => null,
                'twitter_url' => null,
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Argeswara',
                'role' => 'UI/UX Designer',
                'bio' => 'Merancang pengalaman digital yang intuitif dan aksesibel.',
                'photo_url' => 'https://media.licdn.com/dms/image/v2/D4E35AQEaeITUCNcAGA/profile-framedphoto-shrink_800_800/B4EZo4xppbJ0Ag-/0/1761889131428?e=1771459200&v=beta&t=v8sh6007l63MqZaADI1NFemeF5Ue8jRrA92Sr2UUZWk',
                'github_url' => null,
                'linkedin_url' => 'https://linkedin.com',
                'instagram_url' => 'https://instagram.com',
                'dribbble_url' => 'https://dribbble.com',
                'behance_url' => 'https://behance.net',
                'twitter_url' => null,
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hasan Basri',
                'role' => 'DevOps Engineer',
                'bio' => 'Menjaga infrastruktur cloud stabil dengan CI/CD.',
                'photo_url' => '/image/arges.jpg',
                'github_url' => 'https://github.com',
                'linkedin_url' => 'https://linkedin.com',
                'instagram_url' => null,
                'dribbble_url' => null,
                'behance_url' => null,
                'twitter_url' => null,
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ahmad Alan',
                'role' => 'Product Manager',
                'bio' => 'Menjembatani visi bisnis dan eksekusi dengan roadmap jelas.',
                'photo_url' => '/image/alan.jpg',
                'github_url' => null,
                'linkedin_url' => 'https://linkedin.com',
                'instagram_url' => 'https://instagram.com',
                'dribbble_url' => null,
                'behance_url' => null,
                'twitter_url' => 'https://x.com',
                'sort_order' => 4,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\HomepageSection;
use Illuminate\Database\Seeder;

class HomepageSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            ['key' => 'hero', 'name' => 'Hero + Stats', 'sort_order' => 10, 'is_active' => true],
            ['key' => 'logos', 'name' => 'Trusted Logos', 'sort_order' => 20, 'is_active' => true],
            ['key' => 'services', 'name' => 'Services Overview', 'sort_order' => 30, 'is_active' => true],
            ['key' => 'testimonials', 'name' => 'Client Testimonials', 'sort_order' => 40, 'is_active' => true],
            ['key' => 'blog', 'name' => 'Blog Highlights', 'sort_order' => 50, 'is_active' => true],
            ['key' => 'cta', 'name' => 'Call To Action', 'sort_order' => 60, 'is_active' => true],
        ];

        foreach ($rows as $row) {
            HomepageSection::updateOrCreate(
                ['key' => $row['key']],
                [
                    'name' => $row['name'],
                    'sort_order' => $row['sort_order'],
                    'is_active' => $row['is_active'],
                ]
            );
        }
    }
}

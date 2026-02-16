<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Architecture',
            'Design System',
            'Performance',
            'Observability',
            'DevOps',
            'Laravel',
            'Team',
            'UX',
            'Product',
            'API',
            'CI/CD',
            'Reliability',
            'Activation',
            'Logging',
            'Infrastructure',
        ];

        foreach ($tags as $name) {
            Tag::updateOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        }
    }
}

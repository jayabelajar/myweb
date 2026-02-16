<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@veritasdev.com'],
            [
                'name' => 'Admin',
                'role' => 'Administrator',
                'password' => Hash::make('admin123'),
            ]
        );

        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            ProjectSeeder::class,
            ServiceSeeder::class,
            ServicePlanSeeder::class,
            TeamSeeder::class,
            ContactSettingSeeder::class,
            WorkflowStepSeeder::class,
        ]);
    }
}

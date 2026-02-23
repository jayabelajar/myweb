<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::truncate();

        $rows = [
            ['type' => Testimonial::TYPE_COMPANY, 'name' => 'Orbit', 'role' => null, 'quote' => null, 'badge' => null, 'photo_url' => null, 'sort_order' => 10, 'is_active' => true],
            ['type' => Testimonial::TYPE_COMPANY, 'name' => 'Northwind', 'role' => null, 'quote' => null, 'badge' => null, 'photo_url' => null, 'sort_order' => 20, 'is_active' => true],
            ['type' => Testimonial::TYPE_COMPANY, 'name' => 'Solace', 'role' => null, 'quote' => null, 'badge' => null, 'photo_url' => null, 'sort_order' => 30, 'is_active' => true],
            ['type' => Testimonial::TYPE_COMPANY, 'name' => 'Aurum', 'role' => null, 'quote' => null, 'badge' => null, 'photo_url' => null, 'sort_order' => 40, 'is_active' => true],
            ['type' => Testimonial::TYPE_COMPANY, 'name' => 'Lumen', 'role' => null, 'quote' => null, 'badge' => null, 'photo_url' => null, 'sort_order' => 50, 'is_active' => true],
            ['type' => Testimonial::TYPE_COMPANY, 'name' => 'Vantage', 'role' => null, 'quote' => null, 'badge' => null, 'photo_url' => null, 'sort_order' => 60, 'is_active' => true],
            ['type' => Testimonial::TYPE_PERSON, 'name' => 'Andi Darmawan', 'role' => 'CTO, FinTech ID', 'quote' => 'VeritasDev mengubah konsep MVP kami menjadi produk skalabel hanya dalam 3 bulan. Code structure-nya sangat rapi.', 'badge' => 'AD', 'photo_url' => null, 'sort_order' => 110, 'is_active' => true],
            ['type' => Testimonial::TYPE_PERSON, 'name' => 'Sarah Rahma', 'role' => 'Founder, EduFest', 'quote' => 'Jarang menemukan studio yang peduli pada performance sedetail ini. Website e-commerce kami load under 1 detik.', 'badge' => 'SR', 'photo_url' => null, 'sort_order' => 120, 'is_active' => true],
            ['type' => Testimonial::TYPE_PERSON, 'name' => 'Budi Jatmiko', 'role' => 'PM, AgriTech', 'quote' => 'Timeline jelas, deliverable sesuai ekspektasi. Partner teknis terbaik untuk startup tahap awal.', 'badge' => 'BJ', 'photo_url' => null, 'sort_order' => 130, 'is_active' => true],
            ['type' => Testimonial::TYPE_PERSON, 'name' => 'Dimas K.', 'role' => 'Ops Manager, SmartFarm', 'quote' => 'IoT Dashboard yang mereka buat sangat stabil meskipun menerima ribuan data sensor per detik.', 'badge' => 'DK', 'photo_url' => null, 'sort_order' => 140, 'is_active' => true],
            ['type' => Testimonial::TYPE_PERSON, 'name' => 'Lina N.', 'role' => 'CEO, RetailApp', 'quote' => 'Aplikasi mobile kami berjalan smooth di device low-end sekalipun. Optimasi kodenya luar biasa.', 'badge' => 'LN', 'photo_url' => null, 'sort_order' => 150, 'is_active' => true],
            ['type' => Testimonial::TYPE_PERSON, 'name' => 'Ferry R.', 'role' => 'IT Head, CorpMedia', 'quote' => 'Support maintenance mereka sangat responsif. Bug fix dilakukan dalam hitungan jam, bukan hari.', 'badge' => 'FR', 'photo_url' => null, 'sort_order' => 160, 'is_active' => true],
        ];

        Testimonial::insert(array_map(function (array $row) {
            return array_merge($row, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }, $rows));
    }
}

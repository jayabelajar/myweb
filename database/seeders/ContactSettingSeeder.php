<?php

namespace Database\Seeders;

use App\Models\ContactSetting;
use Illuminate\Database\Seeder;

class ContactSettingSeeder extends Seeder
{
    public function run(): void
    {
        ContactSetting::updateOrCreate(
            ['id' => 1],
            [
                'email' => 'hello@veritasdev.com',
                'location' => 'Sidoarjo, Indonesia',
                'availability_text' => 'Mon-Fri, 09.00-18.00',
                'availability_note' => 'WIB / GMT+7',
                'inquiry_title' => 'Project Inquiry',
                'inquiry_subtitle' => 'Ceritakan kebutuhan Anda. Kami siapkan scope dan estimasi awal yang jelas, beserta rekomendasi langkah berikutnya.',
                'inquiry_button' => 'Submit',
                'whatsapp_number' => '6285859400250',
            ]
        );
    }
}
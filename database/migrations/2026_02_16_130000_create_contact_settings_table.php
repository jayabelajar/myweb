<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('location')->nullable();
            $table->string('availability_text')->nullable();
            $table->string('availability_note')->nullable();
            $table->string('inquiry_title')->nullable();
            $table->text('inquiry_subtitle')->nullable();
            $table->string('inquiry_button')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_settings');
    }
};

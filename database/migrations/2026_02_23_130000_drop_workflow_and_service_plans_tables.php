<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('service_plans')) {
            Schema::drop('service_plans');
        }

        if (Schema::hasTable('workflow_steps')) {
            Schema::drop('workflow_steps');
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('service_plans')) {
            Schema::create('service_plans', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('price');
                $table->text('description');
                $table->json('features')->nullable();
                $table->boolean('highlight')->default(false);
                $table->string('cta_label')->default('Konsultasi');
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('workflow_steps')) {
            Schema::create('workflow_steps', function (Blueprint $table) {
                $table->id();
                $table->string('label');
                $table->string('title');
                $table->text('description');
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }
    }
};

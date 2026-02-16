<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->string('github_url')->nullable()->after('photo_url');
            $table->string('linkedin_url')->nullable()->after('github_url');
            $table->string('instagram_url')->nullable()->after('linkedin_url');
            $table->string('dribbble_url')->nullable()->after('instagram_url');
            $table->string('behance_url')->nullable()->after('dribbble_url');
            $table->string('twitter_url')->nullable()->after('behance_url');
        });
    }

    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn([
                'github_url',
                'linkedin_url',
                'instagram_url',
                'dribbble_url',
                'behance_url',
                'twitter_url',
            ]);
        });
    }
};

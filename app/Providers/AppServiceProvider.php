<?php

namespace App\Providers;

use App\Models\ContactSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $contactSettings = null;

        if (Schema::hasTable('contact_settings')) {
            $contactSettings = ContactSetting::latest()->first();
        }

        View::share('contactSettings', $contactSettings);
    }
}

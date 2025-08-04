<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('dashboard.*', function ($view) {
            if (!Schema::hasTable('settings')) {
                return;
            }

            
            $settings = Cache::remember('site_settings', now()->addMinutes(60), function () {
                return Setting::first();
            });

            // شارك القيمة مع كل الـ views اللي تبدأ بـ dashboard.*
            view()->share([
                'setting' => $settings,
            ]);
        });
    }
}

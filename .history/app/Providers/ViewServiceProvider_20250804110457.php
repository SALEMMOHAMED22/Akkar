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
          if (!Schema::hasTable('settings')) {
                     return;
          }


        if(! Cache::has('site_settings')){
            Cache::remember('site_settings', 60, function () {
                    return Setting::firstOr(function(){

                        return Setting::create([
                            'site'
                        ]);
                    });
            });
        }

    }
}

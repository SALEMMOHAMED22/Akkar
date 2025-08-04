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
                            'site_name_ar' => 'عاين عقار ',
                            'site_name_en' => '3ayin Akkar',
                            'site_desc_ar' => 'عاين عقار ',
                            'site_desc_en' => '3ayin Akkar',
                            'site_address_ar' => 'عاين عقار ',
                            'site_address_en' => '3ayin Akkar',
                            'site_phone' => '01000000000 ',
                            'site_email' => '3ayinakkar.com',
                            'email_support' => '3ayinSupport@3ayin.com',
                        ]);
                    });
            });
        }

    }
}

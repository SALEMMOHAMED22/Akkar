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
                            'site_desc_ar' => 'منصة عقارية متكاملة تجمع كل ما يحتاجه المستخدم العربي في عالم العقارات، في مكان رقمي واحد سهل الاستخدام. سواء كنت تبحث عن شقة للبيع، مكتب للإيجار، خدمات تمويل، أو حتى صيانة وتشطيب – نحن نوفر لك ذلك من خلال شبكة واسعة من مقدمي الخدمات الموثوقين. ',
                            'site_desc_en' => '3ayin Akkar',
                            'site_address_ar' => 'عاين عقار ',
                            'site_address_en' => '3ayin Akkar',
                            'site_phone' => '01000000000 ',
                            'site_email' => '3ayinakkar.com',
                            'email_support' => '3ayinSupport@3ayin.com',
                            'facebook_url' => '#',
                            'twitter_url' => '#',
                            'youtube_url' => '#',
                            'linkedin_url' => '#',
                            'tweetter_url' => '#',
                            'behance_url' => '#',
                            'meta_description_ar' => 'عاين عقار ',
                            'meta_description_en' => '3ayin Akkar',
                            'logo' => 'logo.png',
                            'favicon' => 'favicon.png',
                            'site_copyright_ar' => 'عاين عقار ',
                            'site_copyright_en' => '3ayin Akkar',
                            'promotion_video_url' => '#',
                        ]);
                    });
            });
        }

    }
}

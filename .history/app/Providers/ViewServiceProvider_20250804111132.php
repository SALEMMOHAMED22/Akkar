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


        if (! Cache::has('site_settings')) {
            Cache::remember('site_settings', 60, function () {
                return Setting::firstOr(function () {

                    return Setting::create([
                        'site_name_ar' => 'عاين عقار ',
                        'site_name_en' => '3ayin Akkar',
                        'site_desc_ar' => 'منصة عقارية متكاملة تجمع كل ما يحتاجه المستخدم العربي في عالم العقارات، في مكان رقمي واحد سهل الاستخدام. سواء كنت تبحث عن شقة للبيع، مكتب للإيجار، خدمات تمويل، أو حتى صيانة وتشطيب – نحن نوفر لك ذلك من خلال شبكة واسعة من مقدمي الخدمات الموثوقين. ',

                        'site_desc_en' => 'A comprehensive real estate platform bringing everything the Arab user needs in the world of real estate into one easy-to-use digital place. Whether you are looking to buy an apartment, rent an office, get financing services, or even maintenance and finishing  we offer all of that through a wide network of trusted service providers. ',

                        'site_address_ar' => 'عنوان الموقع',
                        'site_address_en' => 'Site Address',
                        'site_phone' => '01000000000 ',
                        'site_email' => '3ayin@3ayin.com',
                        'email_support' => '3ayinSupport@3ayin.com',
                        'facebook_url' => 'https://www.facebook.com/',
                        'twitter_url' => '#',
                        'youtube_url' => '#',
                        'linkedin_url' => '#',
                        'tweetter_url' => '#',
                        'behance_url' => '#',
                        'meta_description_ar' => 'أكبر تجمع رقمي لكل خدمات العقارات في مكان واحد
منصة واحدة تربطك بكل ما يخص العقارات … في أي وقت ومن أي مكان.
 ',
                        'meta_description_en' => 'The largest digital hub for all real estate services in one place
One platform that connects you to everything about real estate… anytime, anywhere.',
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

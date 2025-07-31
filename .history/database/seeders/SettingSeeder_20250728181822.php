<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'site_name_ar' => 'اسم الموقع',
            'site_name_en' => 'Site Name',

            'site_desc_ar' => 'وصف الموقع',
            'site_desc_en' => 'Site Description',

            'site_address_ar' => 'عنوان الموقع',
            'site_address_en' => 'Site Address',

            'meta_description_ar' => 'وصف الموقع',
            'meta_description_en' => 'Site Description',

            'site_phone' => 'رقم الهاتف',
            'site_email' => 'البريد الالكتروني',
            'email_support' => 'البريد الالكتروني للدعم',



            // socail
            'facebook_url' => 'https://www.facebook.com/',
            'twitter_url' => 'https://www.twitter.com/',
            'youtube_url' => 'https://www.youtube.com/',
            'linkedin_url' => 'https://www.linkedin.com/',
            'tweetter_url' => 'https://www.twitter.com/',
            

            'logo' => 'logo.png',
            'favicon' => 'logo.png',
            'site_copyright' => '©2025 Your E-commerce Name. All rights reserved.',


        ]);
    }
}

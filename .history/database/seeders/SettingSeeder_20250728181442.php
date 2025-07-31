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

            'site_description_ar' => 'وصف الموقع',
            'site_description_en' => 'Site Description',

            'site_address_ar' => 'عنوان الموقع',
            'site_address_en' => 'Site Address',

            'site'
        ]);
    }
}

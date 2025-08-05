<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addons = [
            [
                'name_ar' => 'الجولة الافتراضية',
                'name_en' => 'VR Tour',
                'desc_ar' => 'فريق تصوير متخصص يزور العقار 
تصوير بزاوية ٣٦٠ درجة 
اضافات نقاط معلومات تفاعلية 
رفع الجوله علي المنصه خلال ٢٤ ساعة 
صلاحية ٦  أشهر 
امكانية اضافة صوت مرافق ( شرح العقار ) ',
                'desc_en' => '',
                'price' => 0,
                'billing_types' => '',
            ]  ,
            [
                'name_ar' => '',
                'name_en' => '',
                'desc_ar' => '',
                'desc_en' => '',
                'price' => 0,
                'billing_types' => '',
            ]  ,
            [
                'name_ar' => '',
                'name_en' => '',
                'desc_ar' => '',
                'desc_en' => '',
                'price' => 0,
                'billing_types' => '',
            ]  ,
        ];
    }
}

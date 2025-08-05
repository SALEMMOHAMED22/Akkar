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
                'desc_en' => 'A specialized photography team visits the property
360-degree photography
Interactive information points added
Upload the tour to the platform within 24 hours
Validity 6 months
Possibility of adding an accompanying voiceover (property description)',
                'price' => 1000,
                'billing_types' => 'one_time',
            ]  ,
            [
                'name_ar' => 'الاعلانات المميزه',
                'name_en' => ' Special Ads',
                'desc_ar' => 'ظهور في الشريط العلوي للصفحة الرئيسية 
زيادة معدل المشاهدات بنسبة 300 % 
ابراز باللون المميز في نتائج البحث 
احصاءات مفصله عن الاداء 
امكانية توجيه الاعلان جغرافيا ',
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

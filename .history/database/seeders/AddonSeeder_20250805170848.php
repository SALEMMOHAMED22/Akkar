<?php

namespace Database\Seeders;

use App\Models\Addon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                'desc_en' => 'Appearance in the top bar of the homepage
300% increase in viewership
Highlighting in a distinctive color in search results
Detailed performance statistics
Possibility of geographic ad targeting',
                'price' => 2000,
                'billing_types' => 'weekly',
            ]  ,
            [
                'name_ar' => 'الحزمه التسويقة',
                'name_en' => ' Promotional package',
                'desc_ar' => 'ادراه كامله للحملات التسويقية 
نشر علي منصات التواصل الاجتماعي التابعه للمنصه 
ادراج في النشرات البريديه 
تحليل المنافسين 
تقارير اداء اسبوعيه 
نصائح تحسين الاداء  ',
                'desc_en' => 'Full management of marketing campaigns
Publishing on the platforms social media platforms
Inclusion in newsletters
Competitor analysis
Weekly performance reports
Performance improvement tips',
                'price' => 5000,
                'billing_types' => 'monthly',
            ]  ,
        ];
        foreach($addons as $addon) {
            Addon::create($addon);
        }
    }
}

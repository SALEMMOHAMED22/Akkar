<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cat
        $subCategories = [
            [
                'category_id' => 1,
                'name_ar' => 'تسويق عاين',
                'name_en' => '3ayin Marketing',

            ],
            [
                'category_id' => 1,
                'name_ar' => 'تسويق ذاتي',
                'name_en' => 'Self Marketing',

            ],
            [
                'category_id' => 1,
                'name_ar' => 'تسويق بالوكاله',
                'name_en' => 'Agency Marketing',

            ],
            [
                'category_id' => 2,
                'name_ar' => 'ادارة العقارات ERP',
                'name_en' => 'Real Estate ERP',

            ],
            [
                'category_id' => 2,
                'name_ar' => 'إدارة العلاقات CRM ',
                'name_en' => 'CRM Management',

            ],
            [
                'category_id' => 2,
                'name_ar' => 'تسويق عاين',
                'name_en' => '3ayin Marketing',

            ],
            [
                'category_id' => 3,
                'name_ar' => ' تصميم واستشارات',
                'name_en' => 'Design & Consulting',

            ],
            [
                'category_id' => 3,
                'name_ar' => 'تنفيذ ومقولات ',
                'name_en' => 'Construction & Contracting',

            ],
            [
                'category_id' => 3,
                'name_ar' => 'صيانة منشآت',
                'name_en' => 'Facility Maintenance',

            ],
            [
                'category_id' => 3,
                'name_ar' => ' VR / AR',
                'name_en' => 'VR / AR',

            ],
            [
                'category_id' => 3,
                'name_ar' => 'عاين خدمات هندسية',
                'name_en' => '3ayin Engineering Services',

            ],
            [
                'category_id' => 3,
                'name_ar' => 'كورسات عقارية',
                'name_en' => 'Real Estate Courses',

            ],
            [
                'category_id' => 3,
                'name_ar' => 'كورسات هندسية',
                'name_en' => 'Engineering Courses',

            ],
            [
                'category_id' => 3,
                'name_ar' => 'كورسات VR / AR',
                'name_en' => 'VR / AR Courses',

            ],
            [
                'category_id' => 3,
                'name_ar' => 'سنتر تعليمي',
                'name_en' => 'Educational Center',

            ],
            [
                'category_id' => 4,
                'name_ar' => 'خرائط Pdf ',
                'name_en' => 'PDF Maps',

            ],
            [
                'category_id' => 4,
                'name_ar' => ' اماكن VR',
                'name_en' => 'VR Locations',

            ],
            [
                'category_id' => 4,
                'name_ar' => ' استشارات قانونية',
                'name_en' => 'Legal Consulting',

            ],
            [
                'category_id' => 4,
                'name_ar' => 'التمويل ',
                'name_en' => 'Financing',

            ],
            [
                'category_id' => 4,
                'name_ar' => ' تحليل وتقارير',
                'name_en' => 'Analysis & Reports',

            ],


        ];

        foreach ($subCategories as $subCategory) {
            SubCategory::create($subCategory);
        }
    }
}

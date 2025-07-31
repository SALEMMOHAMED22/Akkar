<?php

namespace Database\Seeders;

use App\Models\AdSubCategory;
use App\Models\AdSubSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdSubSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
         $data = [
            'Real Estate Marketing' => [
                ['name_ar' => 'تسويق عاين', 'name_en' => '3ayin Marketing'],
                ['name_ar' => 'تسويق ذاتي', 'name_en' => 'Self Marketing'],
                ['name_ar' => 'تسويق بالوكالة', 'name_en' => 'Agency Marketing'],
            ],
            'Real Estate Services' => [
                ['name_ar' => 'إدارة العقارات ERP', 'name_en' => 'ERP Property Management'],
                ['name_ar' => 'إدارة العلاقات CRM', 'name_en' => 'CRM Relationship Management'],
                ['name_ar' => 'تسويق عاين', 'name_en' => '3ayin Marketing'],
            ],
            'Engineering Services' => [
                ['name_ar' => 'تصميم واستشارات', 'name_en' => 'Design & Consultation'],
                ['name_ar' => 'تنفيذ ومقولات', 'name_en' => 'Execution & Contracting'],
                ['name_ar' => 'صيانة منشآت', 'name_en' => 'Facilities Maintenance'],
                ['name_ar' => 'VR / AR', 'name_en' => 'VR / AR'],
                ['name_ar' => 'خدمات هندسية عاين', 'name_en' => '3ayin Engineering Services'],
            ],
            'Educational Services' => [
                ['name_ar' => 'كورسات عقارية', 'name_en' => 'Real Estate Courses'],
                ['name_ar' => 'كورسات هندسية', 'name_en' => 'Engineering Courses'],
                ['name_ar' => 'كورسات VR / AR', 'name_en' => 'VR / AR Courses'],
                ['name_ar' => 'سنتر تعليمي', 'name_en' => 'Educational Center'],
            ],
            'Additional Services' => [
                ['name_ar' => 'خرائط Pdf', 'name_en' => 'Pdf Maps'],
                ['name_ar' => 'اماكن VR', 'name_en' => 'VR Locations'],
                ['name_ar' => 'استشارات قانونية', 'name_en' => 'Legal Consultation'],
                ['name_ar' => 'التمويل', 'name_en' => 'Financing'],
                ['name_ar' => 'تحليل وتقارير', 'name_en' => 'Analysis & Reports'],
            ],
        ];

        foreach ($data as $subCategoryNameEn => $subSubCategories) {
            $subCategory = AdSubCategory::where('name_en', $subCategoryNameEn)->first();

            if (!$subCategory) {
                $this->command->warn("SubCategory not found: $subCategoryNameEn");
                continue;
            }

            foreach ($subSubCategories as $subSubCategory) {
                AdSubSubCategory::create([
                    'ad_sub_category_id' => $subCategory->id,
                    'name_ar' => $subSubCategory['name_ar'],
                    'name_en' => $subSubCategory['name_en'],
                ]);
            }
        }
    }
      




    }


<?php

namespace Database\Seeders;

use App\Models\AdSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdSubSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = AdSubCategory::where('ad_category_id', 1)->get();


        foreach ($subCategories as $subCategory) {
            $subSubCategories = [
                [
                    'ad_sub_category_id' => $subCategory->id,
                    'name_ar' => ' ',
                    'name_en' => 'Real Estate Marketing'
                ],
                [
                    'ad_sub_category_id' => $subCategory->id,
                    'name_ar' => 'خدمات عقارية',
                    'name_en' => 'Real Estate Services'
                ],
                [
                    'ad_sub_category_id' => $subCategory->id,
                    'name_ar' => 'خدمات عقارية',
                    'name_en' => 'Engineering Services'
                ],
                [
                    'ad_sub_category_id' => $subCategory->id,
                    'name_ar' => 'خدمات عقارية',




    }
}

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
            
        }

      




    }
}

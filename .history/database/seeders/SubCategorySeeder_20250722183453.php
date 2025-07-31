<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = [
            [
                'category_id' => 1,
                'name_ar' => 'تسويق عقاري',
                'name_en' => 'Real Estate Marketing',
                // 'image' => 'default.jpg',
            ]  
        ];
    }
}

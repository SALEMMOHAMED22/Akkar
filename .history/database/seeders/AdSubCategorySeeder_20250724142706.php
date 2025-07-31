<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $subCategories = [
           [
               'ad_category_id' => 1,
               'name_ar' => 'تسويق عقاري',
               'name_en' => 'Real Estate Marketing'
           ],
       ] 
    }
}

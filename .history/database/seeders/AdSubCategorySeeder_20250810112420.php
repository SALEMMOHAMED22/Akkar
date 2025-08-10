<?php

namespace Database\Seeders;

use App\Models\AdSubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
               'name_en' => 'Real Estate Marketing',
               'image' =>  '/categoryImages/Real-Estate-Marketing.png',

           ],
           [
               'ad_category_id' => 1,
               'name_ar' => 'خدمات عقارية',
               'name_en' => 'Real Estate Services',
               'image' =>  '/categoryImages/Real-Estate-Services.png',
           ],
           [
               'ad_category_id' => 1,
               'name_ar' => 'خدمات هندسية',
               'name_en' => 'Engineering Services',
               'image' =>  '/categoryImages/Engineering-Services.png',
           ],
           [
               'ad_category_id' => 1,
               'name_ar' => 'خدمات تعليمية ',
               'name_en' => 'Educational Services',
               'image' =>  '/categoryImages/Educational-Services.png',
           ],
           [
               'ad_category_id' => 1,
               'name_ar' => 'خدمات إضافية ',
               'name_en' => 'Additional Services',
               'image' =>  '/categoryImages/Additional-Services.png',
           ],
           [
               'ad_category_id' => 2,
               'name_ar' => 'مسوقين فرد ',
               'name_en' => 'Individual Marketers'
           ],
           [
               'ad_category_id' => 2,
               'name_ar' => 'مهندسين فرد',
               'name_en' => 'Individual Engineers' ,
           ],
           [
               'ad_category_id' => 3,
               'name_ar' => 'شركات عقارية ',
               'name_en' => ' Real Estate Companies' ,
           ],
           [
               'ad_category_id' => 3,
               'name_ar' => ' شركات هندسية',
               'name_en' => ' Engineering Companies' ,
           ],
           [
               'ad_category_id' => 3,
               'name_ar' => ' شركات تعليمية',
               'name_en' => ' Educational Companies' ,
           ],


       ] ;

       foreach ($subCategories as $subCategory) {
           AdSubCategory::create($subCategory);
       }
    }
}

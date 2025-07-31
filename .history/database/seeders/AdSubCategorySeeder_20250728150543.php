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
               'image' =>  '/public/categoryImages/Real Estate Marketing.jpg',

           ],
           [
               'ad_category_id' => 1,
               'name_ar' => 'خدمات عقارية',
               'name_en' => 'Real Estate Services',
               'image' =>  '/public/categoryImages/Real Estate Services.jpg',
           ],
           [
               'ad_category_id' => 1,
               'name_ar' => 'خدمات هندسيه',
               'name_en' => 'Engineering Services'
           ],
           [
               'ad_category_id' => 1,
               'name_ar' => 'خدمات تعليميه',
               'name_en' => 'Educational Services'
           ],
           [
               'ad_category_id' => 1,
               'name_ar' => 'خدمات اضافيه',
               'name_en' => 'Additional Services'
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
               'name_ar' => 'شركات عقاريه ',
               'name_en' => ' Real Estate Companies' ,
           ],
           [
               'ad_category_id' => 3,
               'name_ar' => ' شركات هندسيه',
               'name_en' => ' Engineering Companies' ,
           ],
           [
               'ad_category_id' => 3,
               'name_ar' => ' شركات تعليميه',
               'name_en' => ' Educational Companies' ,
           ],


       ] ;

       foreach ($subCategories as $subCategory) {
           AdSubCategory::create($subCategory);
       }
    }
}

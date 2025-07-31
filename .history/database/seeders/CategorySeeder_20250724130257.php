<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $categories = [
        [
            'ad_type_id' => 1,
            'name_ar' => 'تسويق عقاري',
            'name_en' => 'Real Estate Marketing',
            'image' => 'default.jpg',
        ],
        [
             'ad_type_id' => 1,
            'name_ar' => 'برامج عقاريه',
            'name_en' => 'Real Estate Programs',
            'image' => 'default.jpg',
        ],
        [
             'ad_type_id' => 1,
            'name_ar' => 'خدمات هندسيه',
            'name_en' => 'Engineering Services',
            'image' => 'default.jpg',
        ],
        [
             'ad_type_id' => 1,
            'name_ar' => 'خدمات تعليميه',
            'name_en' => 'Educational Services',
            'image' => 'default.jpg',
        ],
        [
             'ad_type_id' => 1,
            'name_ar' => 'خدمات اضافيه',
            'name_en' => 'Additional Services',
            'image' => 'default.jpg',
        ],
        [
            'ad_type_id' => 2,
            'name_ar' => 'مسوقين فرد',
            'name_en' => 'Individual Markerters',
            'image' => 'default.jpg',
        ],
        [
            'ad_type_id' => 2,
            'name_ar' => ' مهندسين فرد',
            'name_en' => ' Individual Engineers',
            'image' => 'default.jpg',
        ],
        [
            'ad_type_id' => 3,
            'name_ar' => ' شركات عقاريه',
            'name_en' => ' Real Estate Companies',
            'image' => 'default.jpg',
        ],
        [
            'ad_type_id' => 3,
            'name_ar' => ' شركات هندسيه',
            'name_en' => ' Engineering Companies',
            'image' => 'default.jpg',
        ],
        [
            'ad_type_id' => 3,
            'name_ar' => ' شركات هندسيه',
            'name_en' => ' E',
            'image' => 'default.jpg',
        ],


    ];


    foreach ($categories as $category) {
        Category::create($category);
    }
}
}
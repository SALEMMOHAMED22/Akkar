<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $categories = [
        [
            'name_ar' => 'تسويق عقاري',
            'name_en' => 'Accessories',
            'image' => 'default.jpg',
        ],
        [
            'name_ar' => 'برامج عقاريه',
            'name_en' => 'Mobiles',
            'image' => 'default.jpg',
        ],
        [
            'name_ar' => 'خدمات هندسيه',
            'name_en' => 'Clothes',
            'image' => 'default.jpg',
        ],
        [
            'name_ar' => 'خدمات تعليميه',
            'name_en' => 'Computers',
            'image' => 'default.jpg',
        ],
        [
            'name_ar' => 'أجهزة ',
            'name_en' => 'Computers',
            'image' => 'default.jpg',
        ],
    ];
    }
}

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
            'name_ar' => 'أكسسوارات',
            'name_en' => 'Accessories',
            'image' => 'default.jpg',
        ],
        [
            'name_ar' => 'موبايلات',
            'name_en' => 'Mobiles',
            'image' => 'default.jpg',
        ],
        [
            'name_ar' => 'ملابس',
            'name_en' => 'Clothes',
            'image' => 'default.jpg',
        ],
        [
            'name_ar' => 'أجهزة الكمبيوتر',
            'name_en' => 'Computers',
            'image' => 'default.jpg',
        ],
        [
            'name_ar' => 'أجهزة الكمبيوتر',
            'name_en' => 'Computers',
            'image' => 'default.jpg',
        ],
    ]
    }
}

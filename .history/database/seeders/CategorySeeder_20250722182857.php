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
            'name_en' => 'Real Estate Marketing',
            'image' => 'default.jpg',
        ],
        [
            'name_ar' => 'برامج عقاريه',
            'name_en' => 'Real Estate Programs',
            'image' => 'default.jpg',
        ],
        [
            'name_ar' => 'خدمات هندسيه',
            'name_en' => '',
            'image' => 'default.jpg',
        ],
        [
            'name_ar' => 'خدمات تعليميه',
            'name_en' => 'Computers',
            'image' => 'default.jpg',
        ],
        [
            'name_ar' => 'خدمات اضافيه',
            'name_en' => 'Computers',
            'image' => 'default.jpg',
        ],
    ];
    }
}

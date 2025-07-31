<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name_ar' => 'الاعلانات',
                'name_en' => ''
            ] ,
            [
                'name_ar' => 'الاعلانات',
                'name_en' => 'Ads'
            ] ,
            [
                'name_ar' => 'الاعلانات',
                'name_en' => 'Ads'
            ]
        ];
    }
}

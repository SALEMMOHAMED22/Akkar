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
                'name_ar' => 'عاين خدمات',
                'name_en' => '3ayin Service'
            ] ,
            [
                'name_ar' => 'عاين افيليات',
                'name_en' => '3ayin Affiliate'
            ] ,
            [
                'name_ar' => 'عاين شركات',
                'name_en' => '3ayin Companies'
            ]
        ];

        
    }
}

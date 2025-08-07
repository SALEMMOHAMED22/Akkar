<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $limits = [
            [
                'name_ar' => 'لا يتضمن جولات افتراضية ',
                'name_en' => 'Does not include VR tours',

            ],
            [
                'name_ar' => 'لا يوجد ظهور مميز',
                'name_en' => 'No special appearance',
            ],  
            
        ];
    }
}

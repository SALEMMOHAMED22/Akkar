<?php

namespace Database\Seeders;

use App\Models\Limit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            [
                'name_ar' => 'لا يوجد اشعارات فورية',
                'name_en' => 'No Real-time notifications',
            ],
            [
                'name_ar' => 'فلترة بحث محدود',
                'name_en' => 'Limited search filtering',
            ],
        ];

        foreach($limits as $limit){
          Limit::create($limit);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanLimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planLimits = [
            [
                'plan_id' => 1,
                'name_ar' => 'لا يتضمن جولات افتراضية ',
                'name_en' => 'Does not include VR tours',
            ]  ,
            [
                'plan_id' => 1,
                'name_ar' => ''
                'name_en' => 'Does not include VR tours',
            ]  ,
            [
                'plan_id' => 1,
                'name_ar' => 'لا يتضمن جولات افتراضية ',
                'name_en' => 'Does not include VR tours',
            ]  ,
        ];
    }
}

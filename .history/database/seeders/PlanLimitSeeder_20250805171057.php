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
                'name_ar' => 'عدد ',
                'name_en' => 'Number of users',
                'count' => 5,
                'status' => 1,
            ]  ,
            [
                
            ]  ,
            [
                
            ]  ,
        ];
    }
}

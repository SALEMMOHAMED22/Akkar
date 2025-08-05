<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'plan_category_id' => 1,
                'name_ar' => 'باقه اساسية',
                'name_en' => 'Basic plan',
                'price_per_month' => 0,
                'price_per_year' => 0,               
            ]  ,
        ];
    }
}

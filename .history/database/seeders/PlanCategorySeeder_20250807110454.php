<?php

namespace Database\Seeders;

use App\Models\PlanCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planCategories = [
           [
                'name_ar' => 'باقات الافراد (المشتريين  والمستأجرين )' ,
                'name_en' => 'Individual packages (buyers and renters)' ,
            ],
            
            [
                'name_ar' => 'باقات الشركات والعقاريين المطورين', 
                'name_en' => 'Company and real estate developers packages',
            ],  
        ];

        foreach($planCategories as $planCategory) {
            PlanCategory::create($planCategory);
        }
    }
}

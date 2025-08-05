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
        PlanCategory::create(
            [
                'name_ar' => 'باقات الافراد (المشتريين' 
            ],
        );
    }
}

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
                'name_ar' => 'عاين خدمات',
                'name_en' => '3ayin Service'
            ] ,
            [
                'name_ar' => 'عاين أفلييت',
                'name_en' => '3ayin Affiliate'
            ] ,
            [
                'name_ar' => 'عاين شركات',
                'name_en' => '3ayin Companies'
            ]
        ];
    }
}

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
                'name_en' => 'Basic package',
                'price_per_month' => 0,
                'price_per_year' => 0,               
            ]  ,
            [
                'plan_category_id' => 1,
                'name_ar' => 'باقة مميزه ',
                'name_en' => ' Special package',
                'price_per_month' => 150,
                'price_per_year' => 1440,               
            ]  ,
            [
                'plan_category_id' => 1,
                'name_ar' => 'باقة احترافية',
                'name_en' => 'Professional package',
                'price_per_month' => 300,
                'price_per_year' => 3240,               
            ]  ,
            [
                'plan_category_id' => 2,
                'name_ar' => 'باقة اولية',
                'name_en' => 'Initial package',
                'price_per_month' => 500,
                'price_per_year' => null,               
            ]  ,
            [
                'plan_category_id' => 2,
                'name_ar' => 'باقة متوسطة',
                'name_en' => 'Medium package',
                'price_per_month' => 120,
                'price_per_year' => null,               
            ]  ,
            [
                'plan_category_id' => 2,
                'name_ar' => 'باقة احترافية',
                'name_en' => 'Professional plan',
                'price_per_month' => 3000,
                'price_per_year' => null,               
            ]  ,
            [
                'plan_category_id' => 3,
                'name_ar' => 'باقة الشركات الصغيرة',
                'name_en' => 'Professional plan',
                'price_per_month' => 3000,
                'price_per_year' => null,               
            ]  ,
            [
                'plan_category_id' => 2,
                'name_ar' => 'باقة احترافية',
                'name_en' => 'Professional plan',
                'price_per_month' => 3000,
                'price_per_year' => null,               
            ]  ,
            [
                'plan_category_id' => 2,
                'name_ar' => 'باقة احترافية',
                'name_en' => 'Professional plan',
                'price_per_month' => 3000,
                'price_per_year' => null,               
            ]  ,



        ];
    }
}

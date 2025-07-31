<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companyTypes = [
            [
                'name_ar' => 'شركة',
                'name_en' => 'Company',
                'status' => 1
            ]  ,
            [
                'name_ar' => 'مؤسسة',
                'name_en' => 'Foundation',
                'status' => 1
            ],
                [
                'name_ar' => 'عقاريه',
                'name_en' => 'Akkarya',
                'status' => 1
            ]
        ];
    }
}

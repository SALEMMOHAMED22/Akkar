<?php

namespace Database\Seeders;

use App\Models\CompanyType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            ]  ,
            [
                'name_ar' => 'مؤسسة',
                'name_en' => 'Foundation',
            ],
                [
                'name_ar' => 'عقارية',
                'name_en' => 'Akkarya',
            ]
        ];

        foreach ($companyTypes as $companyType) {
            CompanyType::create($companyType);
        }
    }
}

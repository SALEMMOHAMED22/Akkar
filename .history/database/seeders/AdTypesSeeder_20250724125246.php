<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name_ar' => 'خدمات عاين',
                'name_en' => '3ayin Services',
            ],
            [
                'name_ar' => 'عقارات',
                'name_en' => 'Real Estates',
            ],
            [
                'name_ar' => 'عقارات',
                'name_en' => 'Real Estates',
            ],
        ];
    }
}

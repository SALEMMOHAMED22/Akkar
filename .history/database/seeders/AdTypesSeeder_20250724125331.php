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
                'name_ar' => 'عاين افيليت',
                'name_en' => '3ayin Affiliate',
            ],
            [
                'name_ar' => 'عاين شركات',
                'name_en' => '3ayin Companies',
            ],
        ];
    }
}

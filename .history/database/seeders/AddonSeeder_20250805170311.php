<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addons = [
            [
                'name_ar' => '',
                'name_en' => '',
                'desc_ar' => '',
                'desc_en' => '',
                'price' => 0,
            ]  ,
        ];
    }
}

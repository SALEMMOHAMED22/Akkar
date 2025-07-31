<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = [
            [
                'category_id' => 1,
                'name_ar' => 'تسويق عاين',
                'name_en' => '3ayin Marketing',
                
            ] ,
            [
                'category_id' => 1,
                'name_ar' => 'تسويق ذاتي',
                'name_en' => 'Self Marketing',
                
            ] ,
            [
                'category_id' => 1,
                'name_ar' => 'تسويق بالوكاله',
                'name_en' => 'Agency Marketing',
                
            ] ,
            [
                'category_id' => 2,
                'name_ar' => 'ا',
                'name_en' => 'Real Estate ERP',
                
            ] ,
            [
                'category_id' => 2,
                'name_ar' => 'برامج تعليميه',
                'name_en' => 'CRM Management',
                
            ] ,
            [
                'category_id' => 2,
                'name_ar' => 'برامج هندسيه',
                'name_en' => '3ayin Marketing',
                
            ] ,


        ];
    }
}

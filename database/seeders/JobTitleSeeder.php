<?php

namespace Database\Seeders;

use App\Models\JobTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $jobTitles = [
            [
                'name_ar' => 'عقاري',
                'name_en' => 'Akkary'
            ] ,
            [
                'name_ar' => 'هندسي',
                'name_en' => 'Hendisy',
            ]  ,
            [
                'name_ar' => 'اداري',
                'name_en' => 'Adary',
            ] ,

       ];

       foreach ($jobTitles as $jobTitle) {
           JobTitle::create($jobTitle);
       }
    }
}

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
                'name_en' => 'ِAkkary'
            ] ,
            [
                
            ]  
       ];
    }
}

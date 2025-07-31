<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermsAndConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TermsAndCondition::create([
            'content_ar' => 'هذه سياسة الخصوصية الخاصة بنا... ',
            'content_en' => 'This is our privacy policy...', 
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TermsAndCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

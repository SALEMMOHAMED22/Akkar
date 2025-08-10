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
            'title_ar' => 'الشروط والأحكام',
            'title_en' => 'Terms and Conditions',
            'content_ar' => 'هذه الشروط والأحكام الخاصة باستخدام المنصة...',
            'content_en' => 'These are the terms and conditions for using the platform...', 
        ]);
    }
}

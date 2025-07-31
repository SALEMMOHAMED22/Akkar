<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                "question_ar" => "كيف يعمل التطبيق",
                "question_en" => "How does the app work?",
                "answer_ar" => "يتم تسجيل الحساب والتسجيل في التطبيق",
                "answer_en" => "The account is registered and registered in the app",
            ],

            [
                
            ],
        ];

    }
}

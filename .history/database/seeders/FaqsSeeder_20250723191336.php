<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                "question_ar" => " يعمل ",
                "question_en" => "What is your return policy?",
                "answer_ar" => "يتم تسجيل الحساب والتسجيل في التطبيق",
                "answer_en" => "The account is registered and registered in the app",
                

            ],
            [
                "question_ar" => "كيف يعمل التطبيق",
                "question_en" => "How does the app work?",
                "answer_ar" => "يتم تسجيل الحساب والتسجيل في التطبيق",
                "answer_en" => "The account is registered and registered in the app",


            ],
            [
                "question_ar" => "كيف يعمل التطبيق",
                "question_en" => "How does the app work?",
                "answer_ar" => "يتم تسجيل الحساب والتسجيل في التطبيق",
                "answer_en" => "The account is registered and registered in the app",


            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }



    }
}

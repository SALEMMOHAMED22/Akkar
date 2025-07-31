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
                "question_ar" => "ما هي سياسة الاسترجاع",
                "question_en" => "What is your return policy?",
                "answer_ar" => "يمكنك إرجاع المنتج في غضون 30 يومًا.",
                "answer_en" => "You can return any product within 30 days.",
                

            ],
            [
                "question_ar" => "كيف يتم الاتصال بالدعم الفني",
                "question_en" => "How can I contact support",
                "answer_ar" => "يمكنك الاتصال بالدعم الفني عبر صفحة الاتصال أو بالبريد الإلكتروني",
                "answer_en" => "You can contact support via the contact  page or by email",


            ],
            [
                "question_ar" => "ما هي المستندات المطلوبة للتحقق",
                "question_en" => "What documents are required for verification",
                "answer_ar" => "يتم تسجيل الحساب والتسجيل في التطبيق",
                "answer_en" => "The account is registered and registered in the app",


            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }



    }
}

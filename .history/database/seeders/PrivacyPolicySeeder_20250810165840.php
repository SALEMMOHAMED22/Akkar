<?php

namespace Database\Seeders;

use App\Models\PrivacyPolicy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivacyPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrivacyPolicy::create([
            'title_ar' => 'سياسة الخصوصية',
            'title_en' => 'Privacy Policy',
            'content_ar' => 'هذه سياسة الخصوصية الخاصة بنا... ',
            'content_en' => 'This is our privacy policy...', 
            'image' => 'privacy-policy.jpg',
        ]);
    }
}

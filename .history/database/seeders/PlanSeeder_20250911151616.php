<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'name_ar' => 'أساسي',
            'name_en' => 'Basic',
            'price' => 0,
            'days' => 30, 
            'ads_limit' => 3,
            // 'unlimited_images' => true,
            'video' => false,
            'vr_tours' => 0,
            'search_priority' => 'normal',
            'reports' => 'none',
            'team_members' => 0,
        ]);

        Plan::create([
            'name_ar' => 'احترافي',
            'name_en' => 'Professional',
            'price' => 400,
            'days' => 30, 
            'ads_limit' => 20,
            'unlimited_images' => true,
            'video' => true,
            'vr_tours' => 5,
            'search_priority' => 'highlighted',
            'reports' => 'basic',
            'team_members' => 2,
        ]);

        Plan::create([
            'name_ar' => 'النخبة',
            'name_en' => 'Elite',
            'price' => 1000,
            'days' => 30, 
            'ads_limit' => 100,
            'unlimited_images' => true,
            'video' => true,
            'vr_tours' => 25,
            'search_priority' => 'top',
            'reports' => 'advanced',
            'team_members' => 5,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\PlanFeature;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planFeatures = [
            [
                'plan_id' => 1,
                'feature_id' => 1,
                'count' => null,
            ], 
            [
                'plan_id' => 1,
                'feature_id' => 2,
                'count' => 5,
            ],
            [
                'plan_id' => 1,
                'feature_id' => 3,
                'count' => 5,
            ],
            [
                'plan_id' => 1,
                'feature_id' => 4,
                'count' => null,
            ],
            [
                'plan_id' => 1,
                'feature_id' => 5,
                'count' => 5,
            ],
        ];
            
    }
}

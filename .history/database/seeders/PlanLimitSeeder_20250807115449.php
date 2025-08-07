<?php

namespace Database\Seeders;

use App\Models\PlanLimit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanLimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planLimits = [
            [
                'plan_id' => 1,
                'limit_id' => 1,
            ]  ,
           
        ];

        foreach($planLimits as $planLimit){
            PlanLimit::create($planLimit);
        }
    }
}

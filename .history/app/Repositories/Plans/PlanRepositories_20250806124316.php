<?php

namespace App\Repositories\Plans;

use App\Models\Plan;
use App\Models\PlanCategory;
use App\Interfaces\Plans\PlanRepositoryInterface;

class PlanRepositories implements PlanRepositoryInterface
{
    
public function getAddons()
    public function getPlansWithFeatures(){
        $plansWithFeatures = PlanCategory::with('plans.features', 'plans.limits')->get();

        if(!$plansWithFeatures) {
            return false;
        }
        return $plansWithFeatures;
    }

}

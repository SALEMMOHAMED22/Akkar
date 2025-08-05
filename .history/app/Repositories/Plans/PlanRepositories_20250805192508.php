<?php

namespace App\Repositories\Plans;

use App\Models\Plan;
use App\Models\PlanCategory;
use App\Interfaces\Plans\PlanRepositoryInterface;

class PlanRepositories implements PlanRepositoryInterface
{
    
    public function getPlanCategories()
    {
        $planCategories = PlanCategory::all();

        if(!$planCategories) {
            return false;
        }
        return $planCategories;
    }

    public function getPlansWithFeatures(){
        $plansWithFeatures = PlanCategory

        if(!$plansWithFeatures) {
            return false;
        }
        return $plansWithFeatures;
    }
}

<?php

namespace App\Repositories\Plans;

use App\Models\PlanCategory;
use App\Interfaces\Plans\PlanRepositoryInterface;

class PlanRepositories implements PlanRepositoryInterface
{
    
    public function getPlanCategories()
    {
        $planCategories = PlanCategory::all();

        if(!$planCategories) {
            return apiResponse(404, 'Plan categories not found');
        }
        return 
    }
}

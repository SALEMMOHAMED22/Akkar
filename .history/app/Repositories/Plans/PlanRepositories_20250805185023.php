<?php

namespace App\Repositories\Plans;

use App\Interfaces\Plans\PlanRepositoryInterface;

class PlanRepositories implements PlanRepositoryInterface
{
    
    public function getPlanCategories()
    {
        $planCategories = PlanCategory::all();
    }
}

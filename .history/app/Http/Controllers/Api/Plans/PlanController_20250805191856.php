<?php

namespace App\Http\Controllers\Api\Plans;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlanCategoryResource;
use App\Interfaces\Plans\PlanRepositoryInterface;

class PlanController extends Controller
{
    protected $planRepository;
    public function __construct(PlanRepositoryInterface $planRepository)
    {
        $this->planRepository = $planRepository;
    }


    public function getPlanCategories()
    {
        $planCategories = $this->planRepository->getPlanCategories();

        if(!$planCategories) {
            return apiResponse(404, 'Plan categories not found');
        }
        return apiResponse(200, 'Plan categories fetched successfully', PlanCategoryResource::collection($planCategories));
    }

    public function getPlansWithFeatures(){
        $plans = $this->planRepository->getPlansWithFeatures();
        if (!$plans) {
            return apiResponse(404, 'Plans not found');
        }
        return apiResponse(200, 'Plans fetched successfully', PlanResource::collection($plans));
    }
}

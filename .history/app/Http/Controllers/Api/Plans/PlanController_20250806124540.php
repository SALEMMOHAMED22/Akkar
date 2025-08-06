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


    public function getAddons()
    {
        $planAddons = $this->planRepository->getAddons();

        if(!$planAddons) {
            return apiResponse(404, 'Plan Addons not found');
        }
        return apiResponse(200, 'Plan addons fetched successfully', $planAddons);
    }

    public function getPlansWithFeatures(){
        $plans = $this->planRepository->getPlansWithFeatures();
        if (!$plans) {
            return apiResponse(404, 'Plans not found');
        }
        return apiResponse(200, 'Plans fetched successfully', PlanCategoryResource::collection($plans));
    }
}

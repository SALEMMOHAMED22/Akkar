<?php

namespace App\Http\Controllers\Api\Plans;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Plans\PlanRepositoryInterface;

class PlanController extends Controller
{
    protected $planRepository;
    public function __construct(PlanRepositoryInterface $planRepository)
    {
        $this->planRepository = $planRepository;
    }


    public function getPla
}

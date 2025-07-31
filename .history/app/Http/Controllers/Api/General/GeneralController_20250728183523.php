<?php

namespace App\Http\Controllers\Api\General;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutUsResource;
use App\Http\Resources\HowItWorksResource;
use App\Interfaces\General\GeneralRepositoryInterface;

class GeneralController extends Controller
{
    protected $generalRepo;
    public function __construct(GeneralRepositoryInterface $generalRepo)
    {
        $this->generalRepo = $generalRepo;
    }


    public function aboutUs()
    {
        $aboutUs = $this->generalRepo->getAboutUs();

        if(!$aboutUs){
            return apiResponse(404, 'About us not found');
        }

        return apiResponse(200, 'About us retrieved successfully', new AboutUsResource($aboutUs));


    }

    public function howItWorks()
    {
        $howItWorks = $this->generalRepo->getHowItWorks();

        if(!$howItWorks){
            return apiResponse(404, 'How it works not found');
        }

        return apiResponse(200, 'How it works retrieved successfully', new HowItWorksResource($howItWorks));
    }


    public function settings(){

        $settings = $this->generalRepo->getSettings();
        if(!$settings){
            return apiResponse(404, 'Settings not found');
        }
        return apiResponse(200, 'Settings retrieved successfully', );
    }
}

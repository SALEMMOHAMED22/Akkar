<?php

namespace App\Http\Controllers\Api\General;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutUsResource;
use App\Http\Resources\SettingResource;
use App\Http\Resources\HowItWorksResource;
use App\Interfaces\General\GeneralRepositoryInterface;

class GeneralController extends Controller
{
    protected $generalRepo;
    public function __construct(GeneralRepositoryInterface $generalRepo)
    {
        $this->generalRepo = $generalRepo;
    }

    public function jobTitles(){
        $jobTitles = $this->generalRepo->getJobTitles();
        if(!$jobTitles){
            return apiResponse(404, 'Job titles not found');
        }
        return apiResponse(200, 'Job titles retrieved successfully', $jobTitles);
    }

    public function companyTypes()



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
        return apiResponse(200, 'Settings retrieved successfully', new SettingResource($settings));
    }

    public function privacyPolicy(){

        $privacyPolicy = $this->generalRepo->getPrivacyPolicy();
        if(!$privacyPolicy){
            return apiResponse(404, 'Privacy policy not found');
        }
        return apiResponse(200, 'Privacy policy retrieved successfully', new SettingResource($privacyPolicy));
    }


    public function termsAndConditions(){
        $termsAndConditions = $this->generalRepo->getTermsAndConditions();
        if(!$termsAndConditions){
            return apiResponse(404, 'Terms and conditions not found');
        }
        return apiResponse(200, 'Terms and conditions retrieved successfully', new SettingResource($termsAndConditions));
    }
}

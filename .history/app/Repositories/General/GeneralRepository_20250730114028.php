<?php

namespace App\Repositories\General;

use App\Models\AboutUs;
use App\Models\Setting;
use App\Models\JobTitle;
use App\Models\HowItWorks;
use App\Models\PrivacyPolicy;
use App\Models\TermsAndCondition;
use App\Interfaces\General\GeneralRepositoryInterface;
use App\Models\CompanyType;

class GeneralRepository implements GeneralRepositoryInterface
{
    
    public function getJobTitles(){
        $jobTitles = JobTitle::all();
        if(!$jobTitles){
            return false;
        }
        return $jobTitles;
    }

    public function getCompanyTypes(){
        $companyTypes = CompanyType::all();
        if(!$companyTypes){
            return false;
        }
        return $companyTypes;
    }

    public function getAboutUs()
    {
       $aboutUs = AboutUs::first();

       if(!$aboutUs){
        return false;
       }

       return $aboutUs;
    }

    public function getHowItWorks()
    {
        $howItWorks = HowItWorks::first();

        if(!$howItWorks){
            return false;
        }

        return $howItWorks;
    }

    public function getSettings(){
        $settings = Setting::first();

        if(!$settings){
            return false;
        }

        return $settings;
    }

    public function getPrivacyPolicy(){
        $privacyPolicy = PrivacyPolicy::first();

        if(!$privacyPolicy){
            return false;
        }

        return $privacyPolicy;
    }

    public function getTermsAndConditions()
    {
        $termsAndConditions = TermsAndCondition::first();

        if(!$termsAndConditions){
            return false;
        }

        return $termsAndConditions;
        
    }
}

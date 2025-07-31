<?php

namespace App\Repositories\General;

use App\Models\AboutUs;
use App\Interfaces\General\GeneralRepositoryInterface;
use App\Models\HowItWorks;
use App\Models\Setting;

class GeneralRepository implements GeneralRepositoryInterface
{
    

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
        $settings = Setting
    }
}

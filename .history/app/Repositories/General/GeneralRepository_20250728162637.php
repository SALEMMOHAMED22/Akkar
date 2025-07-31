<?php

namespace App\Repositories\General;

use App\Models\AboutUs;
use App\Interfaces\General\GeneralRepositoryInterface;

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
}

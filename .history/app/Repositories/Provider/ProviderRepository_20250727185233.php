<?php

namespace App\Repositories\Provider;

use App\Models\User;
use App\Interfaces\Provider\ProviderRepositoryInterface;

class ProviderRepository implements ProviderRepositoryInterface
{
    
    public function getProviderProfile(){

        $user = auth('sanctum')->user();

        if(!$user){
            return false;
        }
        return $user;

       
    }


   public function getProviderAds() {
        $user = auth('sanctum')->user();

        $data 
   }

   public function getProviderAdsReviews() {
       
   }

}

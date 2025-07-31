<?php

namespace App\Repositories\Provider;

use App\Models\User;
use App\Interfaces\Provider\ProviderRepositoryInterface;

class ProviderRepository implements ProviderRepositoryInterface
{
    
    public function getProviderProfile(){

        $user = auth('sanctum')->user();
     


       
    }


   public function getProviderAds() {
       
   }

   public function getProviderAdsReviews() {
       
   }

}

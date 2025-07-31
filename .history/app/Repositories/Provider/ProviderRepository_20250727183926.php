<?php

namespace App\Repositories\Provider;

use App\Models\User;
use App\Interfaces\Provider\ProviderRepositoryInterface;

class ProviderRepository implements ProviderRepositoryInterface
{
    
    public function getProviderProfile($id){

      $data = User::find($id);
      if()


       
    }


   public function getProviderAds($id) {
       
   }

   public function getProviderAdsReviews($id) {
       
   }

}

<?php

namespace App\Repositories\Provider;

use App\Models\User;
use App\Interfaces\Provider\ProviderRepositoryInterface;

class ProviderRepository implements ProviderRepositoryInterface
{
    
    public function getProviderProfile(){

      $data = User::find($id);
      if(!$data){
        return false;
      }
      return $data;


       
    }


   public function getProviderAds() {
       
   }

   public function getProviderAdsReviews() {
       
   }

}

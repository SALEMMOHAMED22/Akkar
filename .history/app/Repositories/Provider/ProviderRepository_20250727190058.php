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

        $ads =  $user->ads()
        ->with(['images' => fn($q) => $q->limit(1)])
        ->withAvg('reviews', 'rate')
        ->withCount('reviews')
        ->latest()
        ->paginate(9);

        if(!$ads){
            return false;
        }
        return $ads;
   }    

   public function getProviderAdsReviews() {
       
    
   }

}

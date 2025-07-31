<?php

namespace App\Repositories\Provider;

use App\Models\User;
use App\Interfaces\Provider\ProviderRepositoryInterface;
use App\Models\AdReview;

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
        $user = auth('sanctum')->user();

        $reviews = AdReview::whereIn('ad_id' , $user->ads()->pluck('id'))
        ->with('user')
        ->latest()
        ->paginate(3);

        if(!$reviews){
            return false;
        }
        return $reviews;

   }

   public function getProviderStatistics(){

    $user = auth('sanctum')->user();

        

   }

}

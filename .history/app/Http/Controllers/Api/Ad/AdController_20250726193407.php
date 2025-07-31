<?php

namespace App\Http\Controllers\Api\Ad;

use Illuminate\Http\Request;
use App\Http\Requests\AdRequest;
use App\Http\Resources\AdResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdReviewResource;
use App\Interfaces\Ad\AdRepositoryInterface;

class AdController extends Controller
{
    public $adRepo;
    public function __construct(AdRepositoryInterface $adRepo)
    {
        $this->adRepo = $adRepo;
    }


    public function storeAd(AdRequest $request)
    {
       $ad = $this->adRepo->storeAd($request->all());
        if(!$ad){
            return apiResponse(400 , 'Ad not created');
        }

        return apiResponse(200 , 'Ad created successfully' , new AdResource($ad->load(['adCategory', 'adSubCategory', 'adSubSubCategory' , 'user' , 'images' , 'userWorks' , 'adFiles' ])) );

    }

    public function getAll(){
        $ads = $this->adRepo->getAll();
        if(!$ads){
            return apiResponse(400 , 'No ads found');
        }
        return apiResponse(200 , 'Ads' , AdResource::collection($ads->load(['adCategory', 'adSubCategory', 'adSubSubCategory' ,  'user' , 'images' , 'userWorks' , 'adFiles' ])) );
    }

    public function storeReview($adId , Request $request){

       $review = $this->adRepo->storeReview($adId , $request->all());
    //    if($review === 'notFound'){
    //        return apiResponse(400 , 'Ad not found');
    //    }
    //    if($review === 'reviewNotCreated'){
    //        return apiResponse(400 , 'Review not created');
    //    }

    if(! $review){
        return apiResponse(400 , 'Review not created');
    }
       return apiResponse(200 , 'Review created successfully' , new AdReviewResource($review->load(['user'])));
    }



    public function getAdReviews($adId){
        $reviews = $this->adRepo->getAdReviews($adId);
        if(!$reviews || $reviews->cooun){
            return apiResponse(400 , 'No reviews found');
        }
        return apiResponse(200 , 'Reviews' , AdReviewResource::collection($reviews->load(['user'])));
    }
}

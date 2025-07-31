<?php

namespace App\Http\Controllers\Api\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdUserResource;
use App\Http\Resources\AdReviewResource;
use App\Http\Resources\RelatedAdsResource;
use App\Interfaces\Provider\ProviderRepositoryInterface;

class ProviderController extends Controller
{
    protected $providerRepo;

    public function __construct(ProviderRepositoryInterface $providerRepo)
    {
        $this->providerRepo = $providerRepo;
    }

    public function getProviderProfile() {
        
        $data = $this->providerRepo->getProviderProfile();

        if(!$data){
            return apiResponse(400, 'Provider not found');
        }

        return apiResponse(200, 'Provider retrieved successfully', new AdUserResource($data));
    }

 
    public function getProviderAds(){
        $ads = $this->providerRepo->getProviderAds();

        if(!$ads){
            return apiResponse(400, 'No ads found');
        }
        return apiResponse(200, 'Ads retrieved successfully', RelatedAdsResource::collection($ads) , [
            'current_page' => $ads->currentPage(),
            'last_page' => $ads->lastPage(),
            'per_page' => $ads->perPage(),
            'total' => $ads->total(),
        ]);
    }


    public function getProviderAdsReviews(){
        $reviews = $this->providerRepo->getProviderAdsReviews();

        if(!$reviews){
            return apiResponse(400, 'No reviews found');
        }

        return apiResponse(200, 'Reviews retrieved successfully', AdReviewResource::collection($reviews) , [
            'current_page' => $reviews->currentPage(),
            'last_page' => $reviews->lastPage(),
            'per_page' => $reviews->perPage(),
            'total' => $reviews->total(),
        ]);
    }


    public function getProviderStatistics(){
        $stats = $this->providerRepo->getProviderStatistics();

        if(!$stats){
            return apiResponse(400, 'No statistics found');
        }
        return apiResponse(200, 'Statistics retrieved successfully', $stats);

    }


    public function getProviderProfileByProvId() {
        
        $data = $this->providerRepo->getProviderProfileByProvId();

        if(!$data){
            return apiResponse(400, 'Provider not found');
        }

        return apiResponse(200, 'Provider retrieved successfully', new AdUserResource($data));
    }

    public function getProviderAds(){
        $ads = $this->providerRepo->getProviderAds();

        if(!$ads){
            return apiResponse(400, 'No ads found');
        }
        return apiResponse(200, 'Ads retrieved successfully', RelatedAdsResource::collection($ads) , [
            'current_page' => $ads->currentPage(),
            'last_page' => $ads->lastPage(),
            'per_page' => $ads->perPage(),
            'total' => $ads->total(),
        ]);
    }


}

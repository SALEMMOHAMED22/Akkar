<?php

namespace App\Http\Controllers\Api\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdUserResource;
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


    public function 


}

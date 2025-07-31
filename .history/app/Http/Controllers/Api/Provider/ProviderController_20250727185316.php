<?php

namespace App\Http\Controllers\Api\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdUserResource;
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
    }


}

<?php

namespace App\Http\Controllers\Api\Ad;

use Illuminate\Http\Request;
use App\Http\Requests\AdRequest;
use App\Http\Resources\AdResource;
use App\Http\Controllers\Controller;
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

        return apiResponse(200 , 'Ad created successfully' , new AdResource($ad->load([''])) );

    }
}

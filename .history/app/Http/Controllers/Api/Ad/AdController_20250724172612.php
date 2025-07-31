<?php

namespace App\Http\Controllers\Api\Ad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdRequest;
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
        if(!$ad)

    }
}

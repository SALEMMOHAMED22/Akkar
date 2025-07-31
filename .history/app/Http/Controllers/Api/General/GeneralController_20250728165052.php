<?php

namespace App\Http\Controllers\Api\General;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutUsResource;
use App\Interfaces\General\GeneralRepositoryInterface;

class GeneralController extends Controller
{
    protected $generalRepo;
    public function __construct(GeneralRepositoryInterface $generalRepo)
    {
        $this->generalRepo = $generalRepo;
    }


    public function aboutUs()
    {
        $aboutUs = $this->generalRepo->getAboutUs();

        if(!$aboutUs){
            return apiResponse(404, 'About us not found');
        }

        return apiResponse(200, 'About us retrieved successfully', new AboutUsResource($aboutUs));


    }

    public function 
}

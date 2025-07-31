<?php

namespace App\Http\Controllers\Api\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Provider\ProviderRepositoryInterface;

class ProviderController extends Controller
{
    protected $providerRepo;

    public function __construct(ProviderRepositoryInterface $providerRepo)
    {
        $this->providerRepo = $providerRepo;
    }



    
}

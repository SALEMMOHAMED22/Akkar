<?php

namespace App\Http\Controllers\Api\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    

    public function __construct(ProviderRepositoryInterface $providerRepo)
    {
        $this->providerRepo = $providerRepo;
    }
}

<?php

namespace App\Interfaces\Provider;

interface ProviderRepositoryInterface
{
    public function getProviderProfile() ; 
    public function getProviderAds($id) ; 
    public function getProviderAdsReviews($id) ; 

}

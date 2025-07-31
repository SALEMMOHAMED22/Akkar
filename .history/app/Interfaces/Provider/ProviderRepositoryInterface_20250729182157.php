<?php

namespace App\Interfaces\Provider;

interface ProviderRepositoryInterface
{
    public function getProviderProfile() ; 
    public function getProviderAds() ; 
    public function getProviderAdsReviews() ; 
    public function getProviderStatistics();
    

}

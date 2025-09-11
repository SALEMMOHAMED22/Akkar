<?php

namespace App\Interfaces\Provider;

interface ProviderRepositoryInterface
{
    public function getProviderProfile() ; 
    public function getProviderAds($) ; 
    public function getProviderAdsReviews() ; 
    public function getProviderStatistics();
    public function getProviderProfileByProvId($provId);
    public function getProviderAdsByProvId($provId);
    public function getProviderAdsReviewsByProvId($provId);
    public function getProviderStatisticsByProvId($provId);

}

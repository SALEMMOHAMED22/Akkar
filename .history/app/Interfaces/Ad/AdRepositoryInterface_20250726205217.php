<?php

namespace App\Interfaces\Ad;

interface AdRepositoryInterface
{
    public function storeAd(array $data);
    public function getAll();
    public function storeReview($adId , array $data);
    public function getAdReviews($adId);
    public 
}

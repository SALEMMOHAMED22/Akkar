<?php

namespace App\Interfaces\Ad;

interface AdRepositoryInterface
{
    public function storeAd(array $data);
    public function getAll();
    public function storeReview(array $data);
    public function getAdReviews($adId);
    public function getAdById($adId); 
    public function getAdsByCatId($catId);
    public function getAdsBySubCatId($subCatId);
    public function getAdsBySubSubCatId($subSubCatId);
    public function getRelatedAds($adId);
    public function searchAds($search);

    public function filterAds(array $filters);
    public function filterMapPdf();
    public function filterMapIndividual();
    
}

<?php

namespace App\Http\Controllers\Api\Ad;

use Illuminate\Http\Request;
use App\Http\Requests\AdRequest;
use App\Http\Resources\AdResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterAdsRequest;
use App\Http\Requests\StoreAdReviewRequest;
use App\Http\Resources\AdFilterMapPdfResource;
use App\Http\Resources\AdFilterMapResource;
use App\Http\Resources\AdReviewResource;
use App\Http\Resources\RelatedAdsResource;
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
        if (!$ad) {
            return apiResponse(400, 'Ad not created');
        }

        return apiResponse(200, , new AdResource($ad->load(['adCategory', 'adSubCategory', 'adSubSubCategory', 'user', 'images', 'userWorks', 'adFiles'])));
    }

    public function getAll()
    {
        $ads = $this->adRepo->getAll();
        if (!$ads) {
            return apiResponse(400, 'No ads found');
        }
        return apiResponse(200, 'Ads', AdResource::collection($ads), [
            'current_page' => $ads->currentPage(),
            'last_page' => $ads->lastPage(),
            'per_page' => $ads->perPage(),
            'total' => $ads->total(),
        ]);
    }
 
    public function storeReview(StoreAdReviewRequest $request)
    {


        $review = $this->adRepo->storeReview($request->all());
        //    if($review === 'notFound'){
        //        return apiResponse(400 , 'Ad not found');
        //    }
        //    if($review === 'reviewNotCreated'){
        //        return apiResponse(400 , 'Review not created');
        //    }

        if (! $review) {
            return apiResponse(400, 'Review not created');
        }
        return apiResponse(200, 'Review created successfully', new AdReviewResource($review->load(['user'])));
    }



    public function getAdReviews($adId)
    {
        $reviews = $this->adRepo->getAdReviews($adId);
        if (!$reviews || $reviews->count() == 0) {
            return apiResponse(400, 'No reviews found');
        }
        return apiResponse(200, 'Reviews retrieved successfully', AdReviewResource::collection($reviews), [
            'current_page' => $reviews->currentPage(),
            'last_page' => $reviews->lastPage(),
            'per_page' => $reviews->perPage(),
            'total' => $reviews->total(),
        ]);
    }

    public function getAdById($adId)
    {
        $ad = $this->adRepo->getAdById($adId);
        if (!$ad) {
            return apiResponse(400, 'Ad not found');
        }

        return apiResponse(200, 'Ad retrieved successfully', new AdResource($ad));
    }


    public function getAdsByCatId($catId)
    {
        $ads = $this->adRepo->getAdsByCatId($catId);

        if (! $ads) {
            return apiResponse(400, 'No ads found');
        }
        return apiResponse(200, 'Ads retrieved successfully', RelatedAdsResource::collection($ads), [
            'current_page' => $ads->currentPage(),
            'last_page' => $ads->lastPage(),
            'per_page' => $ads->perPage(),
            'total' => $ads->total(),
        ]);
    }

    public function getAdsBySubCatId($subCatId)
    {
        $ads = $this->adRepo->getAdsBySubCatId($subCatId);

        if (! $ads) {
            return apiResponse(400, 'No ads found');
        }
        return apiResponse(200, 'Ads retrieved successfully', RelatedAdsResource::collection($ads), [
            'current_page' => $ads->currentPage(),
            'last_page' => $ads->lastPage(),
            'per_page' => $ads->perPage(),
            'total' => $ads->total(),
        ]);
    }

    public function getAdsBySubSubCatId($subSubCatId)
    {

        $ads = $this->adRepo->getAdsBySubSubCatId($subSubCatId);

        if (! $ads) {
            return apiResponse(400, 'No ads found');
        }
        return apiResponse(200, 'Ads retrieved successfully', RelatedAdsResource::collection($ads), [
            'current_page' => $ads->currentPage(),
            'last_page' => $ads->lastPage(),
            'per_page' => $ads->perPage(),
            'total' => $ads->total(),
        ]);
    }

    public function getRelatedAds($adId)
    {
        $ads = $this->adRepo->getRelatedAds($adId);
        return apiResponse(200, 'Related ads', RelatedAdsResource::collection($ads), [
            'current_page' => $ads->currentPage(),
            'last_page' => $ads->lastPage(),
            'per_page' => $ads->perPage(),
            'total' => $ads->total(),
        ]);
    }


    public function filterAds(FilterAdsRequest $request)
    {
        $filters = $request->only(['ad_sub_category_id', 'price', 'rate']);

        $ads = $this->adRepo->filterAds($filters);

        if (!$ads) {
            return apiResponse(400, 'No ads found');
        }

        return apiResponse(
            200,
            'Filtered ads',
            RelatedAdsResource::collection($ads),
            [
                'current_page' => $ads->currentPage(),
                'last_page' => $ads->lastPage(),
                'per_page' => $ads->perPage(),
                'total' => $ads->total(),
            ],
        );
    }


    public function searchAds(Request $request){
        $request->validate([
            'search' => 'required|string',
        ]);

        $search = $request->search;
 
        $ads = $this->adRepo->searchAds($search);
        if (!$ads) {
            return apiResponse(400, 'No ads found');
        }
        return apiResponse(200, 'Ads retrieved successfully', RelatedAdsResource::collection($ads), [
            'current_page' => $ads->currentPage(),
            'last_page' => $ads->lastPage(),
            'per_page' => $ads->perPage(),
            'total' => $ads->total(),
        ]);
    }


    public function filterMapPdf(){
        $ads = $this->adRepo->filterMapPdf();
        if (!$ads) {
            return apiResponse(400, 'No ads found');
        }
        return apiResponse(200, 'Ads retrieved successfully', AdFilterMapPdfResource::collection($ads));
    }

    public function filterMapIndividual(){
        $ads = $this->adRepo->filterMapIndividual();
        if (!$ads) {
            return apiResponse(400, 'No ads found');
        }
        return apiResponse(200, 'Ads retrieved successfully', AdFilterMapResource::collection($ads));
    }

    public function filterMapCompany(){
        $ads = $this->adRepo->filterMapCompany();
        if (!$ads) {
            return apiResponse(400, 'No ads found');
        }
        return apiResponse(200, 'Ads retrieved successfully', AdFilterMapResource::collection($ads));
    }
}

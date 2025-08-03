<?php

namespace App\Repositories\Ad;

use App\Interfaces\Ad\AdRepositoryInterface;
use App\Models\Ad;
use App\Utils\ImageManger;

class AdRepository implements AdRepositoryInterface
{
    public function storeAd(array $data)
    {
        try {
            $user = auth('sanctum')->user();


            $ad = $user->ads()->create([
                // 'user_id' => $user->id,
                'ad_category_id' => $data['ad_category_id'],
                'ad_sub_category_id' => $data['ad_sub_category_id'],
                'ad_sub_sub_category_id' => $data['ad_sub_sub_category_id'] ?? null,
                'ad_name_en' => $data['ad_name_en'],
                'ad_name_ar' => $data['ad_name_ar'],
                'price' => $data['price'],
                'small_desc_en' => $data['small_desc_en'] ?? null,
                'small_desc_ar' => $data['small_desc_ar'] ?? null,
                'desc_en' => $data['desc_en'] ?? null,
                'desc_ar' => $data['desc_ar'] ?? null,
                'phone' => $data['phone'] ?? null,
                'location' => $data['location'] ?? null,
                'AR_VR' => $data['AR_VR'] ?? null,
            ]);


            if (isset($data['images']) && !empty($data['images'])) {
                $uploadedImages = ImageManger::uploadMultiImage('/storage/ads', $data['images']);

                foreach ($uploadedImages as $image) {
                    $ad->images()->create(['image' => $image]);
                }
            }


            if (isset($data['user_works']) && !empty($data['user_works'])) {
                $uploadedUserWorks = ImageManger::uploadMultiImage('/storage/ads', $data['user_works']);

                foreach ($uploadedUserWorks as $image) {
                    $ad->userWorks()->create([
                        //   'user_id' => $user->id,
                        'image' => $image,
                    ]);
                }
            }

            if (isset($data['files']) && !empty($data['files'])) {
                $uploadedFiles = ImageManger::uploadMultiFile('/storage/ads/files', $data['files']);

                foreach ($uploadedFiles as $file) {
                    $ad->adFiles()->create([
                        'file' => $file['path'],
                        'original_name' => $file['original_name'],
                        'size' => $file['size'],
                    ]);
                }
            }

            return $ad;
        } catch (\Exception $e) {
            logger()->error('Error while creating ad: ' . $e->getMessage());
            return false;
        }
    }


    public function getAll()
    {

        $ads = Ad::with([
            'adCategory',
            'adSubCategory',
            'adSubSubCategory',
            'user',
            'images',
            'userWorks',
            'adFiles',
            'reviews',
        ])->latest()->paginate(9);

        if (! $ads) {
            return false;
        }

        return $ads;
    }


    public function storeReview(array $data)
    {
        $adId = $data['ad_id'];
        $ad = Ad::find($adId);
        if (! $ad) {
            return false;
        }

        $review = $ad->reviews()->create([
            'ad_id' => $adId,
            'user_id' => auth('sanctum')->user()->id,
            'rate' => $data['rate'],
            'comment' => $data['comment'] ?? null,
        ]);

        if (! $review) {
            return false;
        }
        // dd($review);

        return $review;
    }

    public function getAdReviews($adId)
    {

        $ad = Ad::find($adId);
        if (! $ad) {
            return false;
        }

        $reviews = $ad->reviews()->with(['user'])->latest()->paginate(5);

        if (! $reviews) {
            return false;
        }

        return $reviews;
    }

    public function getAdById($adId)
    {
        $ad = Ad::with([
            'adCategory',
            'adSubCategory',
            'adSubSubCategory',
            'user',
            'images',
            'userWorks',
            'adFiles',
            'reviews'
        ])->find($adId);
        if (! $ad) {
            return false;
        }

        // dd($ad);

        return $ad;
    }


    public function getAdsByCatId($catId)
    {
        $ads = Ad::where('ad_category_id', $catId)->with([
            'adCategory',
            'adSubCategory',
            'adSubSubCategory',
            'images' => fn($q) => $q->limit(1),
            'reviews',
        ])
            ->withAvg('reviews', 'rate')
            ->withCount('reviews')
            ->latest()->paginate(9);


        if (! $ads) {
            return false;
        }
        return $ads;
    }


    public function getAdsBySubCatId($subCatId)
    {
        $ads = Ad::where('ad_sub_category_id', $subCatId)->with([
            'adCategory',
            'adSubCategory',
            'adSubSubCategory',
            'images' => fn($q) => $q->limit(1),
            'reviews',
        ])
            ->withAvg('reviews', 'rate')
            ->withCount('reviews')
            ->latest()->paginate(9);


        if (! $ads) {
            return false;
        }
        return $ads;
    }

    public function getAdsBySubSubCatId($subSubCatId)
    {

        $ads = Ad::where('ad_sub_sub_category_id', $subSubCatId)->with([
            'adCategory',
            'adSubCategory',
            'adSubSubCategory',
            'images' => fn($q) => $q->limit(1),
            'reviews',
        ])
            ->withAvg('reviews', 'rate')
            ->withCount('reviews')
            ->latest()->paginate(9);


        if (! $ads) {
            return false;
        }
        return $ads;
    }


    public function filterAds(array $filters)
    {
        return Ad::with(['reviews', 'images' => fn($q) => $q->limit(1)])
            ->withAvg('reviews', 'rate')
            ->withCount('reviews')
            ->when(isset($filters['ad_sub_category_id']), function ($query) use ($filters) {
                $query->where('ad_sub_category_id', $filters['ad_sub_category_id']);
            })
            // ->when(isset($filters['min_price']), function ($query) use ($filters) {
            //     $query->where('price', '>=', $filters['min_price']);
            // })
            ->when(isset($filters['price']), function ($query) use ($filters) {
                $query->where('price', '<=', $filters['price']);
            })
            ->when(isset($filters['rate']), function ($query) use ($filters) {
                $query->having('reviews_avg_rate', '=', $filters['rate']);
            })
            ->paginate(9);
    }

    public function getRelatedAds($adId)
    {
        $ad = Ad::findOrFail($adId);

        $related = Ad::with([
            'images' => fn($q) => $q->limit(1),
            'reviews',
            'adCategory',
            'adSubCategory',
            'adSubSubCategory',
        ])
            ->withAvg('reviews', 'rate')
            ->where('id', '!=', $ad->id)
            ->where('ad_category_id', $ad->ad_category_id)
            ->latest()
            ->paginate(9);

        if (! $related) {
            return false;
        }
        return $related;
    }

    public function searchAds($search)
    {

        $ads = Ad::where(function ($query) use ($search) {
            $query->where('ad_name_ar', 'LIKE', '%' . $search . '%')
                ->orWhere('ad_name_en', 'LIKE', '%' . $search . '%');
        })
            ->with(['images' => fn($q) => $q->limit(1), 'reviews'])
            ->withAvg('reviews', 'rate')
            ->withCount('reviews')
            ->latest()
            ->paginate(9);

        if (! $ads) {
            return false;
        }
        return $ads;
    }
}

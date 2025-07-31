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

        // إنشاء الإعلان
        $ad = $user->ads()->create([
            'user_id' => $user->id,
            'ad_category_id' => $data['ad_category_id'],
            'ad_sub_category_id' => $data['ad_sub_category_id'],
            'ad_sub_sub_category_id' => $data['ad_sub_sub_category_id'] ?? null,
            'ad_name' => $data['ad_name'],
            'price' => $data['price'],
            'small_desc' => $data['small_desc'] ?? null,
            'desc' => $data['desc'] ?? null,
            'location' => $data['location'] ?? null,
            'AR_VR' => $data['AR_VR'] ?? null,
        ]);

        if (! $ad) {
            return false;
        }

        // رفع صور الإعلان
        if (isset($data['images']) && !empty($data['images'])) {
            $uploadedImages = ImageManger::uploadMultiImage('ads', $data['images']);

            foreach ($uploadedImages as $image) {
                $ad->images()->create(['image' => $image]);
            }
        }

        // رفع صور user_work
        if (isset($data['user_works']) && !empty($data['user_works'])) {
            $uploadedUserWorks = ImageManger::uploadMultiImage('ads', $data['user_works']);

            foreach ($uploadedUserWorks as $image) {
                $ad->userWorks()->create([
                  //   'user_id' => $user->id,
                    'image' => $image,
                ]);
            }
        }

          if (isset($data['files']) && !empty($data['files'])) {
            $uploadedFiles = ImageManger::uploadMultiFile('ads/files', $data['files']);

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


   public function getAll(){

    $ads = Ad::with(['adCategory', 'adSubCategory', 'adSubSubCategory' ,  'user' , 'images' , 'userWorks' , 'adFiles' ])->latest()->get();

    if(! $ads){
        return false;
    }


   }
}

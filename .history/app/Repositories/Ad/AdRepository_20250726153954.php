<?php

namespace App\Repositories\Ad;

use App\Interfaces\Ad\AdRepositoryInterface;
use App\Models\Ad;
use App\Utils\ImageManger;

class AdRepository implements AdRepositoryInterface
{
   public function storeAd(array $data)
   {
      // dd($data['files']);
      $user = auth('sanctum')->user();

      // //  $data['user_id'] = $user->id;
      //  if(isset($data['images']) && !empty($data['images']))
      //  {
      //     $data['images'] = ImageManger::uploadMultiImage('ads' , $data['images']);
      //  }

      //  if(isset($data['user_work']) && !empty($data['user_work']))
      //  {
      //     $data['user_work'] = ImageManger::uploadMultiImage('ads' , $data['user_work']);
      //    //   $user->ads()->files()->sync($data['files']);
      // }

      $ad = $user->ads()->create(
         [
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
            // 'images' => $data['images']?? null,
            // 'user_work' => $data['user_work']?? null
         ]
      );
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
      if (isset($data['user_work']) && !empty($data['user_work'])) {
         $uploadedUserWorks = ImageManger::uploadMultiImage('ads', $data['user_work']);

         foreach ($uploadedUserWorks as $image) {
            $ad->userWorks()->create(['user_id' ,'image' => $image]);
         }
      }



      return $ad;
   }
}

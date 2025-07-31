<?php

namespace App\Repositories\Ad;

use App\Interfaces\Ad\AdRepositoryInterface;
use App\Models\Ad;
use App\Utils\ImageManger;

class AdRepository implements   AdRepositoryInterface
{
   public function storeAd(array $data)
   {
      dd($data);
       $user = auth('sanctum')->user();

       

       $data['user_id'] = $user->id;
       if(isset($data['images']) && !empty($data['images']))
       {
          $data['images'] = ImageManger::uploadMultiImage('ads' , $data['images']);
           $user->ads()->images()->sync($data['images']);

       }

       if(isset($data['files']) && !empty($data['files']))
       {
          $data['files'] = ImageManger::uploadMultiImage('ads' , $data['files']);
           $user->ads()->files()->sync($data['files']);

      }

      $ad = Ad::create(
        [
            'user_id' => $user->id,
            'ad_category_id' => $data['ad_category_id'],
            'ad_sub_category_id' => $data['ad_sub_category_id'],
            'ad_sub_sub_category_id' => $data['ad_sub_sub_category_id']?? null,
            'ad_name' => $data['ad_name'],
            'price' => $data['price'],
            'small_desc' => $data['small_desc']?? null,
            'desc' => $data['desc']?? null,
            'location' => $data['location']?? null,
            'AR_VR' => $data['AR_VR']?? null,
        ]
      );
      if(! $ad){
        return false;
      }

      return $ad;
   }
      
      
}

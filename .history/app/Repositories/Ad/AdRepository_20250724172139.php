<?php

namespace App\Repositories\Ad;

use App\Interfaces\Ad\AdRepositoryInterface;
use App\Utils\ImageManger;

class AdRepository implements   AdRepositoryInterface
{
   public function storeAd(array $data)
   {
       $user = auth('sanctum')->user();

       $data['user_id'] = $user->id;
       if(isset($data['images']) && !empty($data['images']))
       {
          $data['images'] = ImageManger::uploadMultiImage('ads' , $data['images']);
           $user->ads()->images()->sync($data['images']);

       }

       

   }
}

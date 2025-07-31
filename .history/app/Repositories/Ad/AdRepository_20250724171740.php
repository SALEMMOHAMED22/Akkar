<?php

namespace App\Repositories\Ad;

use App\Interfaces\Ad\AdRepositoryInterface;

class AdRepository implements   AdRepositoryInterface
{
   public function storeAd(array $data)
   {
       $user = auth('sanctum')->user();

       $data['user_id'] = $user->id;
       if()

   }
}

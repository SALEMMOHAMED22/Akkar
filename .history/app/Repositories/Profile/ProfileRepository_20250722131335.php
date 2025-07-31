<?php

namespace App\Repositories\Profile;

use App\Http\Requests\ProfileRequest;
use App\Interfaces\Profile\ProfileInterface;

class ProfileRepository implements ProfileInterface
{
   
public function updateProfile($data)
{
    dd($data);
    $user = auth()->user();

   
   if (isset($data['image'])) {
       
    }

    $user->update($data);
    

    return $user;
}


}

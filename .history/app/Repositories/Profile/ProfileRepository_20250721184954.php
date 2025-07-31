<?php

namespace App\Repositories\Profile;

use App\Http\Requests\ProfileRequest;
use App\Interfaces\Profile\ProfileInterface;

class ProfileRepository implements ProfileInterface
{
   
public function updateProfile($request)
{
    $user = auth()->user();
   
    if($request->has_file('image')){
        
    }

}

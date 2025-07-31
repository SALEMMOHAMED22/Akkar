<?php

namespace App\Repositories\Profile;

use App\Http\Requests\ProfileRequest;
use App\Interfaces\Profile\ProfileInterface;

class ProfileRepository implements ProfileInterface
{
   
public function updateProfile($data)
{
    $user = auth()->user();
    dd($);
   
   if (isset($data['image'])) {
        $image = $data['image'];
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/users', $imageName);
        $data['image'] = 'users/' . $imageName;
    }

    $user->update($data);
    return $user;
}


}

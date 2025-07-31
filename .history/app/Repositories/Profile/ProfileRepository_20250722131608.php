<?php

namespace App\Repositories\Profile;

use App\Utils\ImageManger;
use App\Http\Requests\ProfileRequest;
use App\Interfaces\Profile\ProfileInterface;

class ProfileRepository implements ProfileInterface
{

    public function updateProfile($data)
    {
        dd($data);
        $user = auth()->user();


        if (isset($data['image'])) {
            $fileName = ImageManger::uploadSingleImage('user_profile', $data['image'], 'public');
            $data['image'] = 'user_profile/' . $fileName;
        }

        $user->update($data);


        return $user;
    }
}

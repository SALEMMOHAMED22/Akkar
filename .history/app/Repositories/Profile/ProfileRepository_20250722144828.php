<?php

namespace App\Repositories\Profile;

use App\Utils\ImageManger;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProfileRequest;
use App\Interfaces\Profile\ProfileInterface;

class ProfileRepository implements ProfileInterface
{

    public function updateProfile($data)
    {
        $user = auth()->user();

        if (isset($data['image'])) {

            if ($user->image && $user->image != null) {
                ImageManger::deleteImage($user->image);
                
            }

            $fileName = ImageManger::uploadImage('user_profile', $data['image'], 'public');
            $data['image'] = 'user_profile/' . $fileName;
        } else {
            $data['image'] = $user->image;
        }

        $user->update([
            'name'      => $data['name'],
            'age'       => $data['age'],
            'phone'     => $data['phone'],
            'job_title' => $data['job_title'],
            'bio'       => $data['bio'],
            'image'     => $data['image'],
        ]);

        return $user;
    }
}

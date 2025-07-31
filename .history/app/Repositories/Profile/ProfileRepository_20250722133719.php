<?php

namespace App\Repositories\Profile;

use App\Utils\ImageManger;
use App\Http\Requests\ProfileRequest;
use App\Interfaces\Profile\ProfileInterface;

class ProfileRepository implements ProfileInterface
{

    public function updateProfile($data)
    {
        
        $user = auth()->user();

        // dd($data['image']);
        if (isset($data['image'])) {
            $fileName = ImageManger::uploadSingleImage('user_profile', $data['image'], 'public');
            $data['image'] = '/' . $fileName;
        }

        dd($data['image']);

        $user->update([
            'name' => $data['name'],
            'age'  => $data['age'],
            'phone' => $data['phone'],
            'job_title' => $data['job_title'],
            'bio' => $data['bio'],
            'image' => $data['image'],
         ]);


        return $user;
    }
}

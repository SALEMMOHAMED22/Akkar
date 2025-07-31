<?php

namespace App\Repositories\Profile;

use App\Utils\ImageManger;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProfileRequest;
use App\Interfaces\Profile\ProfileInterface;

class ProfileRepository implements ProfileInterface
{

    public function updateProfile($data)
    {
        $user = auth()->user();

        if (isset($data['image'])) {

            $image = $data['image'];

            ImageManger::deleteImage($user->image);

            // strore image in local 
            $file = Str::uuid() . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('user_profile', $file, 'public');

            $data['image'] = $path;
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

    public function emailNotification(string $email)
    {
        $user = auth()->user();

        $user->update([
            'email_notification' => $email,
        ]);

        return $user;


    }

    public function identifiesStore(array $data)
    {
        $user = auth()->user();

        
        $user->userIdentifies()->create($data);
        return $user;
    }
}

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
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            // strore image in local 
            $file = Str::uuid() . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('uploads/users', $file, ['disk' => 'uploads']);

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
}

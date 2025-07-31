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
        dd($data);
        $user = auth('sanctum')->user();
        if ($user->type === 'individual') {
            $user->update([
                'national_id' => $data['national_id_number'],
            ]);

            $national_id_front = ImageManger::uploadImage('user_identifies', $data['national_id_front'], 'public');
            $national_id_back = ImageManger::uploadImage('user_identifies', $data['national_id_back'], 'public');
            $engineer_card_front = ImageManger::uploadImage('user_identifies', $data['engineer_card_front'], 'public');
            $engineer_card_back = ImageManger::uploadImage('user_identifies', $data['engineer_card_back'], 'public');

            $user->identifies()->create([
                'national_id_front' => $national_id_front,
                'national_id_back' =>  $national_id_back,
                'engineer_card_front' =>  $engineer_card_front,
                'engineer_card_back' => $engineer_card_back,
            ]);
        } elseif ($user->type === 'company') {
            $user->update([
                'tax_number' => $data['tax_number'],
            ]);

            $tax_record_front = ImageManger::uploadImage('user_identifies', $data['tax_record_front'], 'public');
            $tax_record_back = ImageManger::uploadImage('user_identifies', $data['tax_record_back'], 'public');
            $tax_card_front = ImageManger::uploadImage('user_identifies', $data['tax_card_front'], 'public');
            $tax_card_back = ImageManger::uploadImage('user_identifies', $data['tax_card_back'], 'public');

            $user->identifies()->create([
                'tax_record_front' => $tax_record_front,
                'tax_record_back' => $tax_record_back,
                'tax_card_front' => $tax_card_front,
                'tax_card_back' => $tax_card_back,
            ]);
        }




        return $user;
    }
}

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
        $user = auth('sanctum')->user();

        // dd($data);

        if (isset($data['image'])) {

            $image = $data['image'];

           if($user->image){
             ImageManger::deleteImage($user->image);
           }

        //    ImageManger::uploadImage('user_profile', $image, 'public');
            // strore image in local 
            $file = Str::uuid() . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('user_profile', $file, 'public');

            $data['image'] = $path;
        } else {
            $data['image'] = $user->image;
        }

        if(! isset($))

        $user->update($data);

        return $user->fresh();
    }

    public function emailNotification(string $email)
    {
        $user = auth('sanctum')->user();

        $user->update([
            'email_notification' => $email,
        ]);

        return $user;
    }

    // public function identifiesStore(array $data)
    // {
    //     // dd($data);
    //     $user = auth('sanctum')->user();
    //     if ($user->type === 'individual') {
    //         $user->update([
    //             'national_id' => $data['national_id_number'],
    //         ]);

    //         $personal_photo = ImageManger::uploadImage('user_identifies', $data['personal_photo'], 'public');
    //         $national_id_front = ImageManger::uploadImage('user_identifies', $data['national_id_front'], 'public');
    //         $national_id_back = ImageManger::uploadImage('user_identifies', $data['national_id_back'], 'public');
    //         $engineer_card_front = ImageManger::uploadImage('user_identifies', $data['engineer_card_front'], 'public');
    //         $engineer_card_back = ImageManger::uploadImage('user_identifies', $data['engineer_card_back'], 'public');

    //         $user->identifies()->create([
    //             'personal_photo' => $personal_photo,
    //             'national_id_front' => $national_id_front,
    //             'national_id_back' =>  $national_id_back,
    //             'engineer_card_front' =>  $engineer_card_front,
    //             'engineer_card_back' => $engineer_card_back,
    //         ]);
    //     } elseif ($user->type === 'company') {
    //         $user->update([
    //             'tax_number' => $data['tax_number'],
    //         ]);

    //         $company_logo = ImageManger::uploadImage('user_identifies', $data['company_logo'], 'public');
    //         $tax_record_front = ImageManger::uploadImage('user_identifies', $data['tax_record_front'], 'public');
    //         $tax_record_back = ImageManger::uploadImage('user_identifies', $data['tax_record_back'], 'public');
    //         $tax_card_front = ImageManger::uploadImage('user_identifies', $data['tax_card_front'], 'public');
    //         $tax_card_back = ImageManger::uploadImage('user_identifies', $data['tax_card_back'], 'public');

    //         $user->identifies()->create([
    //             'company_logo' => $company_logo,
    //             'tax_record_front' => $tax_record_front,
    //             'tax_record_back' => $tax_record_back,
    //             'tax_card_front' => $tax_card_front,
    //             'tax_card_back' => $tax_card_back,
    //         ]);
    //     }




    //     return $user;
    // }


    //     public function identifiesStore(array $data)
    // {
    //     $user = auth('sanctum')->user();
    //     $identify = $user->identifies;

    //     if ($identify) {
    //         foreach ([
    //             'personal_photo', 'national_id_front', 'national_id_back',
    //             'engineer_card_front', 'engineer_card_back',
    //             'company_logo', 'tax_record_front', 'tax_record_back',
    //             'tax_card_front', 'tax_card_back',
    //         ] as $imageField) {
    //             if ($identify->$imageField) {
    //                 ImageManger::deleteImage($identify->$imageField);
    //             }
    //         }
    //     }

    //     if ($user->type === 'individual') {
    //         $user->update([
    //             'national_id' => $data['national_id_number'],
    //         ]);

    //         $user->identifies()->updateOrCreate(
    //             ['user_id' => $user->id],
    //             [
    //                 'personal_photo' => isset($data['personal_photo']) ? ImageManger::uploadImage('user_identifies', $data['personal_photo'], 'public') : null,
    //                 'national_id_front' => isset($data['national_id_front']) ? ImageManger::uploadImage('user_identifies', $data['national_id_front'], 'public') : null,
    //                 'national_id_back' => isset($data['national_id_back']) ? ImageManger::uploadImage('user_identifies', $data['national_id_back'], 'public') : null,
    //                 'engineer_card_front' => isset($data['engineer_card_front']) ? ImageManger::uploadImage('user_identifies', $data['engineer_card_front'], 'public') : null,
    //                 'engineer_card_back' => isset($data['engineer_card_back']) ? ImageManger::uploadImage('user_identifies', $data['engineer_card_back'], 'public') : null,
    //             ]
    //         );
    //     } elseif ($user->type === 'company') {
    //         $user->update([
    //             'tax_number' => $data['tax_number'],
    //         ]);

    //         $user->identifies()->updateOrCreate(
    //             ['user_id' => $user->id],
    //             [
    //                 'company_logo' => isset($data['company_logo']) ? ImageManger::uploadImage('user_identifies', $data['company_logo'], 'public') : null,
    //                 'tax_record_front' => isset($data['tax_record_front']) ? ImageManger::uploadImage('user_identifies', $data['tax_record_front'], 'public') : null,
    //                 'tax_record_back' => isset($data['tax_record_back']) ? ImageManger::uploadImage('user_identifies', $data['tax_record_back'], 'public') : null,
    //                 'tax_card_front' => isset($data['tax_card_front']) ? ImageManger::uploadImage('user_identifies', $data['tax_card_front'], 'public') : null,
    //                 'tax_card_back' => isset($data['tax_card_back']) ? ImageManger::uploadImage('user_identifies', $data['tax_card_back'], 'public') : null,
    //             ]
    //         );
    //     }

    //     return $user->fresh(); 
    // }



    public function identifiesStore(array $data)
    {
        $user = auth('sanctum')->user();

        if ($user->identifies()->exists()) {
            return false;
        }

        $imagesToUpload = [];

        if ($user->type === 'individual') {
            $user->update([
                'national_id' => $data['national_id_number'],
            ]);

            $imageFields = [
                'personal_photo',
                'national_id_front',
                'national_id_back',
                'engineer_card_front',
                'engineer_card_back',
            ];
        } elseif ($user->type === 'company') {
            $user->update([
                'tax_number' => $data['tax_number'],
            ]);

            $imageFields = [
                'company_logo',
                'tax_record_front',
                'tax_record_back',
                'tax_card_front',
                'tax_card_back',
            ];
        }

        foreach ($imageFields as $field) {
            $imagesToUpload[$field] = isset($data[$field])
                ? ImageManger::uploadImage('user_identifies', $data[$field], 'public')
                : null;
        }



        $identifies  = $user->identifies()->create($imagesToUpload);

        return $identifies->fresh();
    }


    public function identifiesUpdate(array $data)
    {
        $user = auth('sanctum')->user();
        $identifies = $user->identifies;

        if (!$identifies) {
        return false;
    }

        $updatedImages = [];

        if ($user->type === 'individual') {
            $imageFields = [
                'personal_photo',
                'national_id_front',
                'national_id_back',
                'engineer_card_front',
                'engineer_card_back',
            ];
        } elseif ($user->type === 'company') {
            $imageFields = [
                'tax_number',
                'company_logo',
                'tax_record_front',
                'tax_record_back',
                'tax_card_front',
                'tax_card_back',
            ];
        }

        foreach ($imageFields as $field) {
            if (isset($data[$field]) && !empty($data[$field])) {
                ImageManger::deleteImage($identifies[$field]);
                $updatedImages[$field] = ImageManger::uploadImage('user_identifies', $data[$field], 'public');
            }
        }
        if ($user->type === 'individual' && isset($data['national_id_number'])) {
            $national_id_number = $data['national_id_number'];
            $user->update([
                'national_id' => $national_id_number
            ]);
        } elseif ($user->type === 'company' && isset($data['tax_number'])) {
            $tax_number = $data['tax_number'];
            $user->update([
                'tax_number' => $tax_number
            ]);
        }

        if (empty($updatedImages)) {
            return $identifies->fresh();
        }


        $identifies->update($updatedImages);
        return $identifies->fresh();
    }
}

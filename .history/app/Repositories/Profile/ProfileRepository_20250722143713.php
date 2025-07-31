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

    // لو فيه صورة جديدة مرفوعة
    if (isset($data['image'])) {

        // حذف الصورة القديمة لو موجودة
        if ($user->image && File::exists(public_path($user->image))) {
            File::delete(public_path($user->image));
        }

        // رفع الصورة الجديدة
        $fileName = ImageManger::uploadSingleImage('user_profile', $data['image'], 'public');
        $data['image'] = 'user_profile/' . $fileName;
    } else {
        // لو مفيش صورة جديدة، خليه يحتفظ بالقديمة
        $data['image'] = $user->image;
    }

    // تحديث البيانات
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

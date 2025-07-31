<?php

namespace App\Utils;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageManger
{

    public function uploadImage($path, $image, $disk = 'public')
    {
        $file_name = $this->generateImageName($image);
        Self::storeImageInLocale($image, $path, $file_name, $disk);
        return $path . '/' . $file_name;
    }

    public   function generateImageName($image)
    {
        $file_name = time() . '' . uniqid() . '' . $image->getClientOriginalName();
        return $file_name;
    }

    public static function storeImageInLocale($image, $path, $file_name, $disk)
    {
        $image->storePubliclyAs($path, $file_name, $disk);
    }


    public function deleteImage($image): void
    {
        if (file_exists(public_path($image))) {
            unlink(public_path($image));
        }
    }


    public function uploadMultiImage($path, $images, $disk = 'public')
    {
        $imagePaths = [];
        foreach ($images as $image) {
            $imageName = $this->generateImageName($image);
            $this->storeImageInLocale($image, $path, $imageName, $disk);
            $imagePaths[] = $path . '/' . $imageName;
        }
        return $imagePaths;
    }   // ============== END METHOD ===========
}

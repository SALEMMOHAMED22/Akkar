<?php

namespace App\Utils;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageManger
{

    public static function uploadImage($path, $image, $disk = 'public')
    {
        $file_name = self::generateImageName($image);
        Self::storeImageInLocale($image, $path, $file_name, $disk);
        return $path . '/' . $file_name;
    }

    public static  function generateImageName($image)
    {
        $file_name = time() . '_' . uniqid() . '_' . $image->getClient();
        return $file_name;
    }

    public static function storeImageInLocale($image, $path, $file_name, $disk)
    {
        $image->storePubliclyAs($path, $file_name, $disk);
    }


    // public static function deleteImage($image): void
    // {
    //     if (file_exists(public_path($image))) {
    //         unlink(public_path($image));
    //     }
    // }

    public static function deleteImage($image, $disk = 'public'): void
    {
        if (Storage::disk($disk)->exists($image)) {
            Storage::disk($disk)->delete($image);
        }
    }

    public static function uploadMultiImage($path, $images, $disk = 'public')
    {
        $imagePaths = [];
        foreach ($images as $image) {
            $imageName = self::generateImageName($image);
            Self::storeImageInLocale($image, $path, $imageName, $disk);
            $imagePaths[] = $path . '/' . $imageName;
        }
        return $imagePaths;
    }   // ============== END METHOD ===========


    public static function uploadMultiFile($folder, $files)
    {
        $uploadedFiles = [];

        foreach ($files as $file) {
            if ($file && $file->isValid()) {
                $file_name = self::generateImageName($file);

                $path = $file->storeAs($folder, $file_name, 'public');

                $uploadedFiles[] = [
                    'path' => $path.'/'.$file_name,
                    'size' => $file->getSize(),
                    'original_name' => $file->getClientOriginalName()
                ];
            }
        }

        return $uploadedFiles;
    }
}

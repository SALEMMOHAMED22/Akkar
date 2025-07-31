<?php

namespace App\Utils;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageManger
{

    public static function uploadImages($images , $model , $disk)
    {
     
            foreach($images as $image){

                $file_name = self::generateImageName($image);
                 self::storeImageInLocal($image , '/' , $file_name , $disk);

                $model->images()->create([
                    'file_name'=>$file_name,
                ]);
            
        }

        
    }

    // public static function deleteImages($post)
    // {
    //     if ($post->images->count() > 0) {
    //         foreach ($post->images as $image) {
    //            self::deleteImageFromLocal($image->path);
    //            $image->delete();
    //         }
    //     }
    // }

    public function uploadSingleImage($path, $image, $disk)
    {
        $file_name = $this->generateImageName($image);
        self::storeImageInLocal($image, $path, $file_name, $disk);
        return $file_name;
    }
/*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Generate a unique image name using a UUID and the current timestamp.
     *
     * @param \Illuminate\Http\UploadedFile $image The uploaded image file.
     * @return string The generated image name with the original file extension.
     */

/*******  b6e9b713-1097-4ba8-9c46-a0189884ad02  *******/
    public static function generateImageName($image)
    {
        $file_name = Str::uuid() . time() . '.' . $image->getClientOriginalExtension();
        return $file_name;
    }
    public static function storeImageInLocal($image, $path, $file_name, $disk)
    {
        $image->storeAs($path, $file_name, ['disk' => $disk]);
    }

    public static function deleteImageFromLocal($image_path): void
    {
        if (File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }
    }
}

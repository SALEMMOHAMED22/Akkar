<?php

namespace App\Models;

use App\Models\User;
use App\Models\AdFile;
use App\Models\AdImage;
use App\Models\AdReview;
use App\Models\UserWork;
use App\Models\AdCategory;
use App\Models\AdSubCategory;
use App\Models\AdSubSubCategory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $table = 'ads';
    protected $fillable = [
        'user_id',
        'ad_category_id',
        'ad_sub_category_id',
        'ad_sub_sub_category_id',
        'ad_name',
        'price',
        'small_desc',
        'desc',
        'location',
        'AR_VR',
        'status',
        'expire_date',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function adCategory()
    {
        return $this->belongsTo(AdCategory::class);
    }

    public function images()
    {
        return $this->hasMany(AdImage::class);
    }

    public function adSubCategory()
    {
        return $this->belongsTo(AdSubCategory::class);
    }

    public function adSubSubCategory()
    {
        return $this->belongsTo(AdSubSubCategory::class);
    }

    public function adFiles()
    {
        return $this->hasMany(AdFile::class);
    }

    public function reviews()
    {
        return $this->hasMany(AdReview::class);
    }

    public function userWorks()
    {
        return $this->hasMany(UserWork::class);
    }

   
   

    public function getStatusText()
    {
        return $this->status == 1
            ? (app()->getLocale() == 'ar' ? 'متوفر' : 'Available')
            : (app()->getLocale() == 'ar' ? 'غير متوفر' : 'Not Available');
    }
}

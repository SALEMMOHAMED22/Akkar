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
        'ad_name_ar',
        'ad_name_en',
        'price',
        'small_desc_ar',
        'small_desc_en',
        'desc_ar',
        'desc_en',
        'phone',
        'location',
        'location_lat',
        'location_long',
        'AR_VR',
        'availability',
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
        return $this->hasMany(AdReview::class , 'ad_id');
    }

    public function userWorks()
    {
        return $this->hasMany(UserWork::class);
    }


    //  public function status(){
    //  return   $this->status == 1 ? 'Active' : 'Inactive' ;
    // }

    public function AdAvailability(){
        
        if($this->availability == 1){
            return app()->getLocale() == 'ar' ? 'متوفر' : 'Available';
        }else{
            return app()->getLocale() == 'ar' ? 'غير متوفر' : 'Not Available';
        }
        
    }

    public function getStatus($value)
    {
        if($value == 'pending'){
            return app()->getLocale() == 'ar' ? 'قيد الانتظار' : 'Pending';
        }elseif($value == 'approved'){
            return app()->getLocale() == 'ar' ? 'مقبول' : 'Approved';
        }elseif($value == 'rejected'){
            return app()->getLocale() == 'ar' ? 'مرفوض' : 'Rejected';
        }
    }
}

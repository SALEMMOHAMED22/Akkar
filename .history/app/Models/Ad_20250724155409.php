<?php

namespace App\Models;

use App\Models\User;
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

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function adCategory()
    {
        return $this->belongsTo(AdCategory::class);
    }
}

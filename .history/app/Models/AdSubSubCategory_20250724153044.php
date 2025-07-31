<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdSubSubCategory extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'ad_sub_category_id',
    ];

    public function adSubCategory()
    {
        return $this->belongsTo(AdSubCategory::class);
    }
}

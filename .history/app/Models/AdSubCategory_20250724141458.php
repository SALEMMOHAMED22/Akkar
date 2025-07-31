<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdSubCategory extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'category_id',
    ];
}

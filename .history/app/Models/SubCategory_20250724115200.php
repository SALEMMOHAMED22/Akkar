<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = ['category_id', 'name_ar', 'name_en'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

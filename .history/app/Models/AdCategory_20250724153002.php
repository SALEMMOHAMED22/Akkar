<?php

namespace App\Models;

use App\Models\AdSubCategory;
use Illuminate\Database\Eloquent\Model;

class AdCategory extends Model
{
    protected $table = 'ad_categories';
    protected $fillable = ['name_ar', 'name_en'];

    public function subCategories()
    {
        return $this->hasMany(AdSubCategory::class);
    }
    
}

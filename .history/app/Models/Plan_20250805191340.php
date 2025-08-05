<?php

namespace App\Models;

use App\Models\PlanCategory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';

    protected $fillable = [
        'plan_category_id',
        'name_ar',
        'name_en',
        'price_per_month',
        'price_per_year',
        'desc_ar',
        'desc_en',
        'status',
    ];


    public function planCategory()
    {
        return $this->belongsTo(PlanCategory::class);
    }
    
}

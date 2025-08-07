<?php

namespace App\Models;

use App\Models\PlanLimit;
use App\Models\PlanFeature;
use App\Models\PlanCategory;
use App\Models\Subscription;
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

   public function features()
{
    return $this->belongsToMany(Feature::class, 'plan_features')
                ->withPivot('count', 'status'); // لو حابب تجيب القيم من الجدول الوسيط
}

    public function limits()
    {
        return $this->belongsToMany(Limit::class, 'plan_limits');
    }


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

   
}

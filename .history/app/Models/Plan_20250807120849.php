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
        return $this->hasMany(PlanFeature::class);
    }

/*************  ✨ Windsurf Command ⭐  *************/
    /**
     * The plan limits that belong to the Plan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
/*******  9d6a0bfc-85a4-4f70-bcc4-b2798684f703  *******/
    public function limits()
    {
        return $this->hasMany(PlanLimit::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

   
}

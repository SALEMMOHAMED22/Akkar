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
       
    ];


   

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'plan_features')
            ->withPivot('count', 'status'); // لو حابب تجيب القيم من الجدول الوسيط
    }

    public function limits()
    {
        return $this->belongsToMany(Limit::class, 'plan_limits');
    }

    public function featureRelations()
    {
        return $this->hasMany(PlanFeature::class);
    }

    public function limitRelations()
    {
        return $this->hasMany(PlanLimit::class);
    }


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}

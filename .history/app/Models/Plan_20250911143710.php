<?php

namespace App\Models;

use App\Models\PlanLimit;
use App\Models\PlanFeature;
use App\Models\PlanCategory;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'price',
        'days',
        'ads_limit',
        'images_limit',
        'video',
        'vr_tours',
        'search_priority',
        'reports',
        'team_members',
    ];

    protected $casts = [
        'price'         => 'decimal:2',
        'days'          => 'integer',
        'ads_limit'     => 'integer',
        'images_limit'  => 'integer',
        'video'         => 'boolean',
        'vr_tours'      => 'integer',
        'team_members'  => 'integer',
    ];

  
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}

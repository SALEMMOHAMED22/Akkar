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
       'name_ar',
       'name_en',
       'price',
       'ads_limit',
       

    ];


   

   

   

   

    


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}

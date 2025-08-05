<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    protected $table = 'plan_features';
    protected $fillable = [
        'plan_id',
        'name_ar',
        'name_en',
        'count',
        'status',
    ];

    public function 
}

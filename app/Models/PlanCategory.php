<?php

namespace App\Models;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Model;

class PlanCategory extends Model
{
    protected $table = 'plan_categories';
    protected $fillable = [
        'name_ar',
        'name_en',
        'desc_ar',
        'desc_en',
        'status',
    ];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}

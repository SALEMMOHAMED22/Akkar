<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Limit extends Model
{
    protected $table = 'limits';

    protected $fillable = [
        'name_ar',
        'name_en',
        'status',
    ];

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'plan_limits');
    }
}

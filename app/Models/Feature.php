<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'features';

    protected $fillable = [
        'name_ar',
        'name_en',
        'has_count',
        'status',
    ];

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'plan_features')
            ->withPivot('count', 'status');
    }
}

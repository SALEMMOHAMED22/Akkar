<?php

namespace App\Models;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Model;

class PlanLimit extends Model
{
    protected $table = 'plan_limits';
    protected $fillable = [
        'plan_id',
        'limit_id',
    ];


    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function 
}

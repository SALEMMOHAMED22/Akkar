<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';
    protected $fillable = [
        'user_id',
        'plan_id',
        'total_price',
        'start_date',
        'end_date',
        'status',
        'billing_type',
    ];
}

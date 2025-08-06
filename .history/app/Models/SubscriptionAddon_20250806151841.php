<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionAddon extends Model
{
    protected $table = 'subscription_addons';
    protected $fillable = [
        'subscription_id',
        'addon_id',
        
    ];
}

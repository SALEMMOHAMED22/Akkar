<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWork extends Model
{
    protected $table = 'user_works';

    protected $fillable = [
        'user_id',
        'ad_id',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdReview extends Model
{
    protected $table = 'ad_reviews';

    protected $fillable = [
        'ad_id',
        'user_id',
        'rate',
        'comment',
    ];


    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    
}

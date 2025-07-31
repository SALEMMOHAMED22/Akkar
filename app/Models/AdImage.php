<?php

namespace App\Models;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Model;

class AdImage extends Model
{
    protected $table = 'ad_images';
    protected $fillable = ['ad_id', 'image'];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}

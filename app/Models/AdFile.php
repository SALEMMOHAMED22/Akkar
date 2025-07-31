<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdFile extends Model
{
    protected $table = 'ad_files';

    protected $fillable = [
        'ad_id',
        'file',
        'original_name',
        'size',
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    
}

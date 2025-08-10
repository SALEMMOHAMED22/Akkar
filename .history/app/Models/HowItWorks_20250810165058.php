<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HowItWorks extends Model
{
    protected $table = 'how_it_works';

    protected $fillable = [
        'title_ar',
        'title_en',
        'desc_ar',
        'desc_en',
        'image',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HowItWorks extends Model
{
    protected $table = 'how_it_works';

    protected $fillable = [
        'how_it_works_ar',
        'how_it_works_en',
    ];
}

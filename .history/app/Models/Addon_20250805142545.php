<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    protected $table = 'addons';
    protected $fillable = [
        'name_ar',
        'name_en',
        'desc_ar',
        
    ];
}

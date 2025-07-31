<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserIdentifies extends Model
{
    protected $table = 'user_identifies';

    protected $fillable = [
        'nat'
    ];
}
 
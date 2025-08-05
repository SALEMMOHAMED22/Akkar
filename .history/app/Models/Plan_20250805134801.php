<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';

    protected $fillable = [
        'name',
        'slug',
        'price',
        'status',
        'plan_category_id',
        'description',
}

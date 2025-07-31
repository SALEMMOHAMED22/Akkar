<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model
{
    protected $table = 'company_types';

    protected $fillable = [
        'name_ar',
        'name_en',
        'status',
    ];



    public function users(){
        return $this->hasMany(User::class);
    }
}

<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'role_ar',
        'role_en',
        'permissions'
    ];

    
    public function getPermissionsAttribute($value)
    {
        return json_decode($value);
    }


    public function admins(){
        return $this->hasMany(Admin::class , 'role_id');
    }
}

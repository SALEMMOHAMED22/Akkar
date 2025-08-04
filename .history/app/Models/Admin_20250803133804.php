<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Ad;
use App\Models\Role;
use App\Models\AdReview;
use App\Models\JobTitle;
use App\Models\UserWork;
use App\Models\CompanyType;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;


    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'image',
        'status',


    ];

    public function role(){

        return $this->belongsTo(Role::class , 'role_id');
    }


    public function hasAccess($config_permission)
    {
        $role = $this->role;

        if (!$role) {
            Log::info("User has no role assigned");
            return false; // User has no role
        }

        Log::info("User's role: {$role->role_}");

        if (in_array($config_permission, $role->permission)) {
            Log::info("Permission {$config_permission} granted");
            return true;
        }

        Log::info("Permission {$config_permission} denied");
        return false;
    }




    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

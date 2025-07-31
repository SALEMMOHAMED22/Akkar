<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Ad;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable , HasApiTokens ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'email',
        'phone',
        'password',
        'bio',
        'name',
        'age',
        'job_title',
        'national_id',
        'tax_number',
        'company_name',
        'username',
        'company_type',
        'email_notification',
        'email_verified_at',
        'remember_token',
        'image',

        
         
    ];


    public function identifies()
    {
        return $this->hasOne(UserIdentifies::class , 'user_id' , 'id');
    }

    public function ads(){
        return $this->hasMany(Ad::class);
    }

    pub

 
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

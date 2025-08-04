<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Ad;
use App\Models\AdReview;
use App\Models\JobTitle;
use App\Models\UserWork;
use App\Models\CompanyType;
use Laravel\Sanctum\HasApiTokens;
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


    public function identifies()
    {
        return $this->hasOne(UserIdentifies::class, 'user_id', 'id');
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function userWorks()
    {
        return $this->hasMany(UserWork::class);
    }


    public function reviews()
    {
        return $this->hasManyThrough(AdReview::class, Ad::class);
    }

  public function jobtitle(){
      return $this->belongsTo(JobTitle::class , 'job_title_id');
  }

  public function companytype(){
      return $this->belongsTo(CompanyType::class , 'company_type_id');
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

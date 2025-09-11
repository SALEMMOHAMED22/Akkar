<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserIdentifies extends Model
{
    protected $table = 'user_identifies';

    protected $fillable = [
        'user_id',
        'personal_photo',
        'national_id_front',
        'national_id_back',
        'engineer_card_front',
        'engineer_card_back',
        'company_logo',
        'tax_record_front',
        'tax_record_back',
        'tax_card_front',
        'tax_card_back',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPersonalPhotoAttribute($value)
    {
        if($value == null){
            return asset('default.png
        }
    }
}
 
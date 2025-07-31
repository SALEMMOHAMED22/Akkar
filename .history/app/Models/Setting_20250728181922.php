<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'site_name_ar',
        'site_name_en',
        'site_desc_ar',
        'site_desc_en',
        'site_address_ar',
        'site_address_en',
        'site_phone',
        'site_email',
        'email_support',
        'facebook_url',
        'twitter_url',
        'youtube_url',
        'linkedin_url',
        'tweetter_url',
        'behance_url',
        'meta_description_ar',
        'meta_description_en',
        'logo',
        'favicon',
        'site_copyright_ar',

        'promotion_video_url',
    ];
}

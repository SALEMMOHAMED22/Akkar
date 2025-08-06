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
        'whatsapp_number',
        'site_email',
        'email_support',
        'facebook_url',
        'twitter_url',
        'youtube_url',
        'linkedin_url',
        
        'behance_url',
        'meta_description_ar',
        'meta_description_en',
        'logo',
        'favicon',
        'site_banner',
        'site_copyright_ar',
        'site_copyright_en',
        'working_hours_ar',
        'working_hours_en',
        'promotion_video_url',
    ];
}

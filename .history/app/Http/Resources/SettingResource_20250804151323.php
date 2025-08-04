<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'site_name' => app()->getLocale() == 'ar' ? $this->site_name_ar : $this->site_name_en,
            'site_desc' => app()->getLocale() == 'ar' ? $this->site_desc_ar : $this->site_desc_en,
            'site_address' => app()->getLocale() == 'ar' ? $this->site_address_ar : $this->site_address_en,
            'site_phone' => $this->site_phone,
            'site_email' => $this->site_email,
            'email_support' => $this->email_support,
            'facebook_url' => $this->facebook_url,
            'twitter_url' => $this->twitter_url,
            'youtube_url' => $this->youtube_url,
            'linkedin_url' => $this->linkedin_url,
            'tweetter_url' => $this->tweetter_url,
            'behance_url' => $this->behance_url,
            'meta_description' => app()->getLocale() == 'ar' ? $this->meta_description_ar : $this->meta_description_en,
            'logo' => $this->logo,
            'favicon' => $this->favicon,
            'site_copyright' => app()->getLocale() == 'ar' ? $this->site_copyright_ar : $this->site_copyright_en,
            'promotion_video_url' => $this->promotion_video_url,
            'whatsapp_number' => $this->whatsapp_number ?? null,
            'working_hours' =>  ?? null,

        ];
    }
}

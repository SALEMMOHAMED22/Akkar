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
            
        ];
    }
}

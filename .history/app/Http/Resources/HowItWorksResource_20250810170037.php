<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HowItWorksResource extends JsonResource
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
            'title' => app()->getLocale() == 'ar' ? $this->title_ar : $this->title_en,
            'desc' => app()->getLocale() == 'ar' ? $this->desc_ar : $this->desc_en,  
        ];
    }
}

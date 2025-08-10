<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TermsConditionsResoure extends JsonResource
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
            'content' => app()->getLocale() == 'ar' ? $this->content_ar : $this->content_en,
            'image' => $this->image ? asset($this->image) : null,
        ];
    }
}

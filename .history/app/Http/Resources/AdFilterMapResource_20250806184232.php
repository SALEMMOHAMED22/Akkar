<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdFilterMapResource extends JsonResource
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
            'name' => app()->getLocale() == 'ar' ? $this->name_ar : $this->name_en,
            'location' => $this->location??'',
            'location_lat' => $this->location_lat??'',
            'location_lng' => $this->location_lng??'',
            'pdf' => $this->AdFiles ;
        ];
    }
}

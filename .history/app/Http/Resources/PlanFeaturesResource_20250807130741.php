<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanFeaturesResource extends JsonResource
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
            'name' => app()->getLocale() == 'ar' ? $this->name_ar . ' ' . $this->pivot->count < 100 ? $this->pivot->count : 'غير محدود'  : $this->name_en . ' ' . $this->pivot->count  ,
            // 'count' => $this->pivot->count,
            // 'desc' => app()->getLocale() == 'ar' ? $this->desc_ar : $this->desc_en ?? '',
            // 'limits' => PlanLimitsResource::collection($this->limits) ?? '',
            
        ];
    }
}

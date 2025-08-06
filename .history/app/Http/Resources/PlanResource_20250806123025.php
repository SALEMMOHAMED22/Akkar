<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
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
            'price_per_month' => $this->price_per_month == 0 ? 'Free' : $this->price_per_month,
            'price_per_year' => $this->price_per_year == 0 ? 'Free' : $this->price_per_year,
            'billing_types' => $this->price_per_month == 0 ? 'Free' : $this->billing_types ,
            'desc' => app()->getLocale() == 'ar' ? $this->desc_ar : $this->desc_en ?? '',
            'features' => PlanFeaturesResource::collection($this->plan_features),
            'limits' => PlanLimitsResource::collection($this->plan_limits),
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\PlanResource;
use App\Http\Resources\PlanFeaturesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanCategoryResource extends JsonResource
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
            'plans' => PlanResource::collection($this->plans),
            'plans_features' => PlanFeaturesResource::collection($this->plans_features)  ,
            'plans_limits' => PlanLimitsResource::collection($this->plans_limits)   
        ];
    }
}

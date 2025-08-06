<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\PlanResource;
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
            ''         
        ];
    }
}

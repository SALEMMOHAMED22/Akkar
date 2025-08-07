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
    $count = $this->pivot->count < 100 ? $this->pivot->count : (app()->getLocale() == 'ar' ? 'غير محدود' : 'Unlimited');
    $name = app()->getLocale() == 'ar' ? $this->name_ar : $this->name_en;

    return [
        'id' => $this->id,
        'name' => $name . ' ' . $count,
    ];
}
}

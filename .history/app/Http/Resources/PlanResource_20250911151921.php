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
            'name' =>  app()->getLocale() == 'ar' ? $this->name_ar : $this->name_en ,
            'price' => $this->price,
            'days' => $this->days,
            'ads_limit' => $this->ads_limit,
            'images_limit' => $this->images_limit,
            'video' => $this->video,
            'vr_tours' => $this->vr_tours,
            'search_priority' => $this->search_priority,
            'reports' => $this->reports,
            

        ];
    }
}

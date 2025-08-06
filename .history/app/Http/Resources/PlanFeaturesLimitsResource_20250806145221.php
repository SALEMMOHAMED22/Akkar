<?php

namespace App\Http\Resources;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanFeaturesLimitsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'features' => PlanFeaturesResource::collection($this['features']),
            'limits'   => PlanLimitsResource::collection($this['limits']),


        ];
    }
}

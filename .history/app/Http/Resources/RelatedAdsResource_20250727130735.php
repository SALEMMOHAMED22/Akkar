<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RelatedAdsResource extends JsonResource
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
            'ad_name' => $this->ad_name,
            'price' => $this->price,
            'small_desc' => $this->small_desc,
            'category_id' => $this->,
            'sub_category_id' => $this->ad_sub_category_id,
            'image' => asset('storage/' .$this->images->first()?->image) ?? null,
            'average_rate' => round($this->reviews_avg_rate, 1),
            'reviews_count' => $this->reviews_count ?? 0,
        ];
    }
}

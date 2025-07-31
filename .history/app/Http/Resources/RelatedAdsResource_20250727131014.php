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
            'category_name' => app()->getLocale() == 'ar' ? $this->adCategory->name_ar : $this->adCategory->name_en,
            'sub_category_name' => app()->getLocale() == 'ar' ? $this->adSubcategory->name_ar : $this->adSubcategory->name_en,
            'image' => asset('storage/' .$this->images->first()?->image) ?? null,
            'average_rate' => round($this->reviews_avg_rate, 1),
            'reviews_count' => $this->reviews_count ?? 0,
        ];
    }
}

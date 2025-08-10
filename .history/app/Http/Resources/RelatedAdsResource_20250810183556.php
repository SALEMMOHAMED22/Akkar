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
            'ad_name' => app()->getLocale() == 'en' ? $this->ad_name_en :  $this->ad_name_ar,
            'price' => $this->price ?? null,
            'small_desc' => app()->getLocale() == 'en' ? $this->small_desc_en :  $this->small_desc_ar ?? '',
            'desc' => app()->getLocale() == 'en' ? $this->desc_en :  $this->desc_ar ?? '',
            'phone' => $this->phone ?? $this->user->phone ?? null,
            'location' => $this->location??'',
            // 'category_name' => app()->getLocale() == 'ar' ? $this->adCategory->name_ar : $this->adCategory->name_en,
            'category_name' => app()->getLocale() == 'ar'
                ? $this->adCategory?->name_ar
                : $this->adCategory?->name_en,
            // 'sub_category_name' => app()->getLocale() == 'ar' ? $this->adSubcategory->name_ar : $this->adSubcategory->name_en,
            'sub_category_name' => app()->getLocale() == 'ar'
                ? $this->adSubcategory?->name_ar
                : $this->adSubcategory?->name_en,
            // 'sub_sub_category_name' => app()->getLocale() == 'ar' ? $this->adSubSubCategory->name_ar : $this->adSubSubCategory->name_en ?? null,
            'sub_sub_category_name' => app()->getLocale() == 'ar'
                ? $this->adSubSubCategory?->name_ar
                : $this->adSubSubCategory?->name_en ?? null,
            'image' => asset( $this->images->first()?->image) ?? null,
            'average_rate' => round($this->reviews_avg_rate, 1) ?? 0,
            'reviews_count' => $this->reviews_count ?? 0,
        ];
    }
}

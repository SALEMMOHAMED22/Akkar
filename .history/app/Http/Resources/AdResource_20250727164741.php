<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
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
            'ad_category' => new CategoryResource($this->adCategory),
            'ad_sub_category' => new SubCategoriesResource($this->adSubCategory),
            'ad_sub_sub_category' => new SubSubCategoriesResource($this->adSubSubCategory) ?? '',
            'ad_name' => app()->getLocale() == 'en' ? $this->ad_name_en :  $this->ad_name_ar,
            'price' => $this->price ?? 0,
            'small_desc' => app()->getLocale() == 'en' ? $this->small_desc_en :  $this->small_desc_ar ?? '',
            'desc' => app()->getLocale() == 'en' ? $this->desc_en :  $this->desc_ar ?? '',
            'location' => $this->location??'',
            'AR_VR' => $this->AR_VR ?? '',

            'status' => $this->AdStatus() ,

            'user' => new AdUserResource($this->whenLoaded('user')),
            'images' => AdImageResource::collection($this->whenLoaded('images')),
            'files' => AdFileResource::collection($this->whenLoaded('adFiles')),
            'user_works' => AdUserWorkResource::collection($this->whenLoaded('userWorks')),
            'reviews' => AdReviewResource::collection($this->whenLoaded('reviews')),

             'created_at'    => $this->created_at->format('Y-m-d H:i'),
        ];
    }
}

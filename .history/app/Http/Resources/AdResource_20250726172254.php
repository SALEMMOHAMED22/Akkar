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
            // 'ad_sub_sub_category' => new SubSubCategoriesResource($this->adSubSubCategory),
            'ad_name' => $this->ad_name,
            'price' => $this->price ?? 0,
            'small_desc' => $this->small_desc ?? '',
            'desc' => $this->desc ?? '',
            'location' => $this->location??'',
            'AR_VR' => $this->AR_VR ?? '',

            'images' => AdImageResource::collection($this->),
            'files' => AdFileResource::collection($this->files),
            'user_works' => AdUserWorkResource::collection($this->userWorks),
            
        ];
    }
}

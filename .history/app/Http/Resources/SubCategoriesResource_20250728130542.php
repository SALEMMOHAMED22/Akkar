<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoriesResource extends JsonResource
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
            'category_id' => $this->ad_category_id,
            // 'category' => new CategoryResource($this->category),
            'name' => app()->getLocale() === 'ar' ? $this->name_ar : $this->name_en,
             'sub_sub_categories' => SubSubCategoriesResource::collection($this->subSubCategories) ?? [],

        ];
    }
}

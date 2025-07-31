<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqsResource extends JsonResource
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
            'question' => app()->getLocale() == 'ar' ? $this->question_ar : $this->question_en,
            'answer' => app()->getLocale() == 'ar' ? $this->answer_ar : $this->answer_en
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdReviewResource extends JsonResource
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
            'user' => new AdUserResource($this->user),
            'ad_id' => $this->ad_id,
            'rate' => $this->rate,
            'comment' => $this->comment,
            'created_at' => $this->created_at->ormat('F j, Y \a\t g:i a'),
          
        ];
    }
}

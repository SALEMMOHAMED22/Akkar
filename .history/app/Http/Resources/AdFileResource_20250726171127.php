<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdFileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
             'id'    => $this->id,
            'name'  => $this->original_name,
            'url'   => asset('storage/' . $this->file),
            'size'  => $this->size,
        ];
    }
}

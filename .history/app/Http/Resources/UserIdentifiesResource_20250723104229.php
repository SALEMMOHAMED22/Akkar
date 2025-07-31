<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserIdentifiesResource extends JsonResource
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
            'user_id' => $this->user_id,
            'personal_photo' => $this->personal_photo ? asset('storage/' . $this->personal_photo) : null,
            'national_id_front' => $this->national_id_front ? asset('storage/' . $this->national_id_front) : null,
        ];
    }
}

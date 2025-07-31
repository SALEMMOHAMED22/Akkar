<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserVerifyResource extends JsonResource
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
            'email' => $this->email,
            'phone' => $this->phone,
            'bio' => $this->bio,
            'type' => $this->type,
            'email_notification' => $this->email_notification ? $this->email_notification : 'null',
            'profile' => $profileData
        ];


    }
}

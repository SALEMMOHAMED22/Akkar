<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $profileData = null;

        if ($this->type === 'individual') {
            $profileData = [
                'name' => $this->name,
                'age' => $this->age,
                'job_title' => $this->job_title,
                'image' => asset()

              
            ];
        } elseif ($this->type === 'company' ) {
            $profileData = [
                'company_name' => $this->company->name,
                'username' => $this->username,
                'company_type' => $this->company->type,

            ];
        }

        return [
            'id' => $this->id,
            'email' => $this->email,
            'phone' => $this->phone,
            'bio' => $this->bio,
            'type' => $this->type,
            'profile' => $profileData
        ];
    }
}

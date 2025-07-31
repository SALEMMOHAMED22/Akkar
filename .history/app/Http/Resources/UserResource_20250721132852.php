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

        if ($this->type === 'individual' && $this->individual) {
            $profileData = [
                'name' => 
              
            ];
        } elseif ($this->type === 'company' && $this->company) {
            $profileData = [
                'company_name' => $this->company->name,
                'tax_number' => $this->company->tax_number,

            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'bio' => $this->bio,
            'type' => $this->type,
            'profile' => $profileData,
        ];
    }
}

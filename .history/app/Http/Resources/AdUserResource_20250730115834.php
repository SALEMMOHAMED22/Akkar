<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdUserResource extends JsonResource
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
            'name' => $this->type == 'company' ? $this->company_name : $this->name,
            'email' => $this->email,
            'phone' => $this->phone ,
            'type' => $this->type,
            'bio' => $this->bio,
            'job_title' => $this->job_title,
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            
        ];
    }
}

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
            'age' => $this->age,
            'national_id' => $this->national_id ?? null,
            'tax_number' => $this->tax_number ?? null,
            'job_title' => app()->getLocale() == 'ar' ? $this->jobtitle?->name_ar : $this->jobtitle?->name_en ?? null,
            'company_type' => app()->getLocale() == 'ar' ? $this->companytype?->name_ar : $this->companytype?->name_en ?? null,
            'image' => $this->image ? asset($this->image) : null,
            
        ];
    }
}

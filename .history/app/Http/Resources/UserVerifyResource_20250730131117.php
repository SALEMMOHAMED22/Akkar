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

         if ($this->type === 'individual') {
            $profileData = [
                'name' => $this->name,
                'age' => $this->age,
                'job_title' =>  app()->getLocale() == 'ar' ? $this->jobtitle?->name_ar : $this->jobtitle?->name_en ?? null,
                'image' => $this->image ? asset('storage/' . $this->image) : null,
              
            ];
        } elseif ($this->type === 'company' ) {
            $profileData = [
                'company_name' => $this->company_name,
                'username' => $this->username,
                'company_type' => app()->getLocale() == 'ar' ? $this->companytype?->name_ar : $this->companytype?->name_en ?? null,

            ];
        }

        return [
            'id' => $this->id,
            'type' => $this->type,
            'email' => $this->email,
            'phone' => $this->phone,
            'bio' => $this->bio,
            'email_notification' => $this->email_notification ? $this->email_notification : 'null',
            'profile' => $profileData
        ];


    }
}

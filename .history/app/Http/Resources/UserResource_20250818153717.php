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

        $user = auth('sanctum')->user();
        $profileData = null;

        if ($user->type === 'individual') {
            $profileData = [
                'name' => $this->name,
                'age' => $this->age,
                'job_title' => app()->getLocale() == 'ar' ? $this->jobtitle?->name_ar : $this->jobtitle?->name_en ?? null,
                'national_id' => $this->national_id ?? null,
                'image' => $this->image ? asset( $this->image) : null,


              
            ];
        } elseif ($user->type === 'company' ) {
            $profileData = [
                'company_name' => $this->company_name,
                'username' => $this->username,
                'tax_number' => $this->tax_number ?? null,
                'company_type' => app()->getLocale() == 'ar' ? $this->companytype?->name_ar : $this->companytype?->name_en ?? null,

            ];
        }

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

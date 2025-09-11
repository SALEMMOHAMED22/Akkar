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
        $identifies = [];
        if ($this->user->type === 'individual') {
            $identifies = [
                'id' => $this->id,
                'user_id' => $this->user_id,
                'national_id_number' => $this->national_id_number ??  , 
                'personal_photo' => $this->personal_photo ? asset( $this->personal_photo) : null,
                'national_id_front' => $this->national_id_front ? asset( $this->national_id_front) : null,
                'national_id_back' => $this->national_id_back ? asset( $this->national_id_back) : null,
                'engineer_card_front' => $this->engineer_card_front ? asset( $this->engineer_card_front) : null,
                'engineer_card_back' => $this->engineer_card_back ? asset( $this->engineer_card_back) : null,
            ];
        } elseif ($this->user->type=== 'company') {
            $identifies = [
            'id' => $this->id,
            'user_id' => $this->user_id,
             'company_logo' => $this->company_logo ? asset( $this->company_logo) : null,
            'tax_record_front' => $this->tax_record_front ? asset( $this->tax_record_front) : null,
            'tax_record_back' => $this->tax_record_back ? asset( $this->tax_record_back) : null,
            'tax_card_front' => $this->tax_card_front ? asset( $this->tax_card_front) : null,
            'tax_card_back' => $this->tax_card_back ? asset( $this->tax_card_back) : null,


            ];
        }

        return $identifies;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserIdentifiesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
          $rules = [];
    $user = $this->user();

    // $isFirstTime = $user->identifies()->doesntExist(); 

    if ($user->type === 'individual') {
        $rules = [
            'national_id_number'     => ['nu', 'string', 'max:50'],
            'personal_photo'         => [ 'nu' , 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'national_id_front'      => [ 'nu' , 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'national_id_back'       => [ 'nu' , 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'engineer_card_front'    => [ 'nu' , 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'engineer_card_back'     => [ 'nu' , 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    } elseif ($user->type === 'company') {
        $rules = [
            'tax_number'             => ['nu', 'string', 'max:50'],
            'company_logo'           => [ 'nu' , 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'tax_record_front'       => [ 'nu' , 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'tax_record_back'        => [ 'nu' , 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'tax_card_front'         => [ 'nu' , 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'tax_card_back'          => [ 'nu' , 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

        return $rules;
    }
}

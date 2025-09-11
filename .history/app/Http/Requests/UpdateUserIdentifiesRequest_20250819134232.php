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
        $user = auth('sanctum')->user();

        // $isFirstTime = $user->identifies()->doesntExist(); 

        if ($user->type === 'individual') {
            $rules = [
                'national_id_number'     => ['nullable', 'string', 'max:50'],
                'personal_photo'      => ['sometimes', 'file', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
                'national_id_front'   => ['sometimes', 'file', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
                'national_id_back'    => ['sometimes', 'file', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
                'engineer_card_front' => ['sometimes', 'file', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
                'engineer_card_back'  => ['sometimes', 'file', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            ];
        } elseif ($user->type === 'company') {
            $rules = [
                'tax_number'             => ['nullable', 'string', 'max:50'],
                'company_logo'        => ['sometimes', 'file', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
                'tax_record_front'    => ['sometimes', 'file', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
                'tax_record_back'     => ['sometimes', 'file', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
                'tax_card_front'      => ['sometimes', 'file', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
                'tax_card_back'       => ['sometimes', 'file', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            ];
        }

        return $rules;
    }
}

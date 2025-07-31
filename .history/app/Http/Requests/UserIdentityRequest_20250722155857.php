<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserIdentityRequest extends FormRequest
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
        $rules =[
            'type'                  => ['required', Rule::in(['individual', 'company'])],
        ];
        if ($this->type === 'individual') {
            $rules = array_merge($rules, [
                'national_id_number'           => ['required', 'string', 'min:14', 'max:14' , 'unique:users,national_id'],
                'national_id_front'            => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                'national_id_back'             => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                
            ]);
        }

        if ($this->type === 'company') {
            
        }
    }
}

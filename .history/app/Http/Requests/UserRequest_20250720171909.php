<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'type'     => ['required', Rule::in(['individual', 'company'])],
            'email'    => ['required', 'email', 'unique:users,email'],
            'phone'    => ['required', 'unique:users,phone'],
            'password' => ['required', 'min:6', 'confirmed'],
        ];
        return [
            //
        ];
    }
}

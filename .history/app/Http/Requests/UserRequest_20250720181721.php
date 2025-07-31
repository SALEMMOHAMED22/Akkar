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
            'bio'      => ['required', 'string'],
             'national_id' => ['required', 'string', 'min:' 'unique:users,national_id'],
            
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'min:6'],
        ];
        if ($this->type === 'individual') {
            $rules = array_merge($rules, [
                'name'        => ['required', 'string'],
                'age'         => ['nullable', 'integer', 'min:16'],
                'job_title'   => ['nullable', 'string'],
            ]);
        }

        if ($this->type === 'company') {
            $rules = array_merge($rules, [
                'company_name' => ['required', 'string'],
                'username'     => ['required', 'string', 'unique:users,username'],
                'company_type' => ['nullable', 'string'],
            ]);
    }

        return $rules;
    }
}

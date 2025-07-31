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
        if ($this->type === 'individual') {
            $rules = array_merge($rules, [
                'name'        => ['required', 'string'],
                'age'         => ['nullable', 'integer', 'min:'],
                'job_title'   => ['nullable', 'string'],
                'national_id' => ['required', 'string', 'unique:users,national_id'],
            ]);
        }

        if ($this->type === 'company') {
            $rules = array_merge($rules, [
                'company_name' => ['required', 'string'],
                'username'     => ['required', 'string', 'unique:users,username'],
                'company_type' => ['nullable', 'string'],
            ]);
    }
}

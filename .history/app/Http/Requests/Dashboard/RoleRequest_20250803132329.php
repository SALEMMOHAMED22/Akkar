<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        return [
            'role_ar' => ['required', 'string' , 'max:100' , 'unique:roles,role_ar' ,  ],
            'role_en' => ['required', 'string' , 'max:100' , 'unique:roles,role_en'],
            'permissions' => ['required' , 'array' , 'min:1'],
        ];
    }
}

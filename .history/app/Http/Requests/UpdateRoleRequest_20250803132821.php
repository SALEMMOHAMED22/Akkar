<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            'role_ar' => ['required', 'string', Rule::unique('roles', 'name_ar')->ignore($this->role)],
'role_en' => ['required', 'string', Rule::unique('roles', 'name_en')->ignore($this->role)],
            'permissions' => 'required|array|min:1',
        ];
    }
}

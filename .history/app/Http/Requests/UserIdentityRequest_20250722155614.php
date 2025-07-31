<?php

namespace App\Http\Requests;

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
            
        ];
        if ($this->type === 'individual') {
            $rules = array_merge($rules, [
                'name'             => ['required', 'string'],
                'age'              => ['nullable', 'integer', 'min:16'],
                'job_title'        => ['nullable', 'string'],
            ]);
        }

        if ($this->type === 'company') {
            
        }
    }
}

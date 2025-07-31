<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
        $user = auth('sanctum')->user();
        $rules = [];

        if($user->type == 'idividual'){
            $rules = [
                'name'             => ['nullable', 'string'],
                'age'              => ['nullable', 'integer', 'min:15'],
                'email'            => ['nullable', 'email', Rule::unique('users', 'email')->ignore($user->id)],
                'phone'            => ['nullable', 'string', 'max:11'],
                'job_title'        => ['nullable', 'string', 'max:255'],
                'bio'              => ['nullable', 'string' , 'min:10', 'max:1000'],
                'image'            => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ];
        }
        elseif($user->type == 'company'){
            $rules = [
                'company_name'     => ['nullable', 'string'],
                'username'         => ['nullable', 'string', Rule::unique('users', 'username')->ignore($this->user()->id)],
                'company_type'     => ['nullable', 'string'],
                'email'            => ['nullable', 'email', Rule::unique('users', 'email')->ignore($this->user()->id)],
                'phone'            => ['nullable', 'string', 'max:12'],
                'bio'              => ['nullable', 'string' , 'min:10', 'max:1000'],
                'image'            => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ];
        }

        return $rules;
    }
}

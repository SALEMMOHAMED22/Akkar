<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'age' => ['required', 'integer', 'min:15'],
            'job_title' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string' , 'min:10', 'max:1000'],
            'type' => ['required', Rule::in(['individual', 'company'])],
            'phone' => ['required', 'string', 'max:12'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],


        ];
         if ($this->type === 'individual') {
            $rules = array_merge($rules, [
                'name'             => ['required', 'string'],
            ]);
    }

    
}

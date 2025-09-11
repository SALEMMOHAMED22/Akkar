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


    public function rules(): array
    {
        $user = auth('sanctum')->user();
        $rules = [];

        if($user->type == 'individual'){
            $rules = [
                'name'             => ['required', 'string'],
                'age'              => ['required', 'integer', 'min:15'],
                'email'            => ['nullable', 'email', Rule::unique('users', 'email')->ignore($user->id)],
                'phone'            => ['required', 'string', 'max:12'],
                'job_title_id'        => ['required', 'string', 'exists:job_titles,id'],
                'bio'              => ['required', 'string' , 'min:10', 'max:1000'],
                'image'            => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ];
        }
        elseif($user->type == 'company'){
            $rules = [
                'company_name'     => ['required', 'string'],
                'username'         => ['required', 'string', Rule::unique('users', 'username')->ignore($this->user()->id)],
                'company_type_id'     => ['required', 'string' , 'exists:company_types,id'],
                'email'            => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user()->id)],
                'phone'            => ['required', 'string', 'max:12'],
                'bio'              => ['required', 'string' , 'min:10', 'max:1000'],
                'image'            => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ];
        }

        return $rules;
         
    }


}

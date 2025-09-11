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
                'name'             => ['sometimes','required', 'string'],
                'age'              => ['sometimes','required', 'integer', 'min:15'],
                'email'            => ['sometimes','nullable', 'email', Rule::unique('users', 'email')->ignore($user->id)],
                'phone'            => ['sometimes','required', 'string', 'max:12'],
                'job_title_id'        => ['sometimes','required', 'string', 'exists:job_titles,id'],
                'bio'              => ['sometimes','nullable', 'string' , 'min:10', 'max:1000'],
                'image'            => ['sometimes','nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ];
        }
        elseif($user->type == 'company'){
            $rules = [
                'company_name'     => ['somet'required', 'string'],
                'username'         => ['somet'required', 'string', Rule::unique('users', 'username')->ignore($this->user()->id)],
                'company_type_id'     => ['somet'required', 'string' , 'exists:company_types,id'],
                'email'            => ['somet'nullable', 'email', Rule::unique('users', 'email')->ignore($this->user()->id)],
                'phone'            => ['somet'required', 'string', 'max:12'],
                'bio'              => ['somet'nullable', 'string' , 'min:10', 'max:1000'],
                'image'            => ['somet'nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ];
        }

        return $rules;
         
    }


}

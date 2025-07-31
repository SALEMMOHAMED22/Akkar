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


/*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, string>>
     */
/*******  9460a9af-58b7-45b0-9c46-beaa4f5856d0  *******/
    public function rules(): array
    {
        $user_type = auth('sanctum')->user()->type;

        if($user_type == 'idividual'){
            return [
                'name'             => ['required', 'string'],
                'age'              => ['required', 'integer', 'min:15'],
                'email'            => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user()->id)],
                'phone'            => ['required', 'string', 'max:12'],
                'job_title'        => ['required', 'string', 'max:255'],
                'bio'              => ['required', 'string' , 'min:10', 'max:1000'],
                'image'            => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ];
        }
        elseif($user_type == 'company'){
            return [
                'company_name'     => ['required', 'string'],
                'username'         => ['required', 'string', Rule::unique('users', 'username')->ignore($this->user()->id)],
                'company_type'     => ['required', 'string'],
                'email'            => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user()->id)],
                'phone'            => ['required', 'string', 'max:12'],
                'bio'              => ['required', 'string' , 'min:10', 'max:1000'],
                'image'            => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ];
        }
         
    }


}

<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'site_name_ar' => ['required', 'string' , 'max:100'],
            'site_name_en' => ['required', 'string' , 'max:100'],
            'site_email' => ['required', 'email' , 'max:100'],
            'email_support' => ['nullable', 'email' , 'max:100'],
            'site_address_ar' => ['nullable', 'string' , 'max:500'],
            'site_address_en' => ['nullable', 'string' , 'max:500'],
            'site_phone' => ['required', 'string' , 'max:100'],
            'whatsapp_number' => ['nullable', 'string' , 'max:100'],
            'meta_description_ar' => ['required', 'string' , 'max:500'],
            'meta_description_en' => ['required', 'string' , 'max:500'],
            'site_desc_ar' => ['required', 'text' ],
            'site_desc_en' => ['required', 'text' ],
            'working_hours_ar' => ['required', 'string' , 'max:500'],
            'working_hours_en' => ['required', 'string' , 'max:500'],
            'site_copyright_ar' => ['required', 'string' , 'max:500'],
            'site_copyright_en' => ['required', 'string' , 'max:500'],
            'facebook_url' => ['nullable', 'url' , 'max:500'],
            'twitter_url' => ['nullable', 'url' , 'max:500'],
            'youtube_url' => ['nullable', 'url' , 'max:500'],
            'linkedin_url'




        ];
    }
}

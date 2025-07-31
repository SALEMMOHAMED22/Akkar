<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
            // 'user_id' => 'required|exists:users,id',
            'ad_category_id' => 'required|exists:ad_categories,id',
            'ad_sub_category_id' => 'required|exists:ad_sub_categories,id',
            'ad_sub_sub_category_id' => 'nullable|exists:ad_sub_sub_categories,id',
            'ad_name' => 'required|string',
            'price' => 'nullable|integer',
            'small_desc' => 'nullable|string',
            'desc' => 'nullable|string',
            'location' => 'nullable|string',
            'AR_VR' => 'nullable|string',
            "file" => 'nullable|file|mimes:pdf,doc,docx',
            'images' => 'sometimes|nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_work' => 'sometimes|nullable',
            'user_work.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            


            

        ];
    }
}

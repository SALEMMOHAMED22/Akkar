<?php

namespace App\Http\Requests;

use App\Rules\ValidSubCategory;
use App\Rules\ValidSubSubCategory;
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
            // 'ad_sub_category_id' => 'required|exists:ad_sub_categories,id|new ValidSubCategory',
            'ad_sub_category_id' => ['required', 'exists:ad_sub_categories,id', new ValidSubCategory($this->ad_category_id)],
            // 'ad_sub_sub_category_id' => 'nullable|exists:ad_sub_sub_categories,id',
            'ad_sub_sub_category_id' => ['nullable', 'exists:ad_sub_sub_categories,id', new ValidSubSubCategory($this->ad_sub_category_id)],

            'ad_name_ar' => 'required|string',
            'ad_name_en' => 'required|string',
            'small_desc_ar' => 'nullable|string',
            'small_desc_en' => 'nullable|string',
            'desc_ar' => 'nullable|string',
            'desc_en' => 'nullable|string',
            'price' => 'nullable|integer',
            'location' => 'nullable|string',
            'AR_VR' => 'nullable|string',
            'files' => 'sometimes|nullable',
            "files.*" => 'file|mimes:pdf,doc,docx',
            'images' => 'sometimes|nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_works' => 'sometimes|nullable',
            'user_works.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',


            

        ];
    }
}

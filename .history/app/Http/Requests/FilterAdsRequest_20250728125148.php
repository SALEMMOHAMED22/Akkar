<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterAdsRequest extends FormRequest
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
            'ad_sub_category_id' => ['nullable', 'exists:ad__sub_categories,id'],
            'min_price' => ['nullable', 'numeric', 'min:500'],
            'max_price' => ['nullable', 'numeric', 'max:500000'],
            'rate' => ['nullable', 'numeric', 'min:1', 'max:5'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $min = $this->input('min_price');
            $max = $this->input('max_price');

            if (!is_null($min) && !is_null($max) && $min > $max) {
                $validator->errors()->add('max_price', 'The max price must be greater than or equal to min price.');
            }
        });
    }
}

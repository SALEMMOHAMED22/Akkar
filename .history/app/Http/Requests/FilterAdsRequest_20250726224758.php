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
        'ad_category_id' => ['nullable', 'exists:ad_categories,id'],
        'min_price' => ['nullable', 'numeric', 'min:500'],
        'max_price' => ['nullable', 'numeric', 'max:50000'],
        'rate' => ['nullable', 'numeric', 'min:1', 'max:5'],
    ];
    }
}

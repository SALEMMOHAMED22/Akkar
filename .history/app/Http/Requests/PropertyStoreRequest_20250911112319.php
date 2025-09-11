<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PropertyStoreRequest extends FormRequest
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
            'category'  => ['required', Rule::in(['sale','rent','share','other'])],
            'unit_type' => ['required', Rule::in(['apartment','villa','duplex','office','shop','warehouse','land','chalet','other'])],

            'title'     => ['nullable','string','max:255'],
            'rooms'     => ['nullable','integer','min:0'],
            'bathrooms' => ['nullable','integer','min:0'],
            'floor'     => ['nullable','integer','min:0'],
            'area_sqm'  => ['nullable','integer','min:0'],

            // finishing_status: none | semi | full | superLux | company
            'finishing_status' => ['nullable', Rule::in(['none','semi','full','superLux','company'])],

            // furniture_status: empty | furnished | semi | none
            'furniture_status' => ['nullable', Rule::in(['empty','furnished','semi','none'])],

            // payment_method: cash | installments | monthly
            'payment_method'   => ['nullable', Rule::in(['cash','installments','monthly'])],

            'price'          => ['nullable','numeric','min:0'],
            'deposit_amount' => ['nullable','numeric','min:0'],

            'address_details' => ['nullable','string','max:5000'],
            'latitude'        => ['nullable','numeric','between:-90,90'],
            'longitude'       => ['nullable','numeric','between:-180,180'],

            'ar_link' => ['nullable','url'],
            'vr_link' => ['nullable','url'],

            'images'        => ['sometimes','array'],
            'images.*'      => ['image','mimes:jpeg,png,jpg,webp','max:4096'],

            'files'   => ['sometimes','array'],
            'files.*' => ['file','mimes:pdf,doc,docx,xls,xlsx','max:8192'],
        ];
    }
}

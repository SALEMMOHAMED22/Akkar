use Illuminate\Validation\Rule;
use App\Rules\ValidSubCategory;
use App\Rules\ValidSubSubCategory;

public function rules(): array
{
    return [
        'ad_category_id' => ['required','integer','exists:ad_categories,id'],

        'ad_sub_category_id' => [
            'required','integer',
            'exists:ad_sub_categories,id',
            new ValidSubCategory($this->input('ad_category_id')),
        ], //  << لاحظ الفاصلة هنا

        'ad_sub_sub_category_id' => [
            'nullable','integer',
            'exists:ad_sub_sub_categories,id',
            new ValidSubSubCategory($this->input('ad_sub_category_id')),
        ],

        'ad_name_ar' => ['required','string'],
        'ad_name_en' => ['required','string'],
        'small_desc_ar' => ['nullable','string'],
        'small_desc_en' => ['nullable','string'],
        'desc_ar' => ['nullable','string'],
        'desc_en' => ['nullable','string'],
        'price' => ['nullable','integer'],
        'location' => ['nullable','string'],
        'location_lat' => ['nullable','string'],
        'location_long' => ['nullable','string'],
        'AR_VR' => ['nullable','string'],

        'files' => ['sometimes','nullable'],
        'files.*' => ['file','mimes:pdf'],

        'images' => ['sometimes','nullable'],
        'images.*' => ['image','mimes:jpeg,png,jpg,gif','max:2048'],

        'user_works' => ['sometimes','nullable'],
        'user_works.*' => ['image','mimes:jpeg,png,jpg,gif','max:2048'],
    ];
}

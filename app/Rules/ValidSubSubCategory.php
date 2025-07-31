<?php

namespace App\Rules;

use Closure;
use App\Models\AdSubSubCategory;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidSubSubCategory implements ValidationRule
{
    protected $adSubCategoryId;

    public function __construct($adSubCategoryId)
    {
        $this->adSubCategoryId = $adSubCategoryId;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $exists = AdSubSubCategory::where('id', $value)
            ->where('ad_sub_category_id', $this->adSubCategoryId)
            ->exists();

        if (! $exists) {
            $fail("The selected $attribute is invalid or does not belong to the selected sub category.");
        }
    }
}

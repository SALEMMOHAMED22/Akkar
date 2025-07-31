<?php

namespace App\Rules;

use Closure;
use App\Models\AdSubCategory;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidSubCategory implements ValidationRule
{
   protected $categoryId;

    public function __construct($categoryId)
    {
        $this->categoryId = $categoryId;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        
         $exists = AdSubCategory::where('id', $value)
            ->where('ad_category_id', $this->categoryId)
            ->exists();

        if (! $exists) {
            $fail("The selected $attribute is invalid or does not belong to the selected category.");
        }
    }
}

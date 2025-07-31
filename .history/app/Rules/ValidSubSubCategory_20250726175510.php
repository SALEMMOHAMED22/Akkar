<?php

namespace App\Rules;

use Closure;
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
        
    }
}

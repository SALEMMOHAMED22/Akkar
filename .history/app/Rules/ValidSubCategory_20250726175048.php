<?php

namespace App\Rules;

use Closure;
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
        
    }
}

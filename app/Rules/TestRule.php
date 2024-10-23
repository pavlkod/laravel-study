<?php

// php artisan make:rule TestRule

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;

class TestRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        // in_array(\str_after($value, '@'), ['tighten.co']);
    }
}

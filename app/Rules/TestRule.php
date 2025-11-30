<?php

// php artisan make:rule TestRule

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class TestRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        if (!in_array(Str::after($value, '@'), ['tighten.co'])) {
            $fail('The :attribute field is not from an allowed email provider.');
        }
    }
}

<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PolandZipCode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pattern = '/^\d{2}-\d{3}$/';
        if(!preg_match($pattern, $value)){
            $fail('attribute must be a valid Polish zip code (NN-NNN)');
        }
    }
}

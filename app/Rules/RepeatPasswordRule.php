<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RepeatPasswordRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function __construct($password)
    {
        $this->password = $password;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value !== $this->password) {
            $fail('The password confirmation does not match.');
        }
    }
}

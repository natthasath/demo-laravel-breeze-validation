<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailPrivateRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $domains = [
            'nida.ac.th',
            'stu.nida.ac.th',
            'guest.nida.ac.th',
        ];

        $email = substr(strrchr($value, "@"), 1);

        if (!in_array($email, $domains)) {
            $fail('The :attribute must be a private email domain.');
        }
    }
}

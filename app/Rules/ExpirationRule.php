<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;

class ExpirationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected $current_date;
    public function __construct()
    {
        $this->current_date = Carbon::now()->format('Y-m-d');
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->current_date > $value) {
            $fail('The :attribute is expired or not a valid date.');
        }
    }
}

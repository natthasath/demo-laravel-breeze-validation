<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UploadFileRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function __construct($maxsize, $allow_filetype)
    {
        $this->maxsize = $maxsize;
        $this->allow_filetype = $allow_filetype;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value->getSize() > $this->maxsize * 1024) {
            $fail('The file must not exceed ' . $this->maxsize . ' KB.');
        } elseif (!in_array($value->getClientOriginalExtension(), $this->allow_filetype)) {
            $fail('The file must be one of the following types: ' . implode(', ', $this->allow_filetype));
        }
    }
}

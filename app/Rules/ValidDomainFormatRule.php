<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidDomainFormatRule implements Rule
{
    public function passes($attribute, $value)
    {
        if (!is_string($value)) {
            return false;
        }
        return preg_match('/^(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,}$/i', $value);
    }

    public function message()
    {
        return 'Домен \':input\' имеет неверный формат.';
    }
}

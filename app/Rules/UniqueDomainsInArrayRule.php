<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;

class UniqueDomainsInArrayRule implements Rule
{
    public function passes($attribute, $value)
    {
        if (!is_array($value)) {
            return false;
        }
        $lowerCaseValues = array_map('strtolower', $value);
        return count($lowerCaseValues) === count(array_unique($lowerCaseValues));
    }

    public function message()
    {
        return 'Список :attribute содержит повторяющиеся домены. Пожалуйста, отправляйте только уникальные домены.';
    }
}

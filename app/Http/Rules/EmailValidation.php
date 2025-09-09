<?php

namespace App\Http\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailValidation implements Rule
{
    public function passes($attribute, $value)
    {
        $emailRule = app()->environment('testing') ? 'email:rfc,filter' : 'email:rfc,dns,filter';

        $validator = \Validator::make(
            [$attribute => $value],
            [$attribute => $emailRule]
        );

        return !$validator->fails();
    }

    public function message()
    {
        return __('validation.email');
    }
}

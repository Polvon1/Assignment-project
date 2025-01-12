<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckVerificationCodeRule implements Rule
{
    public function passes($attribute, $value): bool
    {
        $code = auth()->user()->verification?->code;
        if (!is_null($code)){
            return (bool)($code == $value);
        }
        return false;
    }

    public function message(): string
    {
        return __('auth.verification.validation');
    }
}

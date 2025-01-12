<?php

namespace App\Http\Requests;

use App\Rules\CheckVerificationCodeRule;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class VerificationCodeRequest extends FormRequest
{
    #[ArrayShape(['code' => "string[]"])]
    public function rules(): array
    {
        return [
            'code' => ['required','string','size:5',new CheckVerificationCodeRule]
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'amount' => ['required','int','min:1000']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

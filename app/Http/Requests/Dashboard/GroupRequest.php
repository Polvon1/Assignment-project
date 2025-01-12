<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['nullable','string'],
            'quiz_id' => ['required','numeric'],
            'start' => ['nullable'],
            'end' => ['nullable'],
            'qty' => ['required','numeric'],
            'organization_id' => ['required','numeric']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

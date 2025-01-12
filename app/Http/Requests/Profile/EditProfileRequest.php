<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "username" => ['required','string', Rule::unique('users')->ignore(auth()->user()->id ?? 0,'id')],
            "email" => ['required','string',Rule::unique('users')->ignore(auth()->user()->id ?? 0,'id')],
            "password" => ["nullable","string","min:8"],
            "full_name" => ["required","string"],
            "passport" => ["required","string"],
            "phone" => ["required","string"],
            "region_id" => ["required","integer"],
            "district_id" => ["required",'integer'],
            "address" => ['nullable','string'],
            "gender" => ['required','string'],
            "image" => ["nullable",'string'],
            "verify_email" => ['nullable'],
            "verify_phone" => ['nullable'],
            "notification" => ['nullable']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

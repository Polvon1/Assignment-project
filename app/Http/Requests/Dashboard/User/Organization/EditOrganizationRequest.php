<?php

namespace App\Http\Requests\Dashboard\User\Organization;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditOrganizationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "username" => ['required','string', Rule::unique('users')->ignore($this->organization->id ?? 0,'id')],
            "email" => ['required','string',Rule::unique('users')->ignore($this->organization->id  ?? 0,'id')],
            "password" => ["nullable","string","min:8"],
            "name" => ['required','string'],
            "address" => ['nullable','string'],
            "description" => ['nullable','string'],
            "phone" => ["required","string"],
            "region_id" => ["required","integer"],
            "district_id" => ["required",'integer'],
            "image" => ["nullable",'string'],
            "verify_email" => ['nullable'],
            "verify_phone" => ['nullable'],
            "notification" => ['nullable'],
            "organization_id" => ['nullable','integer']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

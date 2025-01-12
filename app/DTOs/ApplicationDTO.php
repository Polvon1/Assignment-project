<?php

namespace App\DTOs;


use App\Http\Requests\ApplicationRequest;
use Spatie\LaravelData\Data;

class ApplicationDTO extends Data
{

    public function __construct(
        public string $name,
        public string $test_date,
        public string $email,
        public string $phone,
        public int    $region_id,
        public string $organization,
        public int    $users
    )
    {
    }

    public static function fromRequest(ApplicationRequest $request): self
    {
        return new self(
            name: $request->input('name'),
            test_date: $request->input('test_date'),
            email: $request->input('email'),
            phone: $request->input('phone'),
            region_id: $request->input('region_id'),
            organization: $request->input('organization'),
            users: $request->input('users')
        );
    }

}

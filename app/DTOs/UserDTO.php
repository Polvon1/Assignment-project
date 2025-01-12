<?php

namespace App\DTOs;

use App\Http\Requests\Dashboard\User\CreateUserRequest;
use App\Http\Requests\Dashboard\User\EditSystemUserRequest;
use App\Http\Requests\Dashboard\User\Organization\CreateOrganizationRequest;
use App\Http\Requests\Dashboard\User\Organization\EditOrganizationRequest;
use App\Http\Requests\Dashboard\User\System\CreateSystemUserRequest;
use App\Http\Requests\Dashboard\User\System\EditUserRequest;
use Spatie\LaravelData\Data;

class UserDTO extends Data
{
    public function __construct(
        public string      $username,
        public string      $email,
        public string|null $password,
        public string      $phone,
        public string|null $name,
        public string|null $address,
        public string|null $document_number,
        public string|null $gender,
        public int|null    $role_id,
        public int|null    $region_id,
        public int|null    $district_id,
        public string|null $image,
        public bool|null   $verify_phone,
        public bool|null   $verify_email,
        public bool|null   $notification,
        public int|null    $organization_id,
    ){}

    public static function fromCreateSystemRequest(CreateSystemUserRequest $request): self
    {
        return new self(
            username: str($request->input('username'))->trim()->toString(),
            email: str($request->input('email'))->trim()->toString(),
            password: $request->input('password'),
            phone: $request->input('phone'),
            name: null,
            address: null,
            document_number: null,
            gender: null,
            role_id: $request->input('role_id'),
            region_id: $request->input('region_id'),
            district_id: $request->input('district_id'),
            image: $request->input('image'),
            verify_phone: $request->has('verify_phone'),
            verify_email: $request->has('verify_email'),
            notification: $request->has('notification'),
            organization_id: auth()->user()->organization_id,
        );
    }
    public static function fromEditSystemRequest(EditSystemUserRequest $request): self
    {
        return new self(
            username: str($request->input('username'))->trim()->toString(),
            email: str($request->input('email'))->trim()->toString(),
            password: $request->has('password') ? $request->input('password') : null,
            phone: $request->input('phone'),
            name: null,
            address: null,
            document_number: null,
            gender: null,
            role_id: $request->input('role_id'),
            region_id: $request->input('region_id'),
            district_id: $request->input('district_id'),
            image: $request->input('image'),
            verify_phone: $request->has('verify_phone'),
            verify_email: $request->has('verify_email'),
            notification: $request->has('notification'),
            organization_id: auth()->user()->organization_id,
        );

    }

    public static function fromCreateOrganizationRequest(CreateOrganizationRequest $request): self
    {
        return new self(
            username: str($request->input('username'))->trim()->toString(),
            email: str($request->input('email'))->trim()->toString(),
            password: $request->input('password'),
            phone: $request->input('phone'),
            name: str($request->input('name'))->trim()->toString(),
            address: str($request->input('address'))->trim()->toString(),
            document_number: str($request->input('username'))->trim()->toString(),
            gender: null,
            role_id: $request->input('role_id'),
            region_id: $request->input('region_id'),
            district_id: $request->input('district_id'),
            image: $request->input('image'),
            verify_phone: $request->has('verify_phone'),
            verify_email: $request->has('verify_email'),
            notification: $request->has('notification'),
            organization_id: auth()->user()->organization_id,
        );
    }
    public static function fromEditOrganizationRequest(EditOrganizationRequest $request): self
    {
        return new self(
            username: str($request->input('username'))->trim()->toString(),
            email: str($request->input('email'))->trim()->toString(),
            password: $request->has('password') ? $request->input('password') : null,
            phone: $request->input('phone'),
            name: str($request->input('name'))->trim()->toString(),
            address: str($request->input('address'))->trim()->toString(),
            document_number: str($request->input('username'))->trim()->toString(),
            gender: null,
            role_id: $request->input('role_id'),
            region_id: $request->input('region_id'),
            district_id: $request->input('district_id'),
            image: $request->input('image'),
            verify_phone: $request->has('verify_phone'),
            verify_email: $request->has('verify_email'),
            notification: $request->has('notification'),
            organization_id: auth()->user()->organization_id,
        );
    }

    public static function fromCreateProfileRequest(CreateUserRequest $request): self
    {
        return new self(
            username: str($request->input('username'))->trim()->toString(),
            email: str($request->input('email'))->trim()->toString(),
            password: $request->input('password'),
            phone: $request->input('phone'),
            name: str($request->input('name'))->trim()->toString(),
            address: str($request->input('address'))->trim()->toString(),
            document_number: str($request->input('username'))->trim()->toString(),
            gender: $request->input('gender'),
            role_id: $request->input('role_id'),
            region_id: $request->input('region_id'),
            district_id: $request->input('district_id'),
            image: $request->input('image'),
            verify_phone: $request->has('verify_phone'),
            verify_email: $request->has('verify_email'),
            notification: $request->has('notification'),
            organization_id: auth()->user()->organization_id,
        );
    }
    public static function fromEditProfileRequest(EditUserRequest $request): self
    {
        return new self(
            username: str($request->input('username'))->trim()->toString(),
            email: str($request->input('email'))->trim()->toString(),
            password: $request->has('password') ? $request->input('password') : null,
            phone: $request->input('phone'),
            name: str($request->input('name'))->trim()->toString(),
            address: str($request->input('address'))->trim()->toString(),
            document_number: str($request->input('username'))->trim()->toString(),
            gender: $request->input('gender'),
            role_id: $request->input('role_id'),
            region_id: $request->input('region_id'),
            district_id: $request->input('district_id'),
            image: $request->input('image'),
            verify_phone: $request->has('verify_phone'),
            verify_email: $request->has('verify_email'),
            notification: $request->has('notification'),
            organization_id: auth()->user()->organization_id,
        );
    }


}

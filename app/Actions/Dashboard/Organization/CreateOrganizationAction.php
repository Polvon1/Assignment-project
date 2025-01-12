<?php

namespace App\Actions\Dashboard\Organization;

use App\DTOs\OrganizationDTO;
use App\DTOs\UserDTO;
use App\Events\UserProfileCreatedEvent;
use App\Models\Organization;
use App\Models\User;
use App\Support\Enums\RoleEnum;
use App\Support\Enums\UserStepEnum;
use App\Support\Traits\HasAuthorAction;
use DB;
use Hash;
use Throwable;

class CreateOrganizationAction
{

    use HasAuthorAction;
    /**
     * @throws Throwable
     */
    public function execute(UserDTO $data): User
    {
        return DB::transaction(function () use ($data) : User
        {
            $user = User::create(array_merge([
                'username' => $data->username,
                'email' => $data->email,
                'password' => Hash::make($data->password),
                'region_id' => $data->region_id,
                'district_id' => $data->district_id,
                'image' => $data->image,
                'phone' => $data->phone,
                'email_verified_at' => ($data->verify_email) ? now() : null,
                'phone_verified_at' => ($data->verify_phone) ? now() : null,
                'notification' => $data->notification,
                'type' => RoleEnum::ORGANIZATION,
                'organization_id' => null,
                'document_number' => $data->document_number,
                'address' => $data->address,
                'name' => $data->name,
            ],$this->createdBy()));

            $user->update([
                'organization_id' => $user->id
            ]);

            $user->syncRoles($data->role_id);

            event(new UserProfileCreatedEvent($user,$data->password));
            return $user;
        });
    }

}

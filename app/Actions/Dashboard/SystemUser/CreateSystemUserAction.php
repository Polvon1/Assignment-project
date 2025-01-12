<?php

namespace App\Actions\Dashboard\SystemUser;

use App\DTOs\UserDTO;
use App\Models\User;
use App\Support\Enums\RoleEnum;
use App\Support\Enums\UserStepEnum;
use App\Support\Traits\HasAuthorAction;
use DB;
use Hash;
use Throwable;

class CreateSystemUserAction
{
    use HasAuthorAction;

    /**
     * @throws Throwable
     */
    public function execute(UserDTO $data){
        return DB::transaction(function () use ($data): User
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
                'type' => ($data->role_id == 2) ? RoleEnum::ADMIN : RoleEnum::MODERATOR,
                'organization_id' => $data->organization_id,
            ],$this->createdBy()));

            $user->syncRoles($data->role_id);
            return $user;
        });
    }

}

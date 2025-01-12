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

class EditSystemUserAction
{
    use HasAuthorAction;

    /**
     * @throws Throwable
     */
    public function execute(UserDTO $data,User $user){
        return DB::transaction(function () use ($user, $data): User
        {
            $user->update(array_merge([
                'username' => $data->username,
                'email' => $data->email,
                'password' => ($data->password !== null) ? Hash::make($data->password) : $user->password,
                'region_id' => $data->region_id,
                'district_id' => $data->district_id,
                'image' => $data->image,
                'phone' => $data->phone,
                'email_verified_at' => ($data->verify_email) ? now() : null,
                'phone_verified_at' => ($data->verify_phone) ? now() : null,
                'notification' => $data->notification,
                'type' => ($data->role_id == 2) ? RoleEnum::ADMIN : RoleEnum::MODERATOR,
                'organization_id' => $data->organization_id,
            ],$this->updatedBy()));

            $user->syncRoles($data->role_id);
            return $user;
        });
    }

}

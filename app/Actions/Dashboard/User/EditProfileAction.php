<?php

namespace App\Actions\Dashboard\User;

use App\DTOs\UserDTO;
use App\Events\UserProfileUpdatedEvent;
use App\Models\User;
use App\Support\Enums\RoleEnum;
use App\Support\Traits\HasAuthorAction;
use DB;
use Hash;
use Throwable;

class EditProfileAction
{
    use HasAuthorAction;

    /**
     * @throws Throwable
     */
    public function execute(UserDTO $data, User $user): User
    {
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
                'type' => RoleEnum::USER,
                'organization_id' => $data->organization_id,
                'name' => $data->name,
                'document_number' => $data->document_number,
                'gender' => $data->gender,
                'address' => $data->address
            ],$this->updatedBy()));

            if ($data->password !== null){
                event(new UserProfileUpdatedEvent($user,$data->password));
            }

            return $user;
        });
    }

}

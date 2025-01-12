<?php

namespace App\Actions\Profile;

use App\DTOs\ProfileDTO;
use App\Models\User;
use DB;
use Hash;
use Throwable;

class EditProfileAction
{

    /**
     * @throws Throwable
     */
    public function execute(ProfileDTO $data, User $user): User
    {
        return DB::transaction(function () use ($data,$user): User
        {
            $user->update(array_merge([
                'username' => $data->username,
                'email' => $data->email,
                'password' => (!is_null($data->password)) ? Hash::make($data->password) : $user->password,
                'region_id' => $data->region_id,
                'district_id' => $data->district_id,
                'image' => $data->image,
                'phone' => $data->phone,
            ]));
            $user->profile()->update([
                'full_name' => $data->full_name,
                'passport' => $data->passport,
                'gender' => $data->gender,
                'address' => $data->address,
            ]);
            return $user;
        });
    }

}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Support\Enums\RoleEnum;
use App\Support\Enums\UserStepEnum;
use Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->username = 'abzalkhujaa';
        $user->email = 'abzalkhujaa@gmail.com';
        $user->password = Hash::make('qwerty123$');
        $user->region_id = 14;
        $user->district_id = 193;
        $user->phone = "998998001545";
        $user->phone_verified_at = now();
        $user->email_verified_at = now();
        $user->type = RoleEnum::ADMIN;
        $user->save();
    }
}

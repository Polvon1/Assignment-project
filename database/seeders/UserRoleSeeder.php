<?php

namespace Database\Seeders;

use App\Models\User;
use App\Support\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $admin_role = Role::where('name',RoleEnum::ADMIN)->first();

        $admin1 = User::whereUsername('abzalkhujaa')->first();

        $admin1->syncRoles($admin_role);
    }
}

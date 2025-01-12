<?php

namespace Database\Seeders;

use App\Support\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        foreach (RoleEnum::all() as $role){
            Role::create(['name' => $role]);
        }

    }
}

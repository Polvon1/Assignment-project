<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $admin_role = Role::where('name','admin')->first();
        $moderator_role = Role::where('name','moderator')->first();
        $user_role = Role::where('name','user')->first();
        $organization_role = Role::where('name','organization')->first();

        $admin_role->syncPermissions([
            'create.category',
            'edit.category',
            'delete.category',
            'view.category',
            'all.category',
            'trash.category',

            'create.user',
            'edit.user',
            'delete.user',
            'view.user',
            'all.user',
            'trash.user',

            'create.quiz',
            'edit.quiz',
            'delete.quiz',
            'view.quiz',
            'all.quiz',
            'trash.quiz',

            'create.organization',
            'edit.organization',
            'delete.organization',
            'view.organization',
            'all.organization',
            'trash.organization',

            'edit.report',
            'delete.report',
            'view.report',
            'all.report',
            'trash.report',

            'all.invoice',
            'view.invoice',
            'print.invoice'

        ]);

        $organization_role->syncPermissions([
            'create.category',
            'edit.category',
            'delete.category',
            'view.category',

            'create.user',
            'edit.user',
            'delete.user',
            'view.user',

            'create.quiz',
            'edit.quiz',
            'delete.quiz',
            'view.quiz',

            'edit.organization',
            'view.organization',

            'edit.report',
            'delete.report',
            'view.report'
        ]);

        $moderator_role->syncPermissions([
            'create.category',
            'edit.category',
            'delete.category',
            'view.category',

            'create.user',
            'edit.user',
            'delete.user',
            'view.user',

            'create.quiz',
            'edit.quiz',
            'delete.quiz',
            'view.quiz',

            'edit.organization',
            'view.organization',

            'edit.report',
            'delete.report',
            'view.report',

            'all.invoice',
        ]);

        $user_role->syncPermissions([
            'view.category',

            'edit.user',

            'show.quiz',
            'take.quiz',
            'retake.quiz',

            'view.report'
        ]);
    }
}

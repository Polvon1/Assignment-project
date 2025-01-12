<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
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

            'show.quiz',
            'take.quiz',
            'retake.quiz',

            'public.quiz',
            'private.quiz',
            'buy.quiz',

            'all.invoice',
            'view.invoice',
            'print.invoice'
        ];

        foreach ($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
    }
}

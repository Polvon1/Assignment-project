<?php

namespace App\Support\Enums;

class PermissionsEnum
{

    const USER = "user";
    const QUIZ = "quiz";
    const CATEGORY = "category";
    const EXAM = "exam";


    public static function userModulePermissions(): array
    {
        $permissions = [];

        foreach (self::moduleActions() as $action){
            $permissions[] = self::USER.".".$action;
        }
        return $permissions;
    }

    public static function moduleActions(): array
    {
        return [
            'index',
            'show',
            'create',
            'edit',
            'delete'
        ];
    }

}

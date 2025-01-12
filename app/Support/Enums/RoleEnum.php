<?php

namespace App\Support\Enums;

abstract class RoleEnum
{
    public const SUPER_ADMIN = 'super_admin';
    public const ADMIN = 'admin';
    public const MODERATOR = 'moderator';
    public const USER = 'user';
    public const ORGANIZATION = 'organization';


    public static function superAdminPermissionRoles(): array
    {
        return [
            self::ADMIN,
            self::MODERATOR,
            self::USER,
            self::ORGANIZATION
        ];
    }
    public static function adminPermissionRoles(): array
    {
        return [
            self::ADMIN,
            self::MODERATOR,
            self::ORGANIZATION
        ];
    }

    public static function moderatorPermissionRoles(): array
    {
        return [
            self::MODERATOR,
            self::USER,
        ];
    }

    public static function organizationPermissionRoles(): array
    {
        return [
            self::MODERATOR,
            self::USER
        ];
    }

    public static function all(): array
    {
        return [
            self::SUPER_ADMIN,
            self::ADMIN,
            self::MODERATOR,
            self::USER,
            self::ORGANIZATION
        ];
    }

    public static function adminCreateUser(): array
    {
        return [
            self::ADMIN,
            self::MODERATOR
        ];
    }


    public static function admin_moderator_organization_roles_to_string(): string
    {
        return self::ADMIN."|".self::MODERATOR."|".self::ORGANIZATION;
    }

    public static function admin_moderator_roles_to_string(): string
    {
        return self::ADMIN."|".self::MODERATOR;
    }
}

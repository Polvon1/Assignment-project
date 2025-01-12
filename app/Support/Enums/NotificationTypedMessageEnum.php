<?php

namespace App\Support\Enums;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;

class NotificationTypedMessageEnum
{

    public static function CREATE(bool|null $status = null): array|string|Translator|Application|null
    {
        $status ??= true;
        if ($status) {
            return __('notification.success.created');
        }
        return __('notification.error.created');
    }

    public static function UPDATE(bool|null $status = null): array|string|Translator|Application|null
    {
        $status ??= true;
        if ($status) {
            return __('notification.success.updated');
        }
        return __('notification.error.updated');
    }

    public static function DELETE(bool|null $status = null): array|string|Translator|Application|null
    {
        $status ??= true;
        if ($status) {
            return __('notification.success.deleted');
        }
        return __('notification.error.deleted');
    }

    public static function RESTORE(bool|null $status = null): array|string|Translator|Application|null
    {
        $status ??= true;
        if ($status) {
            return __('notification.success.restored');
        }
        return __('notification.error.restored');
    }
}

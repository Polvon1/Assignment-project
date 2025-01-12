<?php

namespace App\Support\Enums;

abstract class UserStepEnum
{
    const NEW = "new";
    const VERIFICATION = "verification";
    const FILL = "fill";
    const READY = "ready";
}

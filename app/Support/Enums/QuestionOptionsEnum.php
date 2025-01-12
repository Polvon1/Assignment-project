<?php

namespace App\Support\Enums;

class QuestionOptionsEnum
{
    const A = "a";
    const B = "b";
    const C = "c";
    const D = "d";

    public static function all(): array
    {
        return [
            self::A,
            self::B,
            self::C,
            self::D
        ];
    }
}

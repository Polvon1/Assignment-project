<?php

namespace App\Support\Helpers;

abstract class GenerateVerificationCode
{

    public static function get($qty = 5): string
    {
        $code = "";
        for ($i=1; $i<=$qty; $i++){
            $code.=rand(0,9);
        }
        return str($code)->trim()->toString();
    }

}

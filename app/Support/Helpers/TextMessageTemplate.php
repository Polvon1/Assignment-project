<?php

namespace App\Support\Helpers;

abstract class TextMessageTemplate
{
    const REGISTER = 'register';
    const LOGIN = 'login';
    const RESET = 'reset';
    const AUTH = 'auth';

    public static function login($text): string
    {
        return self::getStarterText()."Код для входа: ".$text;
    }

    public static function register($text): string
    {
        return self::getStarterText()."Код для регистрации: ".$text;
    }

    public static function reset($text): string
    {
        return self::getStarterText()."Код для восстановления пароля: ".$text;
    }

    private static function getStarterText(): string
    {
        return config('app.name').". Никому не передавайте.\n";
    }

    public static function auth(string $username,string $password): string
    {
        return self::getStarterText()."Данные для авторизации. \n\nЛогин: ".$username."\nПароль: ".$password;
    }


    public static function get(string $type,string $text,?string $more_text = null): string
    {
        if ($type === self::LOGIN) return self::login($text);
        if ($type === self::REGISTER) return self::register($text);
        if ($type === self::RESET) return self::reset($text);
        if ($type === self::AUTH) return self::auth($text,$more_text);

        return $text;
    }

}

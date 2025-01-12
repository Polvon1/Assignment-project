<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class LocaleMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $availableLocales = ['ru' => 'ru','en' => 'en','uz' => 'uz'];
        if(session()->has('locale') && array_key_exists(Session::get('locale'),$availableLocales)){
            app()->setLocale(Session::get('locale'));
        }
        return $next($request);
    }
}

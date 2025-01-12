<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    public function swap($locale): RedirectResponse
    {
        $availableLocales = ['ru' => 'ru','en' => 'en','uz' => 'uz'];

        if(array_key_exists($locale,$availableLocales)){
            session()->put('locale',$locale);
        }
        return back();
    }
}

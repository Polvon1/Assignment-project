<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getLanguage(): Model|Builder|Language|null
    {
        if (request()->has('language')){
            $language = Language::whereSlug(request()->get('language'))->first();
        }else{
            $language = Language::whereSlug(app()->getLocale())->first();
        }
        return $language;
    }
}

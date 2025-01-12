<?php

namespace App\Http\Controllers\Landing;

use App\Actions\Landing\CreateApplicationAction;
use App\DTOs\ApplicationDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Models\Language;
use App\Support\Enums\NotificationTypedMessageEnum;
use App\Support\Enums\NotificationTypeEnum;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Throwable;

class MainController extends Controller
{
    public function index(): Factory|View|Application
    {
        $languages = Language::query()->whereNotIn('slug',['en'])->get();
        if (app()->getLocale() == 'en') app()->setLocale('ru');
        $current_lang = $this->getLanguage();
        return view('landing.pages.index',compact('current_lang','languages'));
    }

    public function application(ApplicationRequest $request, CreateApplicationAction $createApplicationAction)
    {
        try {
            $application = $createApplicationAction->execute(ApplicationDTO::fromRequest($request));
            return redirect()->route('main.index')->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::CREATE());
        }catch (Throwable $exception){
            return redirect()->route('main.index')->with(NotificationTypeEnum::ERROR,NotificationTypedMessageEnum::CREATE(false));
        }
    }
}

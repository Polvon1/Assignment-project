<?php

namespace App\Http\Controllers\Auth;

use App\Events\SMSVerificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationCodeRequest;
use App\Support\Enums\NotificationTypeEnum;
use Throwable;

class VerificationCodeController extends Controller
{
    public function show()
    {
        return view('auth.verify_code');
    }

    public function verify(VerificationCodeRequest $request){
        try {
            auth()->user()->verification()->delete();
            auth()->user()->markPhoneAsVerified();
            return redirect()->route('login');
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::ERROR, $exception->getMessage());
        }
    }

    public function resend(){
        event(new SMSVerificationEvent(auth()->user()));
        return back();
    }
}

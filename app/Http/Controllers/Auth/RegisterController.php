<?php

namespace App\Http\Controllers\Auth;

use App\Events\SMSVerificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Support\Enums\NotificationTypedMessageEnum;
use App\Support\Enums\NotificationTypeEnum;
use App\Support\Enums\UserStepEnum;
use DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default, this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected string $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = $this->create($request);
            event(new Registered($user));
            event(new SMSVerificationEvent($user));

            $this->guard()->login($user);

            if ($response = $this->registered($request, $user)) {
                return $response;
            }

            return $request->wantsJson()
                ? new JsonResponse([], 201)
                : redirect($this->redirectPath());
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::ERROR, $exception->getMessage());
        }
    }

    /**
     * @throws Throwable
     */
    protected function create(RegisterRequest $request)
    {
        return DB::transaction(function () use ($request) : User
        {
            $user = User::create([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'step' => UserStepEnum::VERIFICATION,
                'phone' => $request->input('phone')
            ]);
            $user->profile()->create([
                'full_name' => $request->input('full_name'),
            ]);
            return $user;
        });
    }

    public function redirectTo(){
        return route('auth.verification.show');
    }
}

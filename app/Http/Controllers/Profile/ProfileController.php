<?php

namespace App\Http\Controllers\Profile;


use App\Actions\Profile\EditProfileAction;
use App\DTOs\ProfileDTO;
use App\Http\Controllers\Controller;

use App\Http\Requests\Profile\EditProfileRequest;
use App\Http\Requests\Profile\PaymentRequest;
use App\Models\Quiz;
use App\Support\Enums\NotificationTypedMessageEnum;
use App\Support\Enums\NotificationTypeEnum;
use Bavix\Wallet\Exceptions\BalanceIsEmpty;
use Bavix\Wallet\Exceptions\InsufficientFunds;
use Bavix\Wallet\Exceptions\ProductEnded;
use Log;
use Throwable;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile.pages.index',compact('user'));
    }

    public function edit(){
        $user = auth()->user();
        return view('profile.pages.edit',compact('user'));
    }

    public function update(EditProfileRequest $request, EditProfileAction $editProfileAction){
        try {
            $user = $editProfileAction->execute(ProfileDTO::fromEditProfileRequest($request),auth()->user());
            return redirect()
                ->route('Profile.index')
                ->with(NotificationTypeEnum::SUCCESS, NotificationTypedMessageEnum::UPDATE());
        }catch(Throwable $exception){
            Log::error($exception->getMessage());
            return back()
                ->with(NotificationTypeEnum::ERROR, NotificationTypedMessageEnum::UPDATE(false));
        }
    }

    public function quiz(){
        $user = auth()->user();
        $quizzes = $user->quizzes;
        return view('profile.pages.quiz',compact('user','quizzes'));
    }

    public function transactions(){
        return view('profile.pages.transaction');
    }

    public function purchased(){
        return view('profile.pages.purchased');
    }

    public function payment(){
        $user = auth()->user();
        return view('profile.pages.payment',compact('user'));
    }

    public function paymentStore(PaymentRequest $request){
        $user = auth()->user();
        $user->deposit($request->input('amount'));
       return redirect()->route('Profile.payment');
    }

    public function report(){
        return view('profile.pages.report');
    }

    public function buy(Quiz $quiz){
        $user = auth()->user();
        if ($user->can('paid',$quiz)){
            return redirect()->route('quiz.show',['quiz' => $quiz->id]);
        }
//        $user->deposit(4000);
        return view('profile.pages.buy',compact('quiz','user'));
    }

    public function buyStore(Quiz $quiz){
        try {
            $user = auth()->user();
            if ($user->can('paid',$quiz)){
                return redirect()->route('quiz.show',['quiz' => $quiz->id]);
            }
            $user->pay($quiz);
            if ((bool)$user->paid($quiz)){
                $user->quizzes()->sync($quiz,false);
            }
            return redirect()->route('quiz.show',['quiz' => $quiz->id]);
        }catch (BalanceIsEmpty $balanceIsEmptyException){
            return redirect()->back()->with(NotificationTypeEnum::ERROR,__('payment.exception.empty'));
        }catch (InsufficientFunds $insufficientFundsException){
            return redirect()->back()->with(NotificationTypeEnum::ERROR,__('payment.exception.not_enough'));
        }catch (ProductEnded $productEndedException){
            return redirect()->back()->with(NotificationTypeEnum::ERROR,__('payment.exception.end'));
        }catch (Throwable $exception){
            dd($exception);
        }
    }
}

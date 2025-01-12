<?php

use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\OrganizationController;
use App\Http\Controllers\Dashboard\QuestionController;
use App\Http\Controllers\Dashboard\QuizController;
use App\Http\Controllers\Dashboard\SystemUserController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Exam\ExamAppController;
use App\Http\Controllers\Exam\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Landing\MainController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Profile\ProfileController;
use App\Models\Quiz;
use App\Models\User;
use App\Support\Enums\RoleEnum;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//})->name('main.index');

Route::as('main.')->group(static function (){
    Route::get('/',[MainController::class,'index'])->name('index');
    Route::post('application',[MainController::class,'application'])->name('application');
});
Route::post('home',[MainController::class,'index'])->name('home');

Auth::routes();

Route::prefix('auth')->as('auth.')->middleware('auth')->group(function (){
    Route::get('verification',[VerificationCodeController::class,'show'])->name('verification.show');
    Route::post('verification',[VerificationCodeController::class,'verify'])->name('verification.verify');
    Route::get('resend',[VerificationCodeController::class,'resend'])->name('verification.resend');
});

Route::prefix('design')->as('design.')->group(static function (){
    Route::view('/','design.pages.index');
});

//Route::middleware(['auth','verify.phone'])->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('dashboard')
    ->middleware(['auth','verify.phone','role:'. RoleEnum::admin_moderator_organization_roles_to_string()])
    ->as('dashboard.')
    ->group(static function (){

        Route::view('/','dashboard.pages.index')->name('index');

        Route::resource('category', CategoryController::class)->only('index','store','update','destroy');
        Route::resource('quiz', QuizController::class);
        Route::prefix('quiz/{quiz}')->as('quiz.')
            ->group(static function (){
                Route::resource('question', QuestionController::class)->except('index','show');
        });

        Route::resource('user', UserController::class);
        Route::get('user/{user}/attach',[UserController::class,'attach'])->name('user.attach');
        Route::get('user/trash',[UserController::class,'trash'])->name('user.trash');
        Route::put('user/{user}/restore',[UserController::class,'restore'])->withTrashed()->name('user.restore');
        Route::put('user/{user}/force',[UserController::class,'forceDelete'])->withTrashed()->name('user.force-delete');

        Route::prefix('system')->as('system.')->group(static function (){
            Route::resource('user', SystemUserController::class)->except('show');
            Route::get('user/trash', [SystemUserController::class,'trash'])->name('user.trash');
            Route::put('user/{user}/restore', [SystemUserController::class,'restore'])->withTrashed()->name('user.restore');
            Route::delete('user/{user}/force', [SystemUserController::class,'forceDelete'])->withTrashed()->name('user.force-delete');
        });

        Route::resource('organization', OrganizationController::class);
        Route::get('organization/trash',[OrganizationController::class,'trash'])->name('organization.trash');
        Route::put('organization/{organization}/restore',[OrganizationController::class,'restore'])->withTrashed()->name('organization.restore');
        Route::delete('organization/{organization}/force',[OrganizationController::class,'forceDelete'])->withTrashed()->name('organization.force-delete');


        Route::resource('report',MainController::class);
        Route::resource('application',MainController::class);
});

Route::prefix('Profile')->as('Profile.')->group(function (){
    Route::get('/',[ProfileController::class,'index'])->name('index');
    Route::get('edit',[ProfileController::class,'edit'])->name('edit');
    Route::put('update',[ProfileController::class,'update'])->name('update');
    Route::get('quiz',[ProfileController::class,'quiz'])->name('quiz');
    Route::get('purchased',[ProfileController::class,'purchased'])->name('purchased');
    Route::get('report',[ProfileController::class,'report'])->name('report');
    Route::get('transactions',[ProfileController::class,'transactions'])->name('transactions');
    Route::get('payment',[ProfileController::class,'payment'])->name('payment');
    Route::post('payment',[ProfileController::class,'paymentStore'])->name('payment.store');
    Route::get('buy/{quiz}',[ProfileController::class,'buy'])->name('buy');
    Route::post('buy/{quiz}',[ProfileController::class,'buyStore'])->name('buy.store');
});


Route::prefix('exam')
    ->middleware(['auth','verify.phone'])
    ->as('exam.')
    ->group(function (){
        Route::get('',[ExamController::class,'index'])->name('index');
        Route::post('start',[ExamController::class,'start'])->name('start');
        Route::match(['post','get'],'finish/{exam:token}',[ExamController::class,'finish'])->name('finish');

        Route::get('app/{exam:token}',[ExamAppController::class,'index'])->name('app');
});

Route::prefix('quiz')->as('quiz.')->group(function (){
    Route::get('',[\App\Http\Controllers\Landing\QuizController::class,'index'])->name('index');
    Route::get('{quiz}',[\App\Http\Controllers\Landing\QuizController::class,'show'])->name('show');
});


Route::get('lang/{locale}', [LocaleController::class, 'swap'])->name('locale.swap');

//Route::get('payment',function (){
//    $user = User::find(4);
//    $quiz = Quiz::find(2);
////    $user->deposit(1500);
////    dd((bool)$user->paid($quiz));
//    dd($user->pay($quiz));
//    dd($user->transactions->toArray());
//})->middleware('auth');

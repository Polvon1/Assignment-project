<?php
header('Access-Control-Allow-Origin:*');
use App\Http\Controllers\Exam\ExamAppController;
use App\Http\Controllers\Exam\ExamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::prefix('exam/{exam:token}')->as('api.exam.app.')->middleware(['auth:sanctum'])->group(function (){
    Route::post('answer',[ExamAppController::class,'answer'])->name('answer');
    Route::post('finish',[ExamController::class,'finish'])->name('finish');
});




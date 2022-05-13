<?php

use App\Http\Controllers\QuizController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(QuizController::class)->group(function () {
    Route::group(['prefix' => 'quiz','as' => 'quiz.','middleware' => 'cors'],function (){
        Route::get('/','index')->name('index');
        Route::get('/startQuiz','getQuestions');
        Route::get('/cupInfo','getCupInfo');
        Route::post('/submitQuiz','submit')->name('submit');
        Route::get('/{quiz}','show')->name('show');
//        Route::post('/','store')->name('store');
    });
});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HistoryController;


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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('questions', function () {
    return view('welcome');
});

Route::controller(QuizController::class)->group(function () {
    Route::get('/quiz','index');
});

//Admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => ['auth']], function(){
    Route::controller(\App\Http\Controllers\Admin\HomeController::class)->group(function (){
        Route::get('/','index')->name('index');
    });

    Route::controller(QuestionController::class)->group(function () {
        Route::group(['prefix' => 'questions','as' => 'questions.'],function (){
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::get('/{question}','show')->name('show');
            Route::post('/','store')->name('store');
        });
    });

    Route::controller(HistoryController::class)->group(function () {
        Route::group(['prefix' => 'history','as' => 'history.'],function (){
            Route::get('/','index')->name('index');
        });
    });

});

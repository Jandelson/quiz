<?php

use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\ApisController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'quiz'], function () {
    Route::get('/', [QuizzesController::class, 'index'])->name('quiz');
    Route::get('/new', [QuizzesController::class, 'create'])->name('new_quiz')->middleware(['auth']);
    Route::get('/edit/{id}', [QuizzesController::class, 'edit'])->name('edit_quiz')->middleware(['auth']);
  
    Route::post('/new', [QuizzesController::class, 'store'])->name('register_quiz');    
    Route::post('/edit/{id}', [QuizzesController::class, 'update'])->name('update_quiz');

    Route::get('/editquestion/{id}', [QuestionsController::class, 'edit'])->name('edit_question');
    Route::post('/newquestion', [QuestionsController::class, 'store'])->name('register_question');
    Route::post('/updatequestion/{id}', [QuestionsController::class, 'update'])->name('update_question');
    Route::delete('/destroy/{id}', [QuestionsController::class, 'destroy'])->name('destroy_question');
  

    Route::get('/answer/{id}', [AnswersController::class, 'index'])->name('answer');
    Route::post('/answer/{id}', [AnswersController::class, 'store'])->name('register_answer');
});

Route::group(['prefix' => 'api'], function () {
    Route::get('/', [ApisController::class, 'index'])->name('api');
    Route::get('/datatable', [ApisController::class, 'datatable']);
});

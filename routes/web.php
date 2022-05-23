<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\GoogleController;

// use App\Http\Controllers\AnswerController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/admin', function()
{
    return view('customers.index');
});

// Route::get('/', function () {
//     if(Auth::check()){
//         dd("yes");
//         return view('admin.index');
//         //return view('portal.index');
//     }
//     else{
//         dd("no");
//         return view('auth.login');
//     }
     
// });

Auth::routes();
Route::get('customers/restore/{id?}', [App\Http\Controllers\CustomerController::class, 'restore'])->name('customers.restore');
Route::get('customers/restore-all', [App\Http\Controllers\CustomerController::class, 'restoreAll'])->name('customers.restoreAll');
Route::resource('customers', CustomerController::class);
Route::resource('tags', TagsController::class);
Route::get('/questions/votes/{id?}', [App\Http\Controllers\QuestionController::class,'questionCastVote'])->name('questions.votes');
Route::get('/answers/votes/{id?}', [App\Http\Controllers\QuestionController::class,'answerCastVote'])->name('answers.votes');
Route::resource('questions', QuestionController::class);
Route::post('vote-up/{uptype}/{qid}',[App\Http\Controllers\QuestionController::class,'question-up']);
Route::post('vote-down/{uptype}/{qid}',[App\Http\Controllers\QuestionController::class,'question-down']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/store', [App\Http\Controllers\AnswerController::class, 'storeAnswer'])->name('submit');
Route::post('/answers/{id}/edit', [App\Http\Controllers\AnswerController::class, 'editAnswer'])->name('answers');
Route::post('accept-answer/{id}', [App\Http\Controllers\AnswerController::class, 'acceptAnswer'])->name('accept-answer');
Route::put('/answersupdate/{id}',[App\Http\Controllers\AnswerController::class, 'updateAnswer'])->name('answers-update');
Route::delete('/deleteanswer/{id}',[App\Http\Controllers\AnswerController::class, 'answerDelete'])->name('delete-answer');
Route::get('auth/linkedin', [App\Http\Controllers\Auth\AuthController::class,'redirectToLinkedin']);
Route::get('auth/linkedin/callback', [App\Http\Controllers\Auth\AuthController::class,'handleLinkedinCallback']);


// Route::get('/answers/votes/{id?}', [App\Http\Controllers\QuestionController::class,'answercastvote'])->name('answers.votes');
           
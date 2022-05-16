<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\QuestionController;
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
Route::resource('customers', CustomerController::class);
Route::resource('tags', TagsController::class);
    
Route::get('/questions/votes/{id?}', [App\Http\Controllers\QuestionController::class,'questioncastvote'])->name('questions.votes');
Route::get('/answers/votes/{id?}', [App\Http\Controllers\QuestionController::class,'answercastvote'])->name('answers.votes');
// Route::get('accept-answer/{type}/{id}', [App\Http\Controllers\AnswerController::class, 'acceptAnswer'])->name('accept-answer');

Route::resource('questions', QuestionController::class);
 // /vote-up/question/2 
Route::post('vote-up/{uptype}/{qid}',[App\Http\Controllers\QuestionController::class,'questionup']);
Route::post('vote-down/{uptype}/{qid}',[App\Http\Controllers\QuestionController::class,'questiondown']);
// Route::get('/search', [App\Http\Controllers\QuestionController::class, 'search'])->name('search');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\AnswerController::class, 'storeanswer'])->name('submit');
Route::post('/answers/{id}/edit', [App\Http\Controllers\AnswerController::class, 'editanswer'])->name('answers');
// Route::post('accept-answer/{type}/{id}', [App\Http\Controllers\AnswerController::class, 'acceptAnswer'])->name('accept-answer');
Route::post('accept-answer/{id}', [App\Http\Controllers\AnswerController::class, 'acceptAnswer'])->name('accept-answer');

Route::put('/answersupdate/{id}',[App\Http\Controllers\AnswerController::class, 'updateanswer'])->name('answersupdate');
Route::delete('/deleteanswer/{id}',[App\Http\Controllers\AnswerController::class, 'answerdelete'])->name('deleteanswer');
// // Route::get('/create', [CustomerController::class, 'create'])->name('create');
// Route::put('/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
// Route::delete('/destroy/{$id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy');
// Route::get('/show/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');


Route::get('auth/linkedin', [App\Http\Controllers\Auth\AuthController::class,'redirectToLinkedin']);
Route::get('auth/linkedin/callback', [App\Http\Controllers\Auth\AuthController::class,'handleLinkedinCallback']);


// Route::get('/answers/votes/{id?}', [App\Http\Controllers\QuestionController::class,'answercastvote'])->name('answers.votes');
           
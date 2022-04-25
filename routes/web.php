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
Route::resource('questions', QuestionController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\AnswerController::class, 'storeanswer'])->name('submit');
Route::get('/answers/{id}/edit', [App\Http\Controllers\AnswerController::class, 'editanswer'])->name('answers');
Route::put('/answersupdate/{id}',[App\Http\Controllers\AnswerController::class, 'updateanswer'])->name('answersupdate');

// // Route::get('/create', [CustomerController::class, 'create'])->name('create');
// Route::put('/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
// Route::delete('/destroy/{$id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy');
// Route::get('/show/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');


Route::get('auth/linkedin', [App\Http\Controllers\Auth\AuthController::class,'redirectToLinkedin']);
Route::get('auth/linkedin/callback', [App\Http\Controllers\Auth\AuthController::class,'handleLinkedinCallback']);
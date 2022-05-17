<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

//task
Route::get('/tasks{any}', function() {
    return view('task');
})->where('any', '.*');
/*
Route::get('/users', function() {
    return view('user');
})->where('users', '.*');
*/
//user
Route::get('/users{any}', function() {
    return view('user');
})->where('any', '.*');

//title
Route::get('/titles{any}', function() {
    return view('title');
})->where('any', '.*');

//chapter
Route::get('/chapters{any}', function() {
    return view('chapter');
})->where('any', '.*');

//question
Route::get('/questions{any}', function() {
    return view('question');
})->where('any', '.*');

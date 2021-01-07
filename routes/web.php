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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::resource('users', App\Http\Controllers\UserController::class);
        Route::get('users/reset/password', [App\Http\Controllers\UserController::class, 'resetPassword'])->name('users.resetPassword');
        Route::post('users/change/password/{id}', [App\Http\Controllers\UserController::class, 'changePassword'])->name('users.changePassword');
        Route::get('logDetail', [App\Http\Controllers\UserActivityLogController::class, 'index'])->name('logDetail');

    });

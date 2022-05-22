<?php

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


Route::get('/', function () {
    return view('auth.register');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/login', function() {
    return view('auth.login');
});
Route::get('/register', function () {
        return view('auth.register');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@authenticate');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');



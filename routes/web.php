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
Route::get('/home', function () {
    return view('home');
});
Route::get('/allUsers', function () {
    return view('role-admin.allUsers');
});
Route::get('/editUser', function () {
    return view('role-admin.editUser');
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
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@authenticate');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');
Route::post('/editUser', 'App\Http\Controllers\ProfileController@editUser');
Route::post('/suspend', 'App\Http\Controllers\ProfileController@suspend');
Route::post('/activate', 'App\Http\Controllers\ProfileController@activate');
Route::post('/delete', 'App\Http\Controllers\ProfileController@delete');
Route::post('/memberUpdate', 'App\Http\Controllers\ProfileController@memberUpdate');
Route::post('/adminUpdate', 'App\Http\Controllers\ProfileController@adminUpdate');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');




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
Route::get('/addJobListing', function () {
    return view('role-admin.addJobListing', ['route'=>"add", 'textedit' => "1"]);
});
Route::get('/editJobListing', function () {
    return view('role-admin.addJobListing');
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
Route::get('/eportfolio', function () {
    return view('role-user.eportfolio');
});
Route::get('/addJob', function () {
    return view('role-user.addJob');
});
Route::get('/addEducation', function () {
    return view('role-user.addEducation');
});
Route::get('/jobListings', function () {
    return view('jobListings');
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
Route::post('/addJob', 'App\Http\Controllers\EportfolioController@addJob');
Route::post('/addSkills', 'App\Http\Controllers\EportfolioController@addSkills');
Route::post('/deleteSkill', 'App\Http\Controllers\EportfolioController@deleteSkill');
Route::post('/addEducation', 'App\Http\Controllers\EportfolioController@addEducation');
Route::post('/deleteEducation', 'App\Http\Controllers\EportfolioController@deleteEducation');
Route::post('/deleteJob', 'App\Http\Controllers\EportfolioController@deleteJob');
Route::post('/addJobListing', 'App\Http\Controllers\JobListingController@addJobListing');
Route::post('/editListing', 'App\Http\Controllers\JobListingController@editListing');
Route::post('/editDescription', 'App\Http\Controllers\JobListingController@editDescription');
Route::post('/deleteListing', 'App\Http\Controllers\JobListingController@deleteListing');




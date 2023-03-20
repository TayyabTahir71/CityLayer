<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\MailController;

use App\Http\Controllers\SocialiteController;
use App\Http\Middleware\Cors;
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
Route::controller(GlobalController::class)->group(function(){
    // Route::get('/', 'getAll')->name('getAll')->middleware('App\Http\Middleware\MyMiddleware');
Route::get('/', 'getAll');
Route::get('profile', 'profile')->name('profile');
Route::post('save_profile', 'saveprofile')->name('saveprofile');
Route::get('save_profile', 'profil')->name('profil');
Route::get('dashboard', 'dashboard')->name('dashboard');


Route::get('logout', 'logout');

});

Route::get('street', function () {
    return view('street_mapping');
});

Route::get('building', function () {
    return view('building_mapping');
});

Route::get('openspace', function () {
    return view('openspace_mapping');
});


Route::get('about', function () {
    return view('about');
});


Route::get('profil', function () {
    return view('profil');
});

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::post('contactmail' , [MailController::class, 'sendMessage']);

// La redirection vers le provider
Route::get("redirect/{provider}",[SocialiteController::class, 'redirect'])->name('socialite.redirect');

// Le callback du provider
Route::get("callback/{provider}",[SocialiteController::class, 'callback'])->name('socialite.callback');
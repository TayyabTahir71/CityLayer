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
Route::post('/place/like', 'like')->name('like');
Route::post('/place/dislike', 'dislike')->name('dislike');
Route::post('/place/stars', 'stars')->name('stars');
Route::post('/place/bof', 'bof')->name('bof');
Route::post('/place/weird', 'weird')->name('weird');
Route::post('/place/ohh', 'ohh')->name('ohh');
Route::post('/place/wtf', 'wtf')->name('wtf');
Route::get('street', 'street')->name('street');
Route::get('building', 'building')->name('building');
Route::get('openspace', 'openspace')->name('openspace');
Route::post('newtag', 'newtag')->name('newtag');
Route::post('new_place', 'newplace')->name('newplace');
Route::post('place_step2', 'placestep2')->name('placestep2');
Route::get('step2', function () {
    return view('step2');
});





Route::get('logout', 'logout');

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
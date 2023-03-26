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
Route::post('newopinion', 'newopinion')->name('newopinion');
Route::post('opinions', 'opinions')->name('opinions');
Route::post('new_place', 'newplace')->name('newplace');
Route::post('feeling', 'feeling')->name('feeling');
Route::post('upload-image', 'store')->name('uploadimage');
Route::post('avatar', 'avatar')->name('avatar');
Route::post('confortlevel', 'confortlevel')->name('confortlevel');
Route::post('enjoy', 'enjoy')->name('enjoy');
Route::post('enjoyable', 'enjoyable')->name('enjoyable');
Route::post('enjoydetail', 'enjoydetail')->name('enjoydetail');
Route::post('protected', 'protected')->name('protected');
Route::post('protectedetail', 'protectedetail')->name('protectedetail');
Route::post('timespending', 'timespending')->name('timespending');
Route::post('timespendingdetail', 'timespendingdetail')->name('timespendingdetail');
Route::post('spaceusage', 'spaceusage')->name('spaceusage');

Route::post('spaceusagedetail', 'spaceusagedetail')->name('spaceusagedetail');
Route::post('newspacetag', 'newspacetag')->name('newspacetag');


Route::get('step2', function () {
    return view('step2');
});

Route::get('step3', function () {return view('step3');});
Route::get('step4', function () {return view('step4');});
Route::get('step5', function () {return view('step5');});
Route::get('step8', function () {return view('step8');});
Route::get('step9', function () {return view('step9');});
Route::get('step10', function () {return view('step10');});
Route::get('logout', 'logout');


});



Route::get('about', function () {
    return view('about');
});

Route::get('edit_profile', function () {
    return view('edit_profile');
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
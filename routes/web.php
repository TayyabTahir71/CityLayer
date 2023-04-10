<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LocalizationController;
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
Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);

Route::controller(GlobalController::class)->group(function(){
    // Route::get('/', 'getAll')->name('getAll')->middleware('App\Http\Middleware\MyMiddleware');
Route::get('/', 'getAll');
Route::get('profile', 'profile')->name('profile');
Route::post('save_profile', 'saveprofile')->name('saveprofile');
Route::get('save_profile', 'profil')->name('profil');
Route::post('save_preferences', 'savepreferences')->name('savepreferences');
Route::get('save_preferences', 'preferences')->name('preferences');
Route::get('dashboard', 'dashboard')->name('dashboard');
Route::get('place/{id}/{type}', 'place')->name('place');
Route::post('/place/like', 'like')->name('like');
Route::post('/place/dislike', 'dislike')->name('dislike');
Route::post('/place/stars', 'stars')->name('stars');
Route::post('/place/bof', 'bof')->name('bof');
Route::post('/place/weird', 'weird')->name('weird');
Route::post('/place/ohh', 'ohh')->name('ohh');
Route::post('/place/wtf', 'wtf')->name('wtf');
Route::post('/place/comment', 'comment')->name('comment');
Route::get('street', 'street')->name('street');
Route::get('delete', 'delete')->name('delete');
Route::get('building', 'building')->name('building');
Route::get('openspace', 'openspace')->name('openspace');
Route::post('newtag', 'newtag')->name('newtag');
Route::post('newopinion', 'newopinion')->name('newopinion');
Route::post('opinions', 'opinions')->name('opinions');
Route::post('new_place', 'newplace')->name('newplace');
Route::post('feeling', 'feeling')->name('feeling');
Route::post('upload-image0', 'store0')->name('uploadimage0');
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
Route::get('leaderboard', 'leaderboard')->name('leaderboard');

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

// Route::get('.well-known/assetlinks.json' , function () {
//     return response()->json([
//         [
//             'relation' => ['delegate_permission/common.handle_all_urls'],
//             'target' => [
//                 'namespace' => 'android_app',
//                 'package_name' => 'fr.xbmod.citylayer.twa',
//                 'sha256_cert_fingerprints' => [
//                     'B1:C3:03:CB:95:94:A3:07:B9:F9:98:B2:E4:78:05:00:4C:64:C9:C6:54:0B:5F:09:DD:6A:16:D7:41:9D:0A:A9'
//                 ]
//             ]
//         ]
//     ]);
// });

Route::get('about', function () {
    return view('about');
});

Route::get('team', function () {
    return view('team');
});

Route::get('award', function () {
    return view('award');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('research', function () {
    return view('research');
});

Route::get('edit_profile', function () {
    return view('edit_profile');
});

Route::get('profil', function () {
    return view('profil');
});

Route::get('preferences', function () {
    return view('preferences');
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
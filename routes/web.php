<?php

use App\Http\Controllers\AuthController;
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

Route::get('/badges_overview', function () {
    return view('badges_overview');
});

Route::get('/community_achievements', function () {
    return view('community_acheivements');
});
Route::get('/menu', function () {
    return view('menu');
});

Route::get('/city_tags', function () {
    return view('edit_city_tags');
});
Route::controller(GlobalController::class)->group(function () {
    // Route::get('/', 'getAll')->name('getAll')->middleware('App\Http\Middleware\MyMiddleware');
    Route::get('/', 'getAll');
    Route::get('profile', 'profile')->name('profile');
    Route::get('badges_overview', 'badges_overview')->name('badges_overview');
    Route::post('save_profile', 'saveprofile')->name('saveprofile');
    Route::get('save_profile', 'profil')->name('profil');
    Route::post('save_preferences', 'savepreferences')->name('savepreferences');
    Route::get('save_preferences', 'preferences');
    Route::get('preferences', 'preferences')->name('preferences');
    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('place/{id}/{type}', 'place')->name('place');
    Route::get('details/{id}/{type}', 'details')->name('details');
    Route::post('/place/like', 'like')->name('like');
    Route::post('/place/dislike', 'dislike')->name('dislike');
    Route::post('/place/stars', 'stars')->name('stars');
    Route::post('/place/bof', 'bof')->name('bof');
    Route::post('/place/weird', 'weird')->name('weird');
    Route::post('/place/ohh', 'ohh')->name('ohh');
    Route::post('/place/wtf', 'wtf')->name('wtf');
    Route::post('/place/comment', 'comment')->name('comment');
    Route::post('edit/{id}/{type}', 'edit')->name('edit');
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

    Route::get('/test', function () {
        return view('test');
    });

    Route::get('contactus', function () {
        return view('contactus');
    });

    Route::get('aboutus', function () {
        return view('aboutus');
    });


    Route::get('impressum', function () {
        return view('impressum');
    });

    Route::get('step3', function () {
        return view('step3');
    });
    Route::get('step4', function () {
        return view('step4');
    });
    Route::get('step5', function () {
        return view('step5');
    });
    Route::get('step8', function () {
        return view('step8');
    });
    Route::get('step9', function () {
        return view('step9');
    });
    Route::get('step10', function () {
        return view('step10');
    });
    Route::get('logout', 'logout');
});
Route::post('contactmail', [MailController::class, 'sendMessage']);


Route::get('about', function () {
    return view('about');
});

Route::get('mapping', function () {
    return view('mapping');
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
Route::get('badges_overview', function () {
    return view('badges_overview');
});




//<-------------------------new routes---------------------------------------->

Route::get('login', function () {
    return view('login');
});

Route::get('sign-up-u', function () {
    return view('sign-up-u');
});
Route::get('sign-up-e', function () {
    return view('sign-up-e');
});

Route::get('add-new-place', [GlobalController::class, 'createNewPlace']);

Route::get('filter', [GlobalController::class, 'filter']);

Route::post('map/add/place', [GlobalController::class, 'addMapPlace'])->name('map.add.place');

Route::post('add/new/place', [GlobalController::class, 'addNewPlace'])->name('add.new.place');

Route::get('/sub-place/{id}', [GlobalController::class, 'subPlace'])->name('sub.place');


Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/signup', [AuthController::class, 'signup'])->name('auth.register');


Route::post('contactmail', [MailController::class, 'sendMessage']);

// La redirection vers le provider
Route::get("redirect/{provider}", [SocialiteController::class, 'redirect'])->name('socialite.redirect');

// Le callback du provider
Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');

URL::forceScheme('http');

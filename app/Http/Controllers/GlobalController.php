<?php

namespace App\Http\Controllers;

use App\Models\Cadeaux;
use App\Models\Commandes;
use App\Models\Concours;
use App\Models\Infosperso;
use App\Models\User;
use App\Models\Games;
use App\Models\Pages;
use App\Models\Packs;
use Carbon\Carbon;
use App\Models\Paiements;
use App\Models\Scores;
use Pestopancake\LaravelBackpackNotifications\Notifications\DatabaseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class GlobalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {  
        if (backpack_auth()->check()) {
                //if profile exist return dashboard
                if (Infosperso::where('user_id', backpack_auth()->user()->id)->exists()) {
                    return view('home');
                } else {
                    return view('profil');
                }

    } else {
        return view('index');
    }
    }

    public function saveprofile(Request $request)
    {
       
        if (backpack_auth()->check()) {
            $userid = backpack_auth()->user()->id;
            if (Infosperso::where('user_id', $userid)->exists()) {
                Infosperso::where('user_id', $userid)->update([
                    'age' => $request->age,
                    'gender' => $request->gender,
                    'profession' => $request->profession,
                    'relation' => $request->relation,
                    'preferences' => $request->preferences,
                ]);
                return view('dashboard');
            } else {
                $infos = new Infosperso();
                $infos->user_id = $userid;
                $infos->age = $request->age;
                $infos->gender = $request->gender;
                $infos->profession = $request->profession;
                $infos->relation = $request->relation;
                $infos->preferences = $request->preferences;
                $infos->save();
                return view('dashboard');
            }
        } else {
            return redirect('/');
        }
    }



    public function contact()
    {
        return view('contact');
    }

    public function contactus()
    {
        return view('contactus');
    }

  
}

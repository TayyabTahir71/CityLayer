<?php

namespace App\Http\Controllers;

use App\Models\Infosperso;
use App\Models\User;
use App\Models\Street;
use App\Models\Building;
use App\Models\Openspace;
use Carbon\Carbon;
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
            $userid = backpack_auth()->user()->id;
            if (Infosperso::where('user_id', $userid)->exists()) {
                $infos = Infosperso::where('user_id', $userid)->get();
                $infos = $infos[0];

                $street = Street::all();
                $building = Building::all();
                $openspace = Openspace::all();
        
                $all_data = array_merge(
                    $street->toArray(),
                    $building->toArray(),
                    $openspace->toArray()
                );


                return view('home', compact('infos', 'all_data'));
            } else {
                return view('profil');
            }
        } else {
            return view('login');
        }
    }

    public function profil()
    {
        return view('home');
    }

    public function dashboard()
    {
        $userid = backpack_auth()->user()->id;
        if (Infosperso::where('user_id', $userid)->exists()) {
            $infos = Infosperso::where('user_id', $userid)->get();
            $score = $infos[0]->score;
        } else {
            $score = 1;
        }

        return view('dashboard', compact('score'));
    }

    public function profile()
    {
        return view('profile');
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
                return back();
            } else {
                $infos = new Infosperso();
                $infos->user_id = $userid;
                $infos->age = $request->age;
                if ($request->age != null) {
                    $infos->score = +1;
                }
                $infos->gender = $request->gender;
                if ($request->gender != null) {
                    $infos->score = $infos->score + 1;
                }
                $infos->profession = $request->profession;
                if ($request->profession != null) {
                    $infos->score = $infos->score + 1;
                }
                $infos->relation = $request->relation;
                if ($request->relation != null) {
                    $infos->score = $infos->score + 1;
                }
                $infos->preferences = $request->preferences;
                if ($request->preferences != null) {
                    $infos->score = $infos->score + 2;
                }
                $infos->newuser = 0;
                $infos->save();
                return back();
            }
        } else {
            return redirect('/');
        }
    }
}

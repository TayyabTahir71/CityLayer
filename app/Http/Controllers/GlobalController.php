<?php

namespace App\Http\Controllers;

use App\Models\Infosperso;
use App\Models\User;
use App\Models\Street;
use App\Models\Building;
use App\Models\Openspace;
use App\Models\Stats;
use Carbon\Carbon;
use Pestopancake\LaravelBackpackNotifications\Notifications\DatabaseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

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
                $infos = $infos->where('user_id', $userid)->first();

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


    public function like(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        if (Infosperso::where('user_id', $userid)->exists()) {
            $infos = Infosperso::where('user_id', $userid)->get();
            $infos = $infos->where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
        } else {
            $infos = new Infosperso();
            $infos->user_id = $userid;
            $infos->score = 1;
            $infos->save();
        }
        //$request->type;
        //$request->id;
        if ($request->type == 'street') {
            $street = Street::find($request->id);
            $street->likes = $street->likes + 1;
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->id);
            $building->likes = $building->likes + 1;
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->id);
            $openspace->likes = $openspace->likes + 1;
            $openspace->save();
        }
    }

   public function dislike(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        if (Infosperso::where('user_id', $userid)->exists()) {
            $infos = Infosperso::where('user_id', $userid)->get();
            $infos = $infos->where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
        } else {
            $infos = new Infosperso();
            $infos->user_id = $userid;
            $infos->score = 1;
            $infos->save();
        }

        if ($request->type == 'street') {
            $street = Street::find($request->id);
            $street->dislikes = $street->dislikes + 1;
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->id);
            $building->dislikes = $building->dislikes + 1;
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->id);
            $openspace->dislikes = $openspace->dislikes + 1;
            $openspace->save();
        }
    }

    public function stars(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        if (Infosperso::where('user_id', $userid)->exists()) {
            $infos = Infosperso::where('user_id', $userid)->get();
            $infos = $infos->where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
        } else {
            $infos = new Infosperso();
            $infos->user_id = $userid;
            $infos->score = 1;
            $infos->save();
        }

        if ($request->type == 'street') {
            $street = Street::find($request->id);
            $street->stars = $street->stars + 1;
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->id);
            $building->stars = $building->stars + 1;
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->id);
            $openspace->stars = $openspace->stars + 1;
            $openspace->save();
        }
    }

    public function bof(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        if (Infosperso::where('user_id', $userid)->exists()) {
            $infos = Infosperso::where('user_id', $userid)->get();
            $infos = $infos->where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
        } else {
            $infos = new Infosperso();
            $infos->user_id = $userid;
            $infos->score = 1;
            $infos->save();
        }

        if ($request->type == 'street') {
            $street = Street::find($request->id);
            $street->bof = $street->bof + 1;
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->id);
            $building->bof = $building->bof + 1;
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->id);
            $openspace->bof = $openspace->bof + 1;
            $openspace->save();
        }
    }

    public function weird(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        if (Infosperso::where('user_id', $userid)->exists()) {
            $infos = Infosperso::where('user_id', $userid)->get();
            $infos = $infos->where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
        } else {
            $infos = new Infosperso();
            $infos->user_id = $userid;
            $infos->score = 1;
            $infos->save();
        }

        if ($request->type == 'street') {
            $street = Street::find($request->id);
            $street->weird = $street->weird + 1;
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->id);
            $building->weird = $building->weird + 1;
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->id);
            $openspace->weird = $openspace->weird + 1;
            $openspace->save();
        }
    }

    public function ohh(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        if (Infosperso::where('user_id', $userid)->exists()) {
            $infos = Infosperso::where('user_id', $userid)->get();
            $infos = $infos->where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
        } else {
            $infos = new Infosperso();
            $infos->user_id = $userid;
            $infos->score = 1;
            $infos->save();
        }

        if ($request->type == 'street') {
            $street = Street::find($request->id);
            $street->ohh = $street->ohh + 1;
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->id);
            $building->ohh = $building->ohh + 1;
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->id);
            $openspace->ohh = $openspace->ohh + 1;
            $openspace->save();
        }
    }

    public function wtf(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        if (Infosperso::where('user_id', $userid)->exists()) {
            $infos = Infosperso::where('user_id', $userid)->get();
            $infos = $infos->where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
        } else {
            $infos = new Infosperso();
            $infos->user_id = $userid;
            $infos->score = 1;
            $infos->save();
        }

        if ($request->type == 'street') {
            $street = Street::find($request->id);
            $street->wtf = $street->wtf + 1;
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->id);
            $building->wtf = $building->wtf + 1;
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->id);
            $openspace->wtf = $openspace->wtf + 1;
            $openspace->save();
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
            $infos = $infos->where('user_id', $userid)->first();
            $score = $infos->score;
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
                   $infos->score = $infos->score + 1;
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

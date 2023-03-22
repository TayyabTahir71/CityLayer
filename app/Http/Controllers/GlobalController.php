<?php

namespace App\Http\Controllers;

use App\Models\Infosperso;
use App\Models\User;
use App\Models\Street;
use App\Models\Building;
use App\Models\Openspace;
use App\Models\Opinion;
use App\Models\Tag;
use App\Models\Stat;
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
                $infos = Infosperso::where('user_id', $userid)->first();
                $street = Street::all();
                $building = Building::all();
                $openspace = Openspace::all();
                $tagstreet = Tag::where('Category', 'Street')->get();
                $tagbuilding = Tag::where('Category', 'Building')->get();
                $tagopenspace = Tag::where('Category', 'Openspace')->get();
        
                $all_data = array_merge(
                    $street->toArray(),
                    $building->toArray(),
                    $openspace->toArray()
                );

                return view('home', compact('infos', 'all_data', 'tagstreet', 'tagbuilding', 'tagopenspace'));
            } else {
            $infos = new Infosperso();
            $infos->user_id = $userid;
            $infos->save();
                return view('profil');
            }
        } else {
            return view('login');
        }
    }


    public function like(Request $request)
    {
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'Street') {
            if (Stat::where('street_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->street_id = $request->id;
                $stat->likes = 1;
                $stat->save();
                $street = Street::find($request->id);
                $street->likes = $street->likes + 1;
                $street->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'Building') {
            if (Stat::where('building_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->building_id = $request->id;
                $stat->likes = 1;
                $stat->save();
                $building = Building::find($request->id);
                $building->likes = $building->likes + 1;
                $building->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'Openspace') {
            if (Stat::where('openspace_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->openspace_id = $request->id;
                $stat->likes = 1;
                $stat->save();
                $openspace = Openspace::find($request->id);
                $openspace->likes = $openspace->likes + 1;
                $openspace->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        }
    }

   public function dislike(Request $request)
    {
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'Street') {
            if (Stat::where('street_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->street_id = $request->id;
                $stat->dislike = 1;
                $stat->save();
                $street = Street::find($request->id);
                $street->dislike = $street->dislike + 1;
                $street->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'Building') {
            if (Stat::where('building_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->building_id = $request->id;
                $stat->dislike = 1;
                $stat->save();
                $building = Building::find($request->id);
                $building->dislike = $building->dislike + 1;
                $building->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'Openspace') {
            if (Stat::where('openspace_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->openspace_id = $request->id;
                $stat->dislike = 1;
                $stat->save();
                $openspace = Openspace::find($request->id);
                $openspace->dislike = $openspace->dislike + 1;
                $openspace->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        }
    }

    public function stars(Request $request)
    {
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'Street') {
            if (Stat::where('street_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->street_id = $request->id;
                $stat->stars = 1;
                $stat->save();
                $street = Street::find($request->id);
                $street->stars = $street->stars + 1;
                $street->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'Building') {
            if (Stat::where('building_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->building_id = $request->id;
                $stat->stars = 1;
                $stat->save();
                $building = Building::find($request->id);
                $building->stars = $building->stars + 1;
                $building->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'Openspace') {
            if (Stat::where('openspace_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->openspace_id = $request->id;
                $stat->stars = 1;
                $stat->save();
                $openspace = Openspace::find($request->id);
                $openspace->stars = $openspace->stars + 1;
                $openspace->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        }
    }

    public function bof(Request $request)
    {
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'Street') {
            if (Stat::where('street_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->street_id = $request->id;
                $stat->bof = 1;
                $stat->save();
                $street = Street::find($request->id);
                $street->bof = $street->bof + 1;
                $street->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'Building') {
            if (Stat::where('building_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->building_id = $request->id;
                $stat->bof = 1;
                $stat->save();
                $building = Building::find($request->id);
                $building->bof = $building->bof + 1;
                $building->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'Openspace') {
            if (Stat::where('openspace_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->openspace_id = $request->id;
                $stat->bof = 1;
                $stat->save();
                $openspace = Openspace::find($request->id);
                $openspace->bof = $openspace->bof + 1;
                $openspace->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        }
    }

    public function weird(Request $request)
    {
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'Street') {
            if (Stat::where('street_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->street_id = $request->id;
                $stat->weird = 1;
                $stat->save();
                $street = Street::find($request->id);
                $street->weird = $street->weird + 1;
                $street->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'Building') {
            if (Stat::where('building_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->building_id = $request->id;
                $stat->weird = 1;
                $stat->save();
                $building = Building::find($request->id);
                $building->weird = $building->weird + 1;
                $building->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'Openspace') {
            if (Stat::where('openspace_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->openspace_id = $request->id;
                $stat->weird = 1;
                $stat->save();
                $openspace = Openspace::find($request->id);
                $openspace->weird = $openspace->weird + 1;
                $openspace->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        }
    }

    public function ohh(Request $request)
    {
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'Street') {
            if (Stat::where('street_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->street_id = $request->id;
                $stat->ohh = 1;
                $stat->save();
                $street = Street::find($request->id);
                $street->ohh = $street->ohh + 1;
                $street->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'Building') {
            if (Stat::where('building_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->building_id = $request->id;
                $stat->ohh = 1;
                $stat->save();
                $building = Building::find($request->id);
                $building->ohh = $building->ohh + 1;
                $building->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'Openspace') {
            if (Stat::where('openspace_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->openspace_id = $request->id;
                $stat->ohh = 1;
                $stat->save();
                $openspace = Openspace::find($request->id);
                $openspace->ohh = $openspace->ohh + 1;
                $openspace->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        }
    }

    public function wtf(Request $request)
    {
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'Street') {
            if (Stat::where('street_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->street_id = $request->id;
                $stat->wtf = 1;
                $stat->save();
                $street = Street::find($request->id);
                $street->wtf = $street->wtf + 1;
                $street->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'Building') {
            if (Stat::where('building_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->building_id = $request->id;
                $stat->wtf = 1;
                $stat->save();
                $building = Building::find($request->id);
                $building->wtf = $building->wtf + 1;
                $building->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'Openspace') {
            if (Stat::where('openspace_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->openspace_id = $request->id;
                $stat->wtf = 1;
                $stat->save();
                $openspace = Openspace::find($request->id);
                $openspace->wtf = $openspace->wtf + 1;
                $openspace->save();
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            } else {
                return 'already';
            }
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
            $infos = Infosperso::where('user_id', $userid)->first();
            $score = $infos->score;
        } else {
            $score = 1;
        }

        return view('dashboard', compact('score'));
    }

    public function profile()
    {
        $userid = backpack_auth()->user()->id;
        $name = backpack_auth()->user()->name;
        $infos = Infosperso::where('user_id', $userid)->first();
        $score = $infos->score;
        return view('profile', compact('name', 'infos', 'score'));
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


    public function street(){
        $tags = Tag::where('category', 'street')->get();


        return view('street_mapping', compact('tags'));
    }

    public function building(){
        $tags = Tag::where('category', 'building')->get();

        return view('building_mapping', compact('tags'));
    }

    public function openspace(){
        $tags = Tag::where('category', 'openspace')->get();

        return view('openspace_mapping', compact('tags'));
    }

    public function newtag(Request $request){
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->category = $request->category;
        $tag->save();
        return back();
    }

    public function newplace(Request $request){
        $userid = backpack_auth()->user()->id;
        if ($request->type == "Street"){
            $street = new Street();
            $street->name = $request->name;
            $street->user_id = $userid;
            $street->type = "Street";
            $street->latitude = $request->latitude;
            $street->longitude = $request->longitude;
            $street->save();
            //return the id after saving
            $streetid = $street->id;
            return $streetid.'&type=street';
        } elseif ($request->type == "Building"){
            $building = new Building();
            $building->name = $request->name;
            $building->user_id = $userid;
            $building->type = "Building";
            $building->latitude = $request->latitude;
            $building->longitude = $request->longitude;
            $building->save();
            //return the id after saving
            $buildingid = $building->id;
            return $buildingid.'&type=building';
        } elseif ($request->type == "Openspace"){
            $openspace = new Openspace();
            $openspace->name = $request->name;
            $openspace->user_id = $userid;
            $openspace->type = "Openspace";
            $openspace->latitude = $request->latitude;
            $openspace->longitude = $request->longitude;
            $openspace->save();
            //return the id after saving
            $openspaceid = $openspace->id;
            return $openspaceid.'&type=openspace';
        }
        else {
            return 'error';
        }
    }

    public function placestep2(Request $request){

        $userid = backpack_auth()->user()->id;
        if ($request->type == "Street"){
           
        } elseif ($request->type == "Building"){
        
        } elseif ($request->type == "Openspace"){
          
        }
    }

    public function feeling(Request $request){
        $userid = backpack_auth()->user()->id;
        $placeid = $request->id;
        return $placeid;
        // if ($request->type == "Street"){
        //     $street = Street::find($request->id);
        //     $street->feeling = $request->feeling;
        //     $street->save();
        // } elseif ($request->type == "Building"){
        //     $building = Building::find($request->id);
        //     $building->feeling = $request->feeling;
        //     $building->save();
        // } elseif ($request->type == "Openspace"){
        //     $openspace = Openspace::find($request->id);
        //     $openspace->feeling = $request->feeling;
        //     $openspace->save();
        // }
    }



      static function opinions(){

        $opinions = Opinion::all();
        return $opinions;
      }


}

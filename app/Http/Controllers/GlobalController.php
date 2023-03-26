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

                return view(
                    'home',
                    compact(
                        'infos',
                        'all_data',
                        'tagstreet',
                        'tagbuilding',
                        'tagopenspace'
                    )
                );
            } else {
                $infos = new Infosperso();
                $infos->user_id = $userid;
                $infos->score = 0;
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
        $userid = backpack_auth()->user()->id;
        $info = Infosperso::where('user_id', $userid)->first();
        if ($info->score > 0) {
            Infosperso::where('user_id', $userid)->update([
                'age' => $request->age,
                'gender' => $request->gender,
                'profession' => $request->profession,
                'relation' => $request->relation,
                'preferences' => $request->preferences,
            ]);
            return redirect('/');
        } else {
            $infos = Infosperso::where('user_id', $userid)->first();
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
            return redirect('/');
        }
    }

    public function street()
    {
        $tags = Tag::where('category', 'street')->get();

        return view('street_mapping', compact('tags'));
    }

    public function building()
    {
        $tags = Tag::where('category', 'building')->get();

        return view('building_mapping', compact('tags'));
    }

    public function openspace()
    {
        $tags = Tag::where('category', 'openspace')->get();

        return view('openspace_mapping', compact('tags'));
    }

    public function newtag(Request $request)
    {
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->category = $request->category;
        $tag->save();
        return back();
    }

    public function newopinion(Request $request)
    {
        $opinion = new Opinion();
        $opinion->name = $request->name;
        $opinion->save();
        return back();
    }

    public function newplace(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        if ($request->type == 'Street') {
            $street = new Street();
            $street->name = $request->name;
            $street->user_id = $userid;
            $street->type = 'Street';
            $street->latitude = $request->latitude;
            $street->longitude = $request->longitude;
            //convert array tags to string
            $tags = $request->tags;
            $street->tags = implode(',', $tags);
            $street->save();
            //return the id after saving
            $streetid = $street->id;
            return $streetid . '&type=street';
        } elseif ($request->type == 'Building') {
            $building = new Building();
            $building->name = $request->name;
            $building->user_id = $userid;
            $building->type = 'Building';
            $building->latitude = $request->latitude;
            $building->longitude = $request->longitude;
            $tags = $request->tags;
            $building->tags = implode(',', $tags);
            $building->save();
            //return the id after saving
            $buildingid = $building->id;
            return $buildingid . '&type=building';
        } elseif ($request->type == 'Openspace') {
            $openspace = new Openspace();
            $openspace->name = $request->name;
            $openspace->user_id = $userid;
            $openspace->type = 'Openspace';
            $openspace->latitude = $request->latitude;
            $openspace->longitude = $request->longitude;
            $tags = $request->tags;
            $openspace->tags = implode(',', $tags);
            $openspace->save();
            //return the id after saving
            $openspaceid = $openspace->id;
            return $openspaceid . '&type=openspace';
        } else {
            return 'error';
        }
    }

    public function opinions(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            $opinions = $request->opinions;
            $street->opinions = implode(',', $opinions);
            $street->save();
            return $request->placeid . '&type=street';
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $opinions = $request->opinions;
            $building->opinions = implode(',', $opinions);
            $building->save();
            return $request->placeid . '&type=building';
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $opinions = $request->opinions;
            $openspace->opinions = implode(',', $opinions);
            $openspace->save();
            return $request->placeid . '&type=openspace';
        }
    }

    public function feeling(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        $placeid = $request->id;
        if ($request->type == 'street') {
            $street = Street::find($request->id);
            $street->feeling = $request->feeling;
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->id);
            $building->feeling = $request->feeling;
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->id);
            $openspace->feeling = $request->feeling;
            $openspace->save();
        }
        return $placeid;
    }

    static function allopinions()
    {
        $opinions = Opinion::all();
        return $opinions;
    }

    public function avatar(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        //dd($request->all());
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->storeAs('public/uploads/avatar/', $imageName);

        $user = User::find($userid);

        $infos = Infosperso::where('user_id', $userid)->first();
        $infos->score = $infos->score + 1;
        $infos->save();

        $user->avatar = $imageName;
        $user->save();

        return back();
    }

    public function dashboard()
    {
        $userid = backpack_auth()->user()->id;
        $street = Street::where('user_id', $userid)->get();
        $building = Building::where('user_id', $userid)->get();
        $openspace = Openspace::where('user_id', $userid)->get();
        if (Infosperso::where('user_id', $userid)->exists()) {
            $infos = Infosperso::where('user_id', $userid)->first();
            $score = $infos->score;
        } else {
            $score = 1;
        }

        $all_data = array_merge(
            $street->toArray(),
            $building->toArray(),
            $openspace->toArray()
        );

        return view('dashboard', compact('all_data', 'score'));
    }

    public function store(Request $request)
    {
        //dd($request->all());

        if ($request->image != null) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs(
                'public/uploads/' . $request->type,
                $imageName
            );
        } else {
            $imageName = 'null';
        }

        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            $street->image = '/uploads/street/' . $imageName;
            $street->change = $request->change;
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $building->image = '/uploads/building/' . $imageName;
            $building->change = $request->change;
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $openspace->image = '/uploads/openspace/' . $imageName;
            $openspace->change = $request->change;
            $openspace->save();
        }

        $placeid = $request->placeid;
        $type = $request->type;

        return view('step5', compact('placeid', 'type'));
    }

    public function confortlevel(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            $street->confort = $request->level;
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $building->confort = $request->level;
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $openspace->confort = $request->level;
            $openspace->save();
        }

        $placeid = $request->placeid;
        $type = $request->type;

        return view('step6', compact('placeid', 'type'));
    }

    public function enjoy(Request $request)
    {
        // dd($request->all());
        $userid = backpack_auth()->user()->id;
        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            if ($request->action == 'rest') {
                $street->rest = $request->value;
                $street->rest_text = $request->text;
                $street->save();
            }
            if ($request->action == 'movement') {
                $street->movement = $request->value;
                $street->movement_text = $request->text;
                $street->save();
            }
            if ($request->action == 'activities') {
                $street->activities = $request->value;
                $street->activities_text = $request->text;
                $street->save();
            }
            if ($request->action == 'orientation') {
                $street->orientation = $request->value;
                $street->orientation_text = $request->text;
                $street->save();
            }
            if ($request->action == 'weather') {
                $street->weather = $request->value;
                $street->weather_text = $request->text;
                $street->save();
            }
            if ($request->action == 'facilities') {
                $street->facilities = $request->value;
                $street->facilities_text = $request->text;
                $street->save();
            }
            if ($request->action == 'noise') {
                $street->noise = $request->value;
                $street->noise_text = $request->text;
                $street->save();
            }
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            if ($request->action == 'rest') {
                $building->rest = $request->value;
                $building->rest_text = $request->text;
                $building->save();
            }
            if ($request->action == 'movement') {
                $building->movement = $request->value;
                $building->movement_text = $request->text;
                $building->save();
            }
            if ($request->action == 'activities') {
                $building->activities = $request->value;
                $building->activities_text = $request->text;
                $building->save();
            }
            if ($request->action == 'orientation') {
                $building->orientation = $request->value;
                $building->orientation_text = $request->text;
                $building->save();
            }
            if ($request->action == 'weather') {
                $building->weather = $request->value;
                $building->weather_text = $request->text;
                $building->save();
            }
            if ($request->action == 'facilities') {
                $building->facilities = $request->value;
                $building->facilities_text = $request->text;
                $building->save();
            }
            if ($request->action == 'noise') {
                $building->noise = $request->value;
                $building->noise_text = $request->text;
                $building->save();
            }
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            if ($request->action == 'rest') {
                $openspace->rest = $request->value;
                $openspace->rest_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'movement') {
                $openspace->movement = $request->value;
                $openspace->movement_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'activities') {
                $openspace->activities = $request->value;
                $openspace->activities_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'orientation') {
                $openspace->orientation = $request->value;
                $openspace->orientation_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'weather') {
                $openspace->weather = $request->value;
                $openspace->weather_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'noise') {
                $openspace->noise = $request->value;
                $openspace->noise_text = $request->text;
                $openspace->save();
            }
        }

        return 'ok';
    }

    public function enjoyable(Request $request)
    {
        $placeid = $request->placeid;
        $type = $request->type;
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            $street->enjoyable = $request->enjoyable;
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $building->enjoyable = $request->enjoyable;
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $openspace->enjoyable = $request->enjoyable;
            $openspace->save();
        }

        $placeid = $request->placeid;
        $type = $request->type;

        return view('step7', compact('placeid', 'type'));
    }

    public function enjoydetail(Request $request)
    {
        $placeid = $request->placeid;
        $type = $request->type;
        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            if ($request->action == 'talking') {
                $street->talking = $request->value;
                $street->talking_text = $request->text;
                $street->save();
            }
            if ($request->action == 'seasonality') {
                $street->seasonality = $request->value;
                $street->seasonality_text = $request->text;
                $street->save();
            }
            if ($request->action == 'plants') {
                $street->plants = $request->value;
                $street->plants_text = $request->text;
                $street->save();
            }
            if ($request->action == 'sunlight') {
                $street->sunlight = $request->value;
                $street->sunlight_text = $request->text;
                $street->save();
            }
            if ($request->action == 'interesting') {
                $street->interesting = $request->value;
                $street->interesting_text = $request->text;
                $street->save();
            }
            if ($request->action == 'shade') {
                $street->shade = $request->value;
                $street->shade_text = $request->text;
                $street->save();
            }
            if ($request->action == 'beauty') {
                $street->beauty = $request->value;
                $street->beauty_text = $request->text;
                $street->save();
            }
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            if ($request->action == 'talking') {
                $building->talking = $request->value;
                $building->talking_text = $request->text;
                $building->save();
            }
            if ($request->action == 'seasonality') {
                $building->seasonality = $request->value;
                $building->seasonality_text = $request->text;
                $building->save();
            }
            if ($request->action == 'plants') {
                $building->plants = $request->value;
                $building->plants_text = $request->text;
                $building->save();
            }
            if ($request->action == 'sunlight') {
                $building->sunlight = $request->value;
                $building->sunlight_text = $request->text;
                $building->save();
            }
            if ($request->action == 'interesting') {
                $building->interesting = $request->value;
                $building->interesting_text = $request->text;
                $building->save();
            }
            if ($request->action == 'shade') {
                $building->shade = $request->value;
                $building->shade_text = $request->text;
                $building->save();
            }
            if ($request->action == 'beauty') {
                $building->beauty = $request->value;
                $building->beauty_text = $request->text;
                $building->save();
            }
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            if ($request->action == 'talking') {
                $openspace->talking = $request->value;
                $openspace->talking_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'seasonality') {
                $openspace->seasonality = $request->value;
                $openspace->seasonality_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'plants') {
                $openspace->plants = $request->value;
                $openspace->plants_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'sunlight') {
                $openspace->sunlight = $request->value;
                $openspace->sunlight_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'interesting') {
                $openspace->interesting = $request->value;
                $openspace->interesting_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'shade') {
                $openspace->shade = $request->value;
                $openspace->shade_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'beauty') {
                $openspace->beauty = $request->value;
                $openspace->beauty_text = $request->text;
                $openspace->save();
            }
        }

        return 'ok';
    }

    public function protected(Request $request)
    {
        $placeid = $request->placeid;
        $type = $request->type;
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            $street->protected = $request->protected;
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $building->protected = $request->protected;
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $openspace->protected = $request->protected;
            $openspace->save();
        }

        $placeid = $request->placeid;
        $type = $request->type;

        return view('step8', compact('placeid', 'type'));
    }

    public function protectedetail(Request $request)
    {
        $placeid = $request->placeid;
        $type = $request->type;

        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            if ($request->action == 'protection') {
                $street->protection = $request->value;
                $street->protection_text = $request->text;
                $street->save();
            }
            if ($request->action == 'polluants') {
                $street->polluants = $request->value;
                $street->polluants_text = $request->text;
                $street->save();
            }
            if ($request->action == 'night') {
                $street->night = $request->value;
                $street->night_text = $request->text;
                $street->save();
            }
            if ($request->action == 'hazards') {
                $street->hazards = $request->text;
                $street->save();
            }
            if ($request->action == 'dangerous') {
                $street->dangerous = $request->value;
                $street->dangerous_text = $request->text;
                $street->save();
            }
            if ($request->action == 'protection_harm') {
                $street->protection_harm = $request->value;
                $street->protection_harm_text = $request->text;
                $street->save();
            }
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            if ($request->action == 'protection') {
                $building->protection = $request->value;
                $building->protection_text = $request->text;
                $building->save();
            }
            if ($request->action == 'polluants') {
                $building->polluants = $request->value;
                $building->polluants_text = $request->text;
                $building->save();
            }
            if ($request->action == 'night') {
                $building->night = $request->value;
                $building->night_text = $request->text;
                $building->save();
            }
            if ($request->action == 'hazards') {
                $building->hazards = $request->text;
                $building->save();
            }
            if ($request->action == 'dangerous') {
                $building->dangerous = $request->value;
                $building->dangerous_text = $request->text;
                $building->save();
            }
            if ($request->action == 'protection_harm') {
                $building->protection_harm = $request->value;
                $building->protection_harm_text = $request->text;
                $building->save();
            }
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            if ($request->action == 'protection') {
                $openspace->protection = $request->value;
                $openspace->protection_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'polluants') {
                $openspace->polluants = $request->value;
                $openspace->polluants_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'night') {
                $openspace->night = $request->value;
                $openspace->night_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'hazards') {
                $openspace->hazards = $request->text;
                $openspace->save();
            }
            if ($request->action == 'dangerous') {
                $openspace->dangerous = $request->value;
                $openspace->dangerous_text = $request->text;
                $openspace->save();
            }
            if ($request->action == 'protection_harm') {
                $openspace->protection_harm = $request->value;
                $openspace->protection_harm_text = $request->text;
                $openspace->save();
            }
        }

        return 'ok';
    }
}

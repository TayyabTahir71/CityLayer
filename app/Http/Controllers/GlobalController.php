<?php

namespace App\Http\Controllers;

use App\Models\Infosperso;
use App\Models\User;
use App\Models\Street;
use App\Models\Building;
use App\Models\Openspace;
use App\Models\Opinion;
use App\Models\Tag;
use App\Models\Space_tag;
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
            //count tags
            $count = count($tags);
            //add 1 point for each tag
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + $count;
            $infos->save();
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
            //count tags
            $count = count($tags);
            //add 1 point for each tag
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + $count;
            $infos->save();
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
            //count tags
            $count = count($tags);
            //add 1 point for each tag
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + $count;
            $infos->save();
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
            //count opinions
            $count = count($opinions);
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + $count * 2;
            $infos->save();
            $street->save();
            return $request->placeid . '&type=street';
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $opinions = $request->opinions;
            $building->opinions = implode(',', $opinions);
            $count = count($opinions);
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + $count * 2;
            $infos->save();
            $building->save();
            return $request->placeid . '&type=building';
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $opinions = $request->opinions;
            $openspace->opinions = implode(',', $opinions);
            $count = count($opinions);
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + $count * 2;
            $infos->save();
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
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->id);
            $building->feeling = $request->feeling;
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->id);
            $openspace->feeling = $request->feeling;
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
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

    public function store0(Request $request)
    {
        //dd($request->all());
        $userid = backpack_auth()->user()->id;
        // dd($request->all());

        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            if ($request->imagefirst != null) {
                $imageName =
                    $street->name . '.' . $request->imagefirst->extension();
                $request->imagefirst->storeAs(
                    'public/uploads/street/feeling/',
                    $imageName
                );
                $street->image0 = '/uploads/street/feeling/' . $imageName;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 5;
                $infos->save();
                $street->save();
            } 
            if ($request->description != null) {
                $street->description = $request->description;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            }
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            if ($request->imagefirst != null) {
                $imageName =
                    $building->name . '.' . $request->imagefirst->extension();
                $request->imagefirst->storeAs(
                    'public/uploads/building/feeling/',
                    $imageName
                );
                $building->image0 = '/uploads/building/feeling/' . $imageName;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 5;
                $infos->save();
                $building->save();
            } 
            if ($request->description != null) {
                $building->description = $request->description;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            }
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            if ($request->imagefirst != null) {
                $imageName =
                    $openspace->name . '.' . $request->imagefirst->extension();
                $request->imagefirst->storeAs(
                    'public/uploads/openspace/feeling/',
                    $imageName
                );
                $openspace->image0 = '/uploads/openspace/feeling/' . $imageName;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 5;
                $infos->save();
                $openspace->save();
            } 
            if ($request->description != null) {
                $openspace->description = $request->description;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            }
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
            $openspace->save();
        }

        $placeid = $request->placeid;
        $type = $request->type;

        return view('step3', compact('placeid', 'type'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            if ($request->image != null) {
                $imageName = $street->name . '.' . $request->image->extension();
                $request->image->storeAs(
                    'public/uploads/street/tochange/',
                    $imageName
                );
                $street->image = '/uploads/street/tochange/' . $imageName;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 5;
                $infos->save();
                $street->save();
            }
            if ($request->description != null) {
                $street->description2 = $request->description;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            }
            $street->change = $request->change;
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            if ($request->image != null) {
                $imageName =
                    $building->name . '.' . $request->image->extension();
                $request->image->storeAs(
                    'public/uploads/building/tochange/',
                    $imageName
                );
                $building->image = '/uploads/building/tochange/' . $imageName;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 5;
                $infos->save();
                $building->save();
            }

            if ($request->description != null) {
                $building->description2 = $request->description;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            }
            $building->change = $request->change;
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            if ($request->image != null) {
                $imageName =
                    $openspace->name . '.' . $request->image->extension();
                $request->image->storeAs(
                    'public/uploads/openspace/tochange/',
                    $imageName
                );
                $openspace->image = '/uploads/openspace/tochange/' . $imageName;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 5;
                $infos->save();
                $openspace->save();
            }
            if ($request->description != null) {
                $openspace->description2 = $request->description;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;
                $infos->save();
            }
            $openspace->change = $request->change;
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
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
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $building->confort = $request->level;
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $openspace->confort = $request->level;
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
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
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->rest_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'movement') {
                $street->movement = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->movement_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'activities') {
                $street->activities = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->activities_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'orientation') {
                $street->orientation = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->orientation_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'weather') {
                $street->weather = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->weather_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'facilities') {
                $street->facilities = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->facilities_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'noise') {
                $street->noise = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->noise_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            if ($request->action == 'rest') {
                $building->rest = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->rest_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'movement') {
                $building->movement = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->movement_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'activities') {
                $building->activities = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->activities_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'orientation') {
                $building->orientation = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->orientation_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'weather') {
                $building->weather = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->weather_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'facilities') {
                $building->facilities = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->facilities_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'noise') {
                $building->noise = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->noise_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            if ($request->action == 'rest') {
                $openspace->rest = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->rest_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'movement') {
                $openspace->movement = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->movement_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'activities') {
                $openspace->activities = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->activities_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'orientation') {
                $openspace->orientation = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->orientation_text = $request->text;

                    $infos->save();
                }

                $openspace->save();
            }
            if ($request->action == 'weather') {
                $openspace->weather = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->weather_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'noise') {
                $openspace->noise = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->noise_text = $request->text;
                }
                $infos->save();

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
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $building->enjoyable = $request->enjoyable;
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $openspace->enjoyable = $request->enjoyable;
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
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
        $userid = backpack_auth()->user()->id;
        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            if ($request->action == 'talking') {
                $street->talking = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->talking_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'seasonality') {
                $street->seasonality = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->seasonality_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'plants') {
                $street->plants = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->plants_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'sunlight') {
                $street->sunlight = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->sunlight_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'interesting') {
                $street->interesting = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->interesting_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'shade') {
                $street->shade = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->shade_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'beauty') {
                $street->beauty = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->beauty_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            if ($request->action == 'talking') {
                $building->talking = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->talking_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'seasonality') {
                $building->seasonality = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->seasonality_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'plants') {
                $building->plants = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->plants_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'sunlight') {
                $building->sunlight = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->sunlight_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'interesting') {
                $building->interesting = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->interesting_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'shade') {
                $building->shade = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->shade_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'beauty') {
                $building->beauty = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->beauty_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            if ($request->action == 'talking') {
                $openspace->talking = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->talking_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'seasonality') {
                $openspace->seasonality = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->seasonality_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'plants') {
                $openspace->plants = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->plants_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'sunlight') {
                $openspace->sunlight = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->sunlight_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'interesting') {
                $openspace->interesting = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->interesting_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'shade') {
                $openspace->shade = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->shade_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'beauty') {
                $openspace->beauty = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->beauty_text = $request->text;
                }
                $infos->save();

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
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $building->protected = $request->protected;
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $openspace->protected = $request->protected;
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->score = $infos->score + 1;
            $infos->save();
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
        $userid = backpack_auth()->user()->id;
        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            if ($request->action == 'protection') {
                $street->protection = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->protection_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'polluants') {
                $street->polluants = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->polluants_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'night') {
                $street->night = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->night_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'hazards') {
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->hazards = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'dangerous') {
                $street->dangerous = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->dangerous_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'protection_harm') {
                $street->protection_harm = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->protection_harm_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            if ($request->action == 'protection') {
                $building->protection = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->protection_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'polluants') {
                $building->polluants = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->polluants_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'night') {
                $building->night = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->night_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'hazards') {
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->hazards = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'dangerous') {
                $building->dangerous = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->dangerous_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'protection_harm') {
                $building->protection_harm = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->protection_harm_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            if ($request->action == 'protection') {
                $openspace->protection = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->protection_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'polluants') {
                $openspace->polluants = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->polluants_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'night') {
                $openspace->night = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->night_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'hazards') {
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->hazards = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'dangerous') {
                $openspace->dangerous = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->dangerous_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'protection_harm') {
                $openspace->protection_harm = $request->value;
                $infos = Infosperso::where('user_id', $userid)->first();
                $infos->score = $infos->score + 1;

                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->protection_harm_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
        }

        return 'ok';
    }

    public function timespending(Request $request)
    {
        $placeid = $request->placeid;
        $type = $request->type;
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            $street->time_spending = $request->step8;
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $building->time_spending = $request->step8;
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $openspace->time_spending = $request->step8;
            $openspace->save();
        }

        $placeid = $request->placeid;
        $type = $request->type;

        return view('step9', compact('placeid', 'type'));
    }

    public function timespendingdetail(Request $request)
    {
        $placeid = $request->placeid;
        $type = $request->type;
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            if ($request->action == 'spend_time') {
                $street->spend_time = $request->value;
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->spend_time_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'meeting') {
                $street->meeting = $request->value;
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->meeting_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
            if ($request->action == 'events') {
                $street->events = $request->value;
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->events_text = $request->text;
                }
                $infos->save();

                $street->save();
            }

            if ($request->action == 'multifunctional') {
                $street->multifunctional = $request->value;
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $street->multifunctional_text = $request->text;
                }
                $infos->save();

                $street->save();
            }
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            if ($request->action == 'spend_time') {
                $building->spend_time = $request->value;
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->spend_time_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'meeting') {
                $building->meeting = $request->value;
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->meeting_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'events') {
                $building->events = $request->value;
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->events_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
            if ($request->action == 'multifunctional') {
                $building->multifunctional = $request->value;
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $building->multifunctional_text = $request->text;
                }
                $infos->save();

                $building->save();
            }
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            if ($request->action == 'spend_time') {
                $openspace->spend_time = $request->value;
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->spend_time_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'meeting') {
                $openspace->meeting = $request->value;
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->meeting_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'events') {
                $openspace->events = $request->value;
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->meeting_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
            if ($request->action == 'multifunctional') {
                $openspace->multifunctional = $request->value;
                if ($request->text != null) {
                    $infos = Infosperso::where('user_id', $userid)->first();
                    $infos->score = $infos->score + 1;
                    $openspace->multifunctional_text = $request->text;
                }
                $infos->save();

                $openspace->save();
            }
        }

        return 'ok';
        // return view('step10', compact('placeid', 'type'));
    }

    public function spaceusage(Request $request)
    {
        $placeid = $request->placeid;
        $type = $request->type;
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            $street->spaceusage = $request->know_space;
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $building->spaceusage = $request->know_space;
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $openspace->spaceusage = $request->know_space;
            $openspace->save();
        }

        $placeid = $request->placeid;
        $type = $request->type;

        return view('step10', compact('placeid', 'type'));
    }

    public function spaceusagedetail(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        $infos = Infosperso::where('user_id', $userid)->first();

        if ($request->type == 'street') {
            $street = Street::find($request->placeid);
            $spacetag = $request->spacetag;
            $street->usagedetail = implode(',', $spacetag);
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $spacetag = $request->spacetag;
            $building->usagedetail = implode(',', $spacetag);
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $spacetag = $request->spacetag;
            $openspace->usagedetail = implode(',', $spacetag);
            $openspace->save();
        }

        return 'ok';
    }

    static function allspacetag()
    {
        $spacetags = Space_tag::all();
        return $spacetags;
    }

    public function newspacetag(Request $request)
    {
        $spacetag = new Space_tag();
        $spacetag->name = $request->name;
        $spacetag->save();
        return 'ok';
    }

    public function place(Request $request)
    {
        $type = $request->type;
        $placeid = $request->id;
        if ($request->type == 'Street') {
            $data = Street::find($request->id);
            return view('place', compact('data', 'type', 'placeid'));
        }
        if ($request->type == 'Building') {
            $data = Building::find($request->id);
            return view('place', compact('data', 'type', 'placeid'));
        }
        if ($request->type == 'Openspace') {
            $data = Openspace::find($request->id);
            return view('place', compact('data', 'type', 'placeid'));
        }
    }

    public function delete(Request $request)
    {
        if ($request->type == 'Street') {
            $data = Street::find($request->id);
            $data->delete();
            return redirect('/dashboard');
        }
        if ($request->type == 'Building') {
            $data = Building::find($request->id);
            $data->delete();
            return redirect('/dashboard');
        }
        if ($request->type == 'Openspace') {
            $data = Openspace::find($request->id);
            $data->delete();
            return redirect('/dashboard');
        }
    }
}

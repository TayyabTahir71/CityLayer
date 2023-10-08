<?php

namespace App\Http\Controllers;

use App\Models\Infosperso;
use App\Models\User;
use App\Models\Street;
use App\Models\Building;
use App\Models\Openspace;
use App\Models\Opinion;
use App\Models\Opinion_de;
use App\Models\Comment_en;
use App\Models\Comment_de;
use App\Models\Observation;
use App\Models\Pages;
use App\Models\Place;
use App\Models\PlaceDetails;
use App\Models\Tag;
use App\Models\Tag_de;
use App\Models\Space_tag_de;
use App\Models\Space_tag;
use App\Models\Stat;
use App\Models\Preference;
use Carbon\Carbon;
use Database\Seeders\PlaceSeeder;
use Pestopancake\LaravelBackpackNotifications\Notifications\DatabaseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class GlobalController extends Controller
{

    public $place_id;
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
                $allPlaces = Place::where('user_id', null)
                    ->orWhere('user_id', backpack_auth()->user()->id)
                    ->whereNull('parent_id')->with('subplaces')
                    ->get();

                $allObservations = Observation::where('user_id', null)->orWhere('user_id', backpack_auth()->user()->id)->get();



                $all_data = PlaceDetails::where('user_id', backpack_auth()->user()->id)->with('place', 'observation', 'user')->get();

                // dd($all_data);


                return view(
                    'home',
                    compact(
                        'infos',
                        'all_data',
                        'tagstreet',
                        'tagbuilding',
                        'tagopenspace',
                        'userid',
                        'allPlaces',
                        'allObservations'


                    )
                );
            } else {
                $infos = new Infosperso();
                $infos->user_id = $userid;
                $infos->save();
                return view('profil');
            }
        } else {
            return view('index');
        }
    }

    public function leaderboard()
    {
        $users = User::all();
        $street = Street::all();
        $building = Building::all();
        $openspace = Openspace::all();
        //sort by usr->score
        $users = $users->sortByDesc('score');
        return view('leaderboard', compact('users', 'street', 'building', 'openspace'));
    }

    public function comment(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        $locale = session()->get('locale');

        if ($locale == 'de') {
            $comment = new Comment_de();
            $comment->user_id = $userid;
            $comment->placeid = $request->id;
            $comment->type = $request->type;
            if ($request->type == 'street') {
                $street = Street::find($request->id);
                if ($street->user_id == $userid) {
                    return 'your';
                } else {
                    $street->comments = $street->comments + 1;
                    backpack_auth()->user()->score + 1;
                    backpack_auth()->user()->save();
                    $street->save();
                }
            } elseif ($request->type == 'building') {
                $building = Building::find($request->id);
                if ($building->user_id == $userid) {
                    return 'your';
                } else {
                    $building->comments = $building->comments + 1;
                    backpack_auth()->user()->score + 1;
                    backpack_auth()->user()->save();
                    $building->save();
                }
            } elseif ($request->type == 'openspace') {
                $openspace = Openspace::find($request->id);
                if ($openspace->user_id == $userid) {
                    return 'your';
                } else {
                    $openspace->comments = $openspace->comments + 1;
                    backpack_auth()->user()->score + 1;
                    backpack_auth()->user()->save();
                    $openspace->save();
                }
            }
            $comment->comment = $request->comment;
            $comment->save();
        } else {
            $comment = new Comment_en();
            $comment->user_id = $userid;
            $comment->placeid = $request->id;
            $comment->type = $request->type;
            if ($request->type == 'street') {
                $street = Street::find($request->id);
                if ($street->user_id == $userid) {
                    return 'your';
                } else {
                    $street->comments = $street->comments + 1;
                    backpack_auth()->user()->score + 1;
                    backpack_auth()->user()->save();
                    $street->save();
                }
            } elseif ($request->type == 'building') {
                $building = Building::find($request->id);
                if ($building->user_id == $userid) {
                    return 'your';
                } else {
                    $building->comments = $building->comments + 1;
                    backpack_auth()->user()->score + 1;
                    backpack_auth()->user()->save();
                    $building->save();
                }
            } elseif ($request->type == 'openspace') {
                $openspace = Openspace::find($request->id);
                if ($openspace->user_id == $userid) {
                    return 'your';
                } else {
                    $openspace->comments = $openspace->comments + 1;
                    backpack_auth()->user()->score + 1;
                    backpack_auth()->user()->save();
                    $openspace->save();
                }
            }
            $comment->comment = $request->comment;
            $comment->save();
        }

        return 'commented';
    }

    public function like(Request $request)
    {
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'street') {
            if (
                Stat::where('street_id', $request->id)
                ->where('user_id', $userid)
                ->doesntExist()
            ) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->street_id = $request->id;
                $stat->likes = 1;
                $stat->save();
                $street = Street::find($request->id);
                $street->likes = $street->likes + 1;
                $street->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'building') {
            if (
                Stat::where('building_id', $request->id)
                ->where('user_id', $userid)
                ->doesntExist()
            ) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->building_id = $request->id;
                $stat->likes = 1;
                $stat->save();
                $building = Building::find($request->id);
                $building->likes = $building->likes + 1;
                $building->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'openspace') {
            if (
                Stat::where('openspace_id', $request->id)
                ->where('user_id', $userid)
                ->doesntExist()
            ) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->openspace_id = $request->id;
                $stat->likes = 1;
                $stat->save();
                $openspace = Openspace::find($request->id);
                $openspace->likes = $openspace->likes + 1;
                $openspace->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        }
    }

    public function dislike(Request $request)
    {
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'street') {
            if (
                Stat::where('street_id', $request->id)
                ->where('user_id', $userid)
                ->doesntExist()
            ) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->street_id = $request->id;
                $stat->dislike = 1;
                $stat->save();
                $street = Street::find($request->id);
                $street->dislike = $street->dislike + 1;
                $street->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'building') {
            if (
                Stat::where('building_id', $request->id)
                ->where('user_id', $userid)
                ->doesntExist()
            ) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->building_id = $request->id;
                $stat->dislike = 1;
                $stat->save();
                $building = Building::find($request->id);
                $building->dislike = $building->dislike + 1;
                $building->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'openspace') {
            if (
                Stat::where('openspace_id', $request->id)
                ->where('user_id', $userid)
                ->doesntExist()
            ) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->openspace_id = $request->id;
                $stat->dislike = 1;
                $stat->save();
                $openspace = Openspace::find($request->id);
                $openspace->dislike = $openspace->dislike + 1;
                $openspace->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        }
    }

    public function stars(Request $request)
    {
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'street') {
            if (
                Stat::where('street_id', $request->id)
                ->where('user_id', $userid)
                ->doesntExist()
            ) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->street_id = $request->id;
                $stat->stars = 1;
                $stat->save();
                $street = Street::find($request->id);
                $street->stars = $street->stars + 1;
                $street->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'building') {
            if (
                Stat::where('building_id', $request->id)
                ->where('user_id', $userid)
                ->doesntExist()
            ) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->building_id = $request->id;
                $stat->stars = 1;
                $stat->save();
                $building = Building::find($request->id);
                $building->stars = $building->stars + 1;
                $building->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'openspace') {
            if (
                Stat::where('openspace_id', $request->id)
                ->where('user_id', $userid)
                ->doesntExist()
            ) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->openspace_id = $request->id;
                $stat->stars = 1;
                $stat->save();
                $openspace = Openspace::find($request->id);
                $openspace->stars = $openspace->stars + 1;
                $openspace->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        }
    }

    public function bof(Request $request)
    {
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'street') {
            if (
                Stat::where('street_id', $request->id)
                ->where('user_id', $userid)
                ->doesntExist()
            ) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->street_id = $request->id;
                $stat->bof = 1;
                $stat->save();
                $street = Street::find($request->id);
                $street->bof = $street->bof + 1;
                $street->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'building') {
            if (
                Stat::where('building_id', $request->id)
                ->where('user_id', $userid)
                ->doesntExist()
            ) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->building_id = $request->id;
                $stat->bof = 1;
                $stat->save();
                $building = Building::find($request->id);
                $building->bof = $building->bof + 1;
                $building->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'openspace') {
            if (
                Stat::where('openspace_id', $request->id)
                ->where('user_id', $userid)
                ->doesntExist()
            ) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->openspace_id = $request->id;
                $stat->bof = 1;
                $stat->save();
                $openspace = Openspace::find($request->id);
                $openspace->bof = $openspace->bof + 1;
                $openspace->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        }
    }

    public function weird(Request $request)
    {
        $userid = backpack_auth()->user()->id;

        if ($request->type == 'street') {
            if (
                Stat::where('street_id', $request->id)
                ->where('user_id', $userid)
                ->doesntExist()
            ) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->street_id = $request->id;
                $stat->weird = 1;
                $stat->save();
                $street = Street::find($request->id);
                $street->weird = $street->weird + 1;
                $street->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'building') {
            if (
                Stat::where('building_id', $request->id)
                ->where('user_id', $userid)
                ->doesntExist()
            ) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->building_id = $request->id;
                $stat->weird = 1;
                $stat->save();
                $building = Building::find($request->id);
                $building->weird = $building->weird + 1;
                $building->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        } elseif ($request->type == 'openspace') {
            if (Stat::where('openspace_id', $request->id)->doesntExist()) {
                $stat = new Stat();
                $stat->user_id = $userid;
                $stat->openspace_id = $request->id;
                $stat->weird = 1;
                $stat->save();
                $openspace = Openspace::find($request->id);
                $openspace->weird = $openspace->weird + 1;
                $openspace->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            } else {
                return 'already';
            }
        }
    }

    public function profil()
    {
        return view('home');
    }

    private function haversine($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371000; // in meters
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c;

        return $distance;
    }

    public function profile()
    {
        $userid = backpack_auth()->user()->id;
        $locale = session()->get('locale');
        $name = backpack_auth()->user()->name;
        $score = backpack_auth()->user()->score;
        $infos = Infosperso::where('user_id', $userid)->first();

        $street = Street::where('user_id', $userid)->get();
        $building = Building::where('user_id', $userid)->get();
        $openspace = Openspace::where('user_id', $userid)->get();
        $sumcomment =
            Street::where('user_id', $userid)->sum('comments') +
            Building::where('user_id', $userid)->sum('comments') +
            Openspace::where('user_id', $userid)->sum('comments');
        $sumreaction =
            Street::where('user_id', $userid)->sum('likes') +
            Street::where('user_id', $userid)->sum('dislikes') +
            Street::where('user_id', $userid)->sum('stars') +
            Street::where('user_id', $userid)->sum('bof') +
            Street::where('user_id', $userid)->sum('weird') +
            Building::where('user_id', $userid)->sum('likes') +
            Building::where('user_id', $userid)->sum('dislikes') +
            Building::where('user_id', $userid)->sum('stars') +
            Building::where('user_id', $userid)->sum('bof') +
            Building::where('user_id', $userid)->sum('weird') +
            Openspace::where('user_id', $userid)->sum('likes') +
            Openspace::where('user_id', $userid)->sum('dislikes') +
            Openspace::where('user_id', $userid)->sum('stars') +
            Openspace::where('user_id', $userid)->sum('bof') +
            Openspace::where('user_id', $userid)->sum('weird');
        //count how many street image are not null
        $countimage =
            Street::where('user_id', $userid)
            ->whereNotNull('image')
            ->count() +
            Street::where('user_id', $userid)
            ->whereNotNull('image0')
            ->count() +
            Building::where('user_id', $userid)
            ->whereNotNull('image')
            ->count() +
            Building::where('user_id', $userid)
            ->whereNotNull('image0')
            ->count() +
            Openspace::where('user_id', $userid)
            ->whereNotNull('image')
            ->count() +
            Openspace::where('user_id', $userid)
            ->whereNotNull('image0')
            ->count();

        if ($locale == 'de') {
            $mycomments = Comment_de::where('user_id', $userid)->get();
        } else {
            $mycomments = Comment_en::where('user_id', $userid)->get();
        }

        $countall = count($street) + count($building) + count($openspace);
        $countstreet = count($street);
        $countbuilding = count($building);
        $countopenspace = count($openspace);
        $countmycomments = count($mycomments);


        $streets = Street::where('user_id', $userid)->get();
        $buildings = Building::where('user_id', $userid)->get();
        $openspaces = Openspace::where('user_id', $userid)->get();

        $explorer = '0';
        // if distance between street entries is more than 50m then explorer = 1
        foreach ($streets as $street) {

            // compare distance with other streets
            foreach ($streets as $otherStreet) {
                if ($street->id !== $otherStreet->id) {
                    $distance = $this->haversine($street->latitude, $street->longitude, $otherStreet->latitude, $otherStreet->longitude);

                    if ($distance > 50) {
                        $explorer = '1';
                        break;
                    }
                }
            }
        }

        foreach ($buildings as $building) {


            foreach ($buildings as $otherStreet) {
                if ($building->id !== $otherStreet->id) {
                    $distance = $this->haversine($building->latitude, $building->longitude, $otherStreet->latitude, $otherStreet->longitude);

                    if ($distance > 50) {
                        $explorer = '1';
                        break;
                    }
                }
            }
        }

        foreach ($openspaces as $openspace) {


            foreach ($openspaces as $otherStreet) {
                if ($openspace->id !== $otherStreet->id) {
                    $distance = $this->haversine($openspace->latitude, $openspace->longitude, $otherStreet->latitude, $otherStreet->longitude);

                    if ($distance > 50) {
                        $explorer = '1';
                        break;
                    }
                }
            }
        }




        if ($countall > 9) {
            $citymaker = '1';
        } else {
            $citymaker = '0';
        }

        if ($countstreet > 9) {
            $flaneur = '1';
        } else {
            $flaneur = '0';
        }

        if ($countbuilding > 9) {
            $architect = '1';
        } else {
            $architect = '0';
        }

        if ($countopenspace > 9) {
            $urbanist = '1';
        } else {
            $urbanist = '0';
        }

        if ($score == 500) {
            $supermapper = '1';
        } else {
            $supermapper = '0';
        }

        if ($sumreaction > 19) {
            $star = '1';
        } else {
            $star = '0';
        }

        if ($sumcomment > 9) {
            $influencer = '1';
        } else {
            $influencer = '0';
        }

        if ($countmycomments > 9) {
            $guru = '1';
        } else {
            $guru = '0';
        }

        if ($countimage > 9) {
            $investigator = '1';
        } else {
            $investigator = '0';
        }

        // dd($citymaker);
        return view(
            'profile',
            compact(
                'name',
                'infos',
                'score',
                'citymaker',
                'flaneur',
                'architect',
                'urbanist',
                'supermapper',
                'influencer',
                'guru',
                'star',
                'investigator',
                'explorer'
            )
        );
    }

    public function saveprofile(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        $infos = Infosperso::where('user_id', $userid)->first();
        if (backpack_auth()->user()->score > 0) {
            backpack_auth()->user()->email = $request->email;
            backpack_auth()
                ->user()
                ->save();
            Infosperso::where('user_id', $userid)->update([
                'email' => $request->email,
                'age' => $request->age,
                'gender' => $request->gender,
                'profession' => $request->profession,
            ]);

            return redirect('preferences');
        } else {
            backpack_auth()->user()->email = $request->email;
            backpack_auth()
                ->user()
                ->save();
            $infos = Infosperso::where('user_id', $userid)->first();
            $infos->user_id = $userid;
            $infos->age = $request->age;
            if ($request->age != null) {
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            }
            $infos->gender = $request->gender;
            if ($request->gender != null) {
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            }
            $infos->profession = $request->profession;
            if ($request->profession != null) {
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            }
            $infos->newuser = 0;
            $infos->save();
            return redirect('preferences');
        }
    }

    public function savepreferences(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        $infos = Infosperso::where('user_id', $userid)->first();
        $infos->preferences = $request->preferences;
        $infos->save();
        if (backpack_auth()->user()->score > 3) {
        } else {
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
        }
        return redirect('/');
    }

    public function preferences()
    {
        $userid = backpack_auth()->user()->id;
        $infos = Infosperso::where('user_id', $userid)->first();
        $preferences = $infos->preferences;

        return view('preferences', compact('preferences'));
    }

    public function street()
    {
        $tags = Tag::where('category', 'street')
            ->where('personal', null)
            ->get();
        $tags_de = Tag_de::where('category', 'street')
            ->where('personal', null)
            ->get();

        return view('street_mapping', compact('tags', 'tags_de'));
    }

    public function building()
    {
        $tags = Tag::where('category', 'building')
            ->where('personal', null)
            ->get();
        $tags_de = Tag_de::where('category', 'building')
            ->where('personal', null)
            ->get();

        return view('building_mapping', compact('tags', 'tags_de'));
    }

    public function openspace()
    {
        $tags = Tag::where('category', 'openspace')
            ->where('personal', null)
            ->get();
        $tags_de = Tag_de::where('category', 'openspace')
            ->where('personal', null)
            ->get();

        return view('openspace_mapping', compact('tags', 'tags_de'));
    }

    public function newtag(Request $request)
    {
        $locale = session()->get('locale');
        if ($locale == 'en') {
            $stag = Tag::where('name', $request->name)->first();
            if ($stag) {
                return $request->name;
            } else {
                $tag = new Tag();
            }
        } elseif ($locale == 'de') {
            $stag = Tag_de::where('name', $request->name)->first();
            if ($stag) {
                return $request->name;
            } else {
                $tag = new Tag_de();
            }
        } else {
            $stag = Tag::where('name', $request->name)->first();
            if ($stag) {
                return $request->name;
            } else {
                $tag = new Tag();
            }
        }

        $tag->name = $request->name;
        $tag->personal = 1;
        $tag->category = $request->category;
        $tag->save();
        return $request->name;
    }

    public function newopinion(Request $request)
    {
        $locale = session()->get('locale');
        if ($locale == 'en') {
            $stag = Opinion::where('name', $request->name)->first();
            if ($stag) {
                return $request->name;
            } else {
                $opinion = new Opinion();
            }
        } elseif ($locale == 'de') {
            $stag = Opinion_de::where('name', $request->name)->first();
            if ($stag) {
                return $request->name;
            } else {
                $opinion = new Opinion_de();
            }
        } else {
            $stag = Opinion::where('name', $request->name)->first();
            if ($stag) {
                return $request->name;
            } else {
                $opinion = new Opinion();
            }
        }
        $opinion->name = $request->name;
        $opinion->personal = 1;
        $opinion->save();
        return $request->name;
    }

    public function newplace(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        if ($request->type == 'Street') {
            $street = new Street();
            $street->name = $request->name;
            $street->user_id = $userid;
            $street->type = 'Street';
            if ($request->latitude && $request->longitude != null) {
                $street->latitude = $request->latitude;
                $street->longitude = $request->longitude;
            } else {
                $street->latitude = 0;
                $street->longitude = 0;
            }
            //convert array tags to string
            if ($request->tags == null) {
                $street->tags = null;
            } else {
                $tags = $request->tags;
                $street->tags = implode(',', $tags);
            }

            //add 1 point for each tag
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
            $street->save();
            //return the id after saving
            $streetid = $street->id;
            return $streetid . '&type=street';
        } elseif ($request->type == 'Building') {
            $building = new Building();
            $building->name = $request->name;
            $building->user_id = $userid;
            $building->type = 'Building';
            if ($request->latitude && $request->longitude != null) {
                $building->latitude = $request->latitude;
                $building->longitude = $request->longitude;
            } else {
                $building->latitude = 0;
                $building->longitude = 0;
            }
            $tags = $request->tags;
            $building->tags = implode(',', $tags);
            if ($request->tags == null) {
                $building->tags = null;
            } else {
                $tags = $request->tags;
                $building->tags = implode(',', $tags);
            }

            //add 1 point for each tag
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
            $building->save();
            //return the id after saving
            $buildingid = $building->id;
            return $buildingid . '&type=building';
        } elseif ($request->type == 'Openspace') {
            $openspace = new Openspace();
            $openspace->name = $request->name;
            $openspace->user_id = $userid;
            $openspace->type = 'Openspace';
            if ($request->latitude && $request->longitude != null) {
                $openspace->latitude = $request->latitude;
                $openspace->longitude = $request->longitude;
            } else {
                $openspace->latitude = 0;
                $openspace->longitude = 0;
            }
            $tags = $request->tags;
            $openspace->tags = implode(',', $tags);
            if ($request->tags == null) {
                $openspace->tags = null;
            } else {
                $tags = $request->tags;
                $openspace->tags = implode(',', $tags);
            }

            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
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
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
            return $request->placeid . '&type=street';
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $opinions = $request->opinions;
            $building->opinions = implode(',', $opinions);
            $building->save();
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
            return $request->placeid . '&type=building';
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $opinions = $request->opinions;
            $openspace->opinions = implode(',', $opinions);
            $openspace->save();
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
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
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->id);
            $building->feeling = $request->feeling;
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->id);
            $openspace->feeling = $request->feeling;
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
            $openspace->save();
        }
        return $placeid;
    }

    static function allopinions()
    {
        $locale = session()->get('locale');
        if ($locale == 'en') {
            $opinions = Opinion::where('personal', null)->get();
        } elseif ($locale == 'de') {
            $opinions = Opinion_de::where('personal', null)->get();
        } else {
            $opinions = Opinion::where('personal', null)->get();
        }

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

        backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
        backpack_auth()
            ->user()
            ->save();

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
        $infos = Infosperso::where('user_id', $userid)->first();
        $score = backpack_auth()->user()->score;


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
        if ($userid) {
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
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->save();
                }
                if ($request->description != null) {
                    $street->description = $request->description;
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 1;
                    backpack_auth()
                        ->user()
                        ->save();
                }
                backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
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
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->save();
                }
                if ($request->description != null) {
                    $building->description = $request->description;
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 1;
                    backpack_auth()
                        ->user()
                        ->save();
                }
                backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
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
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->save();
                }
                if ($request->description != null) {
                    $openspace->description = $request->description;
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 1;
                    backpack_auth()
                        ->user()
                        ->save();
                }
                backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
                $openspace->save();
            }
        }

        $placeid = $request->placeid;
        $type = $request->type;
        session()->put('placeid', $placeid);
        session()->put('type', $type);

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
                $street->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 5;
                backpack_auth()
                    ->user()
                    ->save();
            }
            if ($request->description2 != null) {
                $street->description2 = $request->description2;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            }
            $street->change = $request->change;
            $street->save();
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
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
                $building->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 5;
                backpack_auth()
                    ->user()
                    ->save();
            }

            if ($request->description2 != null) {
                $building->description2 = $request->description2;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            }
            $building->change = $request->change;
            $building->save();
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
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
                $openspace->save();
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 5;
                backpack_auth()
                    ->user()
                    ->save();
            }
            if ($request->description2 != null) {
                $openspace->description2 = $request->description2;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
            }
            $openspace->change = $request->change;
            $openspace->save();
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
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
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $building->confort = $request->level;
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $openspace->confort = $request->level;
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
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
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->rest_text = $request->text;
                }
                $street->save();
            }
            if ($request->action == 'movement') {
                $street->movement = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->movement_text = $request->text;
                }
                $street->save();
            }
            if ($request->action == 'activities') {
                $street->activities = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->activities_text = $request->text;
                }
                $street->save();
            }
            if ($request->action == 'orientation') {
                $street->orientation = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->orientation_text = $request->text;
                }

                $street->save();
            }
            if ($request->action == 'weather') {
                $street->weather = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->weather_text = $request->text;
                }
                $street->save();
            }
            if ($request->action == 'facilities') {
                $street->facilities = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->facilities_text = $request->text;
                }
                $street->save();
            }
            if ($request->action == 'noise') {
                $street->noise = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->noise_text = $request->text;
                }
                $street->save();
            }
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            if ($request->action == 'rest') {
                $building->rest = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->rest_text = $request->text;
                }
                $building->save();
            }
            if ($request->action == 'movement') {
                $building->movement = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->movement_text = $request->text;
                }
                $building->save();
            }
            if ($request->action == 'activities') {
                $building->activities = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->activities_text = $request->text;
                }
                $building->save();
            }
            if ($request->action == 'orientation') {
                $building->orientation = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->orientation_text = $request->text;
                }
                $building->save();
            }
            if ($request->action == 'weather') {
                $building->weather = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->weather_text = $request->text;
                }
                $building->save();
            }
            if ($request->action == 'facilities') {
                $building->facilities = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->facilities_text = $request->text;
                }

                $building->save();
            }
            if ($request->action == 'noise') {
                $building->noise = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->noise_text = $request->text;
                }

                $building->save();
            }
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            if ($request->action == 'rest') {
                $openspace->rest = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->rest_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'movement') {
                $openspace->movement = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->movement_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'activities') {
                $openspace->activities = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->activities_text = $request->text;
                }
                $openspace->save();
            }
            if ($request->action == 'orientation') {
                $openspace->orientation = $request->value;

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->orientation_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'weather') {
                $openspace->weather = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->weather_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'noise') {
                $openspace->noise = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->noise_text = $request->text;
                }

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
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $building->enjoyable = $request->enjoyable;
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $openspace->enjoyable = $request->enjoyable;
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
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
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->talking_text = $request->text;
                }
                $street->save();
            }
            if ($request->action == 'cleanliness') {
                $street->cleanliness = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->cleanliness_text = $request->text;
                }
                $street->save();
            }
            if ($request->action == 'plants') {
                $street->plants = $request->value;

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->plants_text = $request->text;
                }
                $street->save();
            }
            if ($request->action == 'sunlight') {
                $street->sunlight = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->sunlight_text = $request->text;
                }
                $street->save();
            }
            if ($request->action == 'interesting') {
                $street->interesting = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->interesting_text = $request->text;
                }
                $street->save();
            }
            if ($request->action == 'shade') {
                $street->shade = $request->value;

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->shade_text = $request->text;
                }
                $street->save();
            }
            if ($request->action == 'beauty') {
                $street->beauty = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->beauty_text = $request->text;
                }
                $street->save();
            }
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            if ($request->action == 'talking') {
                $building->talking = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->talking_text = $request->text;
                }
                $building->save();
            }
            if ($request->action == 'cleanliness') {
                $building->cleanliness = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->cleanliness_text = $request->text;
                }

                $building->save();
            }
            if ($request->action == 'plants') {
                $building->plants = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->plants_text = $request->text;
                }
                $building->save();
            }
            if ($request->action == 'sunlight') {
                $building->sunlight = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->sunlight_text = $request->text;
                }

                $building->save();
            }
            if ($request->action == 'interesting') {
                $building->interesting = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->interesting_text = $request->text;
                }

                $building->save();
            }
            if ($request->action == 'shade') {
                $building->shade = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->shade_text = $request->text;
                }

                $building->save();
            }
            if ($request->action == 'beauty') {
                $building->beauty = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->beauty_text = $request->text;
                }

                $building->save();
            }
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            if ($request->action == 'talking') {
                $openspace->talking = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->talking_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'cleanliness') {
                $openspace->cleanliness = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->cleanliness_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'plants') {
                $openspace->plants = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->plants_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'sunlight') {
                $openspace->sunlight = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->sunlight_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'interesting') {
                $openspace->interesting = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->interesting_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'shade') {
                $openspace->shade = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->shade_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'beauty') {
                $openspace->beauty = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->beauty_text = $request->text;
                }
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
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
            $street->save();
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            $building->protected = $request->protected;
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
            $building->save();
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            $openspace->protected = $request->protected;
            backpack_auth()->user()->score = backpack_auth()->user()->score + 1;
            backpack_auth()
                ->user()
                ->save();
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
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->protection_text = $request->text;
                }

                $street->save();
            }
            if ($request->action == 'polluants') {
                $street->polluants = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->polluants_text = $request->text;
                }

                $street->save();
            }
            if ($request->action == 'night') {
                $street->night = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->night_text = $request->text;
                }

                $street->save();
            }
            if ($request->action == 'hazards') {
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->hazards = $request->text;
                }

                $street->save();
            }
            if ($request->action == 'dangerous') {
                $street->dangerous = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->dangerous_text = $request->text;
                }

                $street->save();
            }
            if ($request->action == 'protection_harm') {
                $street->protection_harm = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->protection_harm_text = $request->text;
                }

                $street->save();
            }
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            if ($request->action == 'protection') {
                $building->protection = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->protection_text = $request->text;
                }

                $building->save();
            }
            if ($request->action == 'polluants') {
                $building->polluants = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->polluants_text = $request->text;
                }

                $building->save();
            }
            if ($request->action == 'night') {
                $building->night = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->night_text = $request->text;
                }

                $building->save();
            }
            if ($request->action == 'hazards') {
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->hazards = $request->text;
                }
                $building->save();
            }
            if ($request->action == 'dangerous') {
                $building->dangerous = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->dangerous_text = $request->text;
                }

                $building->save();
            }
            if ($request->action == 'protection_harm') {
                $building->protection_harm = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->protection_harm_text = $request->text;
                }

                $building->save();
            }
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            if ($request->action == 'protection') {
                $openspace->protection = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->protection_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'polluants') {
                $openspace->polluants = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->polluants_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'night') {
                $openspace->night = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->night_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'hazards') {
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->hazards = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'dangerous') {
                $openspace->dangerous = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->dangerous_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'protection_harm') {
                $openspace->protection_harm = $request->value;
                backpack_auth()->user()->score =
                    backpack_auth()->user()->score + 1;
                backpack_auth()
                    ->user()
                    ->save();

                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->protection_harm_text = $request->text;
                }

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
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->spend_time_text = $request->text;
                }

                $street->save();
            }
            if ($request->action == 'meeting') {
                $street->meeting = $request->value;
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->meeting_text = $request->text;
                }

                $street->save();
            }
            if ($request->action == 'events') {
                $street->events = $request->value;
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 1;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->events_text = $request->text;
                }

                $street->save();
            }

            if ($request->action == 'multifunctional') {
                $street->multifunctional = $request->value;
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $street->multifunctional_text = $request->text;
                }

                $street->save();
            }
        } elseif ($request->type == 'building') {
            $building = Building::find($request->placeid);
            if ($request->action == 'spend_time') {
                $building->spend_time = $request->value;
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 1;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->spend_time_text = $request->text;
                }

                $building->save();
            }
            if ($request->action == 'meeting') {
                $building->meeting = $request->value;
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->meeting_text = $request->text;
                }

                $building->save();
            }
            if ($request->action == 'events') {
                $building->events = $request->value;
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 1;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->events_text = $request->text;
                }

                $building->save();
            }
            if ($request->action == 'multifunctional') {
                $building->multifunctional = $request->value;
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $building->multifunctional_text = $request->text;
                }

                $building->save();
            }
        } elseif ($request->type == 'openspace') {
            $openspace = Openspace::find($request->placeid);
            if ($request->action == 'spend_time') {
                $openspace->spend_time = $request->value;
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 1;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->spend_time_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'meeting') {
                $openspace->meeting = $request->value;
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->meeting_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'events') {
                $openspace->events = $request->value;
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 1;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->meeting_text = $request->text;
                }

                $openspace->save();
            }
            if ($request->action == 'multifunctional') {
                $openspace->multifunctional = $request->value;
                if ($request->text != null) {
                    backpack_auth()->user()->score =
                        backpack_auth()->user()->score + 5;
                    backpack_auth()
                        ->user()
                        ->save();
                    $openspace->multifunctional_text = $request->text;
                }

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
        $locale = session()->get('locale');
        if ($locale == 'en') {
            $spacetags = Space_tag::where('personal', null)->get();
        } elseif ($locale == 'de') {
            $spacetags = Space_tag_de::where('personal', null)->get();
        } else {
            $spacetags = Space_tag::where('personal', null)->get();
        }
        return $spacetags;
    }

    public function newspacetag(Request $request)
    {
        $locale = session()->get('locale');
        if ($locale == 'en') {
            $spacetag = new Space_tag();
        } elseif ($locale == 'de') {
            $spacetag = new Space_tag_de();
        } else {
            $spacetag = new Space_tag();
        }
        //check if the tag already exists
        $stag = Space_tag::where('name', $request->name)->first();
        if ($stag) {
            return 'exists';
        } else {
            $spacetag->name = $request->name;
            $spacetag->personal = 1;
            $spacetag->save();
            return $request->name;
        }
    }

    public function place(Request $request)
    {
        $type = strtolower($request->type);
        $placeid = $request->id;
        if ($request->type == 'street') {
            $data = Street::find($request->id);
            return view('place', compact('data', 'type', 'placeid'));
        }
        if ($request->type == 'building') {
            $data = Building::find($request->id);
            return view('place', compact('data', 'type', 'placeid'));
        }
        if ($request->type == 'openspace') {
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

    static function pages()
    {
        $pages = Pages::all();
        return $pages;
    }

    static function allusers()
    {
        $users = User::all();
        return $users;
    }

    static function infosperso()
    {
        $infos = Infosperso::all();
        return $infos;
    }

    static function myprofile()
    {
        $userid = backpack_auth()->user()->id;
        $infos = Infosperso::where('user_id', $userid)->first();
        return $infos;
    }

    public function details(Request $request)
    {
        $type = strtolower($request->type);
        $placeid = $request->id;
        if ($type == 'street') {
            $data = Street::find($request->id);
            return view('details', compact('data', 'type', 'placeid'));
        }
        if ($type == 'building') {
            $data = Building::find($request->id);
            return view('details', compact('data', 'type', 'placeid'));
        }
        if ($type == 'openspace') {
            $data = Openspace::find($request->id);
            return view('details', compact('data', 'type', 'placeid'));
        }
    }

    public function edit(Request $request)
    {
        //dd($request->all());
        $street = Street::all();
        $building = Building::all();
        $openspace = Openspace::all();

        $all_data = array_merge(
            $street->toArray(),
            $building->toArray(),
            $openspace->toArray()
        );

        if ($request->type == 'street') {
            Street::where('id', $request->placeid)->update([
                'description' => $request->description,
                'change' => $request->change,
                'description2' => $request->description2,
                'confort' => $request->confort,
                'rest' => $request->rest,
                'rest_text' => $request->rest_text,
                'movement' => $request->movement,
                'movement_text' => $request->movement_text,
                'activities' => $request->activities,
                'activities_text' => $request->activities_text,
                'orientation' => $request->orientation,
                'orientation_text' => $request->orientation_text,
                'weather' => $request->weather,
                'weather_text' => $request->weather_text,
                'facilities' => $request->facilities,
                'facilities_text' => $request->facilities_text,
                'noise' => $request->noise,
                'noise_text' => $request->noise_text,
                'enjoyable' => $request->enjoyable,
                'cleanliness' => $request->cleanliness,
                'cleanliness_text' => $request->cleanliness_text,
                'plants' => $request->plants,
                'plants_text' => $request->plants_text,
                'sunlight' => $request->sunlight,
                'sunlight_text' => $request->sunlight_text,
                'shade' => $request->shade,
                'shade_text' => $request->shade_text,
                'talking' => $request->talking,
                'talking_text' => $request->talking_text,
                'interesting' => $request->interesting,
                'interesting_text' => $request->interesting_text,
                'beauty' => $request->beauty,
                'beauty_text' => $request->beauty_text,
                'protected' => $request->protected,
                'protection' => $request->protection,
                'protection_text' => $request->protection_text,
                'polluants' => $request->polluants,
                'polluants_text' => $request->polluants_text,
                'night' => $request->night,
                'night_text' => $request->night_text,
                'hazards' => $request->hazards,
                'dangerous' => $request->dangerous,
                'dangerous_text' => $request->dangerous_text,
                'protection_harm' => $request->protection_harm,
                'protection_harm_text' => $request->protection_harm_text,
                'spaceusage' => $request->spaceusage,
                'spend_time' => $request->spend_time,
                'spend_time_text' => $request->spend_time_text,
                'meeting' => $request->meeting,
                'meeting_text' => $request->meeting_text,
                'multifunctional' => $request->multifonctional,
                'multifunctional_text' => $request->multifonctional_text,
                'events' => $request->events,
                'events_text' => $request->events_text,
            ]);
        }
        if ($request->type == 'building') {
            Building::where('id', $request->placeid)->update([
                'description' => $request->description,
                'change' => $request->change,
                'description2' => $request->description2,
                'confort' => $request->confort,
                'rest' => $request->rest,
                'rest_text' => $request->rest_text,
                'movement' => $request->movement,
                'movement_text' => $request->movement_text,
                'activities' => $request->activities,
                'activities_text' => $request->activities_text,
                'orientation' => $request->orientation,
                'orientation_text' => $request->orientation_text,
                'weather' => $request->weather,
                'weather_text' => $request->weather_text,
                'facilities' => $request->facilities,
                'facilities_text' => $request->facilities_text,
                'noise' => $request->noise,
                'noise_text' => $request->noise_text,
                'enjoyable' => $request->enjoyable,
                'cleanliness' => $request->cleanliness,
                'cleanliness_text' => $request->cleanliness_text,
                'plants' => $request->plants,
                'plants_text' => $request->plants_text,
                'sunlight' => $request->sunlight,
                'sunlight_text' => $request->sunlight_text,
                'shade' => $request->shade,
                'shade_text' => $request->shade_text,
                'talking' => $request->talking,
                'talking_text' => $request->talking_text,
                'interesting' => $request->interesting,
                'interesting_text' => $request->interesting_text,
                'beauty' => $request->beauty,
                'beauty_text' => $request->beauty_text,
                'protected' => $request->protected,
                'protection' => $request->protection,
                'protection_text' => $request->protection_text,
                'polluants' => $request->polluants,
                'polluants_text' => $request->polluants_text,
                'night' => $request->night,
                'night_text' => $request->night_text,
                'hazards' => $request->hazards,
                'dangerous' => $request->dangerous,
                'dangerous_text' => $request->dangerous_text,
                'protection_harm' => $request->protection_harm,
                'protection_harm_text' => $request->protection_harm_text,
                'spaceusage' => $request->spaceusage,
                'spend_time' => $request->spend_time,
                'spend_time_text' => $request->spend_time_text,
                'meeting' => $request->meeting,
                'meeting_text' => $request->meeting_text,
                'multifunctional' => $request->multifonctional,
                'multifunctional_text' => $request->multifonctional_text,
                'events' => $request->events,
                'events_text' => $request->events_text,
            ]);
        }
        if ($request->type == 'openspace') {
            Openspace::where('id', $request->placeid)->update([
                'description' => $request->description,
                'change' => $request->change,
                'description2' => $request->description2,
                'confort' => $request->confort,
                'rest' => $request->rest,
                'rest_text' => $request->rest_text,
                'movement' => $request->movement,
                'movement_text' => $request->movement_text,
                'activities' => $request->activities,
                'activities_text' => $request->activities_text,
                'orientation' => $request->orientation,
                'orientation_text' => $request->orientation_text,
                'weather' => $request->weather,
                'weather_text' => $request->weather_text,
                'facilities' => $request->facilities,
                'facilities_text' => $request->facilities_text,
                'noise' => $request->noise,
                'noise_text' => $request->noise_text,
                'enjoyable' => $request->enjoyable,
                'cleanliness' => $request->cleanliness,
                'cleanliness_text' => $request->cleanliness_text,
                'plants' => $request->plants,
                'plants_text' => $request->plants_text,
                'sunlight' => $request->sunlight,
                'sunlight_text' => $request->sunlight_text,
                'shade' => $request->shade,
                'shade_text' => $request->shade_text,
                'talking' => $request->talking,
                'talking_text' => $request->talking_text,
                'interesting' => $request->interesting,
                'interesting_text' => $request->interesting_text,
                'beauty' => $request->beauty,
                'beauty_text' => $request->beauty_text,
                'protected' => $request->protected,
                'protection' => $request->protection,
                'protection_text' => $request->protection_text,
                'polluants' => $request->polluants,
                'polluants_text' => $request->polluants_text,
                'night' => $request->night,
                'night_text' => $request->night_text,
                'hazards' => $request->hazards,
                'dangerous' => $request->dangerous,
                'dangerous_text' => $request->dangerous_text,
                'protection_harm' => $request->protection_harm,
                'protection_harm_text' => $request->protection_harm_text,
                'spaceusage' => $request->spaceusage,
                'spend_time' => $request->spend_time,
                'spend_time_text' => $request->spend_time_text,
                'meeting' => $request->meeting,
                'meeting_text' => $request->meeting_text,
                'multifunctional' => $request->multifonctional,
                'multifunctional_text' => $request->multifonctional_text,
                'events' => $request->events,
                'events_text' => $request->events_text,
            ]);
        }

        return redirect()->route('dashboard');
    }



    //----------------------new code----------------------



    public function addMapPlace(Request $request, $id = null)
    {

        if ($request->add_new_place == true) {
            $newplace = Place::create([
                'name' => $request->place_name,
                'user_id' => backpack_user()->id,
            ]);
        }

        $place = PlaceDetails::where('latitude', $request->latitude)
            ->where('longitude', $request->longitude)
            ->where('user_id', backpack_auth()->user()->id)
            ->first();

        $subPlsFnd = Place::where('id', $request->place_id)->first();

        if (isset($place)) {
            if ($place->place_id != $request->place_id) {
                $place->update([
                    'place_id' => $request->place_id,
                    'place_child_id' => $request->place_child_id,
                ]);
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Place updated successfully'
                ]);
            } elseif ($place->place_child_id != $request->place_child_id) {
                $place->update([
                    'place_child_id' => $request->place_child_id,
                ]);
                return response()->json([
                    'status' => 'success',
                    'msg' => 'SubPlace updated successfully'
                ]);
            } elseif ($place->observation_id != $request->observation_id) {

                $place->update([
                    'observation_id' => $request->observation_id,
                ]);

                return response()->json([
                    'status' => 'success',
                    'msg' => 'Observation updated successfully'
                ]);
            } elseif ($place->observation_child_id != $request->observation_child_id) {

                $place->update([
                    'observation_child_id' => $request->observation_child_id,
                ]);

                return response()->json([
                    'status' => 'success',
                    'msg' => 'Observation updated successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Place alreay exist'
                ]);
            }
        } else {

            PlaceDetails::create([

                'place_id' => $request->place_id ?? $newplace->id ?? NULL,
                'place_child_id' => $request->place_child_id,
                'user_id' =>  backpack_auth()->user()->id,
                'observation_id' => $request->observation_id,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,

            ]);

            if ($request->observation_id) {
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Observation added successfully'
                ]);
            } elseif (isset($subPlsFnd)) {
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Place added successfully, You can also add obervation for this place!',
                    'subPlsId' => $subPlsFnd->id
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Place added successfully, You can also add obervation for this place!',

                ]);
            }
        }
    }


    public function addNewPlace(Request $request)
    {

        $place = Place::create([
            'name' => $request->place_name,
            'user_id' => backpack_user()->id,
        ]);

        PlaceDetails::create([
            'place_id' => $place->id,
            'user_id' =>  backpack_auth()->user()->id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,

        ]);

        return response()->json([
            'status' => 'success',
            'msg' => 'Place added successfully, You also add obervation for this place!',

        ]);
    }


    public function createNewPlace(Request $request)
    {

        $places = Place::all();
        $observations = Observation::all();

        return view('add-new-place', compact('places', 'observations'));
    }

    public function subPlace($id)
    {

        $place = Place::find($id);
        $subplaces = Place::where('parent_id', $id)->get();


        if ($subplaces->isNotEmpty()) {
            return view('sub-place', compact('subplaces', 'place'));
        } else {

            return redirect('/');
        }
    }

    public function filter()
    {

        $places = PlaceDetails::where('is_home', 1)->get();



        return view('filter', compact('places'));
    }
}

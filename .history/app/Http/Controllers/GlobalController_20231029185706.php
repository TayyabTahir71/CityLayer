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
use App\Models\PlaceLike;
use App\Models\PlaceComment;
use App\Models\Feeling;
use App\Models\PlaceDetails;
use App\Models\PlaceDetailPlace;
use App\Models\PlaceDetailObservation;
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
    public function getAll($edit_id='')
    {
        if (backpack_auth()->check()) {
            $userid = backpack_auth()->user()->id;

            // check for edit 
            if ($edit_id) {
                $checkplace = PlaceDetails::find($edit_id);
                if (!($checkplace && $checkplace->user_id == $userid)) {
                    return redirect('/');
                }
            }


            if (Infosperso::where('user_id', $userid)->exists()) {
                $infos = Infosperso::where('user_id', $userid)->first();
               
                $allPlaces = Place::where('user_id', null)
                    ->where('parent_id', NULL)
                    ->orWhere('user_id', backpack_auth()->user()->id)
                    ->get();

                // dd($allPlaces);

                $allObservations = Observation::where('user_id', null)
                    ->where('parent_id', NULL)
                    ->orWhere('user_id', backpack_auth()->user()->id)
                    ->get();



                $query = PlaceDetails::whereNotNull('latitude')->whereNotNull('longitude')
                        ->with([
                            'placeDetail',
                            'placeDetail.place',
                            'placeDetail.placeChild',
                            'observationsDetail',
                            'observationsDetail.observation',
                            'observationsDetail.observationChild',
                            'observationsDetail.feeling',
                            'user',
                            'placeComment' => function ($query) {
                                $query->where('user_id', backpack_auth()->user()->id);
                            }
                        ]);

                    if (session()->has('placeIds') && count(session('placeIds')) > 0 && session()->has('observationIds') && count(session('observationIds')) > 0) {
                        
                        $query->where(function ($query) {
                            $query->whereHas('placeDetail', function ($subQuery) {
                                $subQuery->whereIn('place_id', session('placeIds'));
                            });
                        });
                        $query->orWhere(function ($query) {
                            $query->whereHas('observationsDetail', function ($subQuery) {
                                $subQuery->whereIn('observation_id', session('observationIds'));
                            });
                        });

                    } elseif (session()->has('placeIds') && count(session('placeIds')) > 0) {
                        $query->where(function ($query) {
                            $query->whereHas('placeDetail', function ($subQuery) {
                                $subQuery->whereIn('place_id', session('placeIds'));
                            });
                        });
                    } elseif (session()->has('observationIds') && count(session('observationIds')) > 0) {
                        $query->Where(function ($query) {
                            $query->whereHas('observationsDetail', function ($subQuery) {
                                $subQuery->whereIn('observation_id', session('observationIds'));
                            });
                        });
                    }

          


                // var_dump(session('placeIds'));
                // die();
   

                $all_data = $query->get();

                dd($all_data[0]->placeComment->comment);

                $feelings = Feeling::all();

                $likedPlaces=backpack_auth()->user()->likedPlaces->pluck('place_detail_id');

                return view(
                    'home',
                    compact(
                        'infos',
                        'all_data',
                        'userid',
                        'allPlaces',
                        'allObservations',
                        'feelings',
                        'likedPlaces',
                        'edit_id'
                    )
                );
            } else {
                $infos = new Infosperso();
                $infos->user_id = $userid;
                $infos->save();
                return view('edit_profile');
            }
        } else {
            return view('index');
        }
    }

    public function community_achievements()
    {

        $usersWithTotals = User::select('*')
        ->addSelect(['total_places' => PlaceDetailPlace::selectRaw('COUNT(*)')
            ->whereIn('place_detail_id', PlaceDetails::select('id')
            ->whereColumn('user_id', 'users.id'))])
        ->addSelect(['total_observations' => PlaceDetailObservation::selectRaw('COUNT(*)')
            ->whereIn('place_detail_id', PlaceDetails::select('id')
            ->whereColumn('user_id', 'users.id'))])
        ->orderBy('score', 'desc')->paginate(10);

        return view('community_acheivements', compact('usersWithTotals'));
    }

    public function loadMore_community_achievements(Request $request)
    {
        $page = $request->get('page');

        $usersWithTotals = User::select('*')
        ->addSelect(['total_places' => PlaceDetailPlace::selectRaw('COUNT(*)')
            ->whereIn('place_detail_id', PlaceDetails::select('id')
            ->whereColumn('user_id', 'users.id'))])
        ->addSelect(['total_observations' => PlaceDetailObservation::selectRaw('COUNT(*)')
            ->whereIn('place_detail_id', PlaceDetails::select('id')
            ->whereColumn('user_id', 'users.id'))])
        ->orderBy('score', 'desc')->paginate(10, ['*'], 'page', $page);

        $html = view('item_community_acheivements', compact('usersWithTotals'))->render();

        return response()->json(['html' => $html,'hasMorePages'=>$usersWithTotals->hasMorePages()]);
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


    // public function profil()
    // {
    //     return view('home');
    // }

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
        $preferences = explode(',', $infos->preferences);
        $preferences = preg_replace('/[^A-Za-z0-9 ]/', '', $preferences);

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
                'explorer',
                'preferences'
            )
        );
    }
    public function badges_overview()
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
            'badges_overview',
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
        
        return redirect('/');
    }

    public function newpreference(Request $request)
    {

        $userid = backpack_auth()->user()->id;


       
        
        $tag=strtolower($request->preference);
        $preference=Preference::create([
            'user_id'=>$userid,
            'name'=>$tag,
        ]);
        if($preference){
            $infos = Infosperso::where('user_id', $userid)->first();
            $existingPreferences = explode(',', $infos->preferences);
            $existingPreferences = preg_replace('/[^A-Za-z0-9 ]/', '', $existingPreferences);
            $existingPreferences[]=$tag;
            $infos->preferences = $existingPreferences;
            $infos->save();
        }
        
        return redirect('/preferences');
    }

    public function preferences()
    {
        $userid = backpack_auth()->user()->id;
        $infos = Infosperso::where('user_id', $userid)->first();
       
        $preferences = explode(',', $infos->preferences);
        $preferences = preg_replace('/[^A-Za-z0-9 ]/', '', $preferences);

        $preferences_array = Preference::getPreferences($userid);


        return view('preferences', compact('preferences','preferences_array'));
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
        $placeDetails = User::with('placeDetails')->find($userid)->placeDetails()->orderBy('id', 'desc')->paginate(10);

        $score = backpack_auth()->user()->score;

  
        return view('dashboard', compact('placeDetails', 'score'));
    }
    public function loadMore_dashboard(Request $request)
    {
        $userid = backpack_auth()->user()->id;
        $page = $request->get('page');

        $placeDetails = User::with('placeDetails')->find($userid)->placeDetails()->orderBy('id', 'desc')->paginate(10, ['*'], 'page', $page);

        $html = view('item_dashboard', compact('placeDetails'))->render();

        return response()->json(['html' => $html,'hasMorePages'=>$placeDetails->hasMorePages()]);
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


    //----------------------new code----------------------


    function addNewPlaceData($postData){

        $result_array=[];
       

        if (isset($postData->place_name) && !empty($postData->place_name)) {
            $place = Place::create([
                'name' => $postData->place_name,
                'user_id' => backpack_user()->id,
            ]);
            $result_array['place_id']=$place->id;
        }
        if (isset($postData->observation_name) && !empty($postData->observation_name)) {
            $observation = Observation::create([
                'name' => $postData->observation_name,
                'user_id' => backpack_user()->id,
            ]);
            $result_array['observations'][]=array(
                'observation_id' => $observation->id,
                'child_observation_id' => NULL,
                'feeling_id' => $postData->feeling_id?$postData->feeling_id:NULL,
            );
        }
        
        return (object)$result_array;
    }

    public function addMapPlace(Request $request, $id = null)
    {

        $postData=json_decode($request->place_data,true);
        $postData = (object)$postData;
        $returnData=$this->addNewPlaceData($postData);
        $postData = (object)array_merge((array)$postData, (array)$returnData);


    //    dd($postData);

        $userId = backpack_auth()->user()->id;
        $response = ['status'=>'','msg'=>'','place_detail_id'=>'','tab'=>'','completed'=>false];

        if(isset($postData->place_detail_id) && $postData->place_detail_id!=''){
            $place_detail = PlaceDetails::find($postData->place_detail_id);
        }else{
            $latitude = $postData->latitude;
            $longitude = $postData->longitude;
            $radius = 100; // Meters
            $place_detail = PlaceDetails::selectRaw("*,
                    ( 6371 * acos( cos( radians(?) )
                    * cos( radians( latitude ) )
                    * cos( radians( longitude ) - radians(?)) + sin( radians(?) )
                    * sin( radians( latitude ) ) )) AS distance", [$latitude, $longitude, $latitude])
                    ->having("distance", "<", ($radius/1000))
                    ->where('user_id',$userId)
                    ->first();    
        }




        if (isset($place_detail)) {

            $place_detail->update([
                'user_id' =>  backpack_auth()->user()->id,
                'place_description' =>  $postData->place_description?$postData->place_description:NULL,
                'obsevation_description' =>  $postData->observation_description?$postData->observation_description:NULL,
                // 'latitude' => $postData->latitude,
                // 'longitude' => $postData->longitude,
            ]);
            
            if(isset($postData->update) && $postData->update=='place'){
                $place_detail->updatePlaces($place_detail,$postData);
            }else if(isset($postData->update) && $postData->update=='observation'){
                $place_detail->updateObservations($place_detail,$postData);
            }else{
                $place_detail->updateMethod($place_detail,$postData);
            }


            $response['status'] = 'success';
            $response['msg'] = 'data updated successfully!';
        } else {
            $place_detail=PlaceDetails::create([
                'user_id' =>  backpack_auth()->user()->id,
                'place_description' =>  $postData->place_description?$postData->place_description:NULL,
                'obsevation_description' =>  $postData->observation_description?$postData->observation_description:NULL,
                'latitude' => $postData->latitude,
                'longitude' => $postData->longitude,
            ]);

            if($postData->place_id){
                PlaceDetailPlace::create([
                    'place_detail_id' => $place_detail->id,
                    'place_id' => $postData->place_id,
                    'place_child_id' => $postData->child_place_id?$postData->child_place_id:NULL,
                ]);
            }
            
            if(isset($postData->observations) && is_array($postData->observations) && count($postData->observations)>0){
                foreach($postData->observations as $obsrv){
                    PlaceDetailObservation::create([
                        'place_detail_id' => $place_detail->id,
                        'observation_id' => $obsrv['observation_id'],
                        'observation_child_id' => $obsrv['child_observation_id']?$obsrv['child_observation_id']:NULL,
                        'feeling_id' => $obsrv['feeling_id'],
                    ]);
                }
            }
            

           
            backpack_auth()->user()->incrementScore(1);
            $response['status'] = 'success';
            $response['msg'] = 'data added successfully!';
        }

        if ($request->hasFile('place_image')) {
            $request->validate([
                'place_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);
            $imageName = time() . '_place.' . $request->place_image->extension();
            $request->place_image->storeAs('public/uploads/place/', $imageName);
            $place_detail->update([
                'place_image' =>  $imageName,
            ]);
        }

        if ($request->hasFile('observation_image')) {
            $request->validate([
                'observation_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);
            $imageName = time() . '_observation.' . $request->observation_image->extension();
            $request->observation_image->storeAs('public/uploads/observation/', $imageName);
            $place_detail->update([
                'obsevation_image' =>  $imageName,
            ]);
        }



        $response['place_detail_id'] = $place_detail->id;

        
        if((isset($place_detail->placeDetail) && $place_detail->placeDetail->id) && (isset($place_detail->observationsDetail) &&  count($place_detail->observationsDetail))>0){
            $response['completed'] = true;
        }
            
        $response['tab'] = $postData->tab;

        $response['place_id'] = $place_detail->placeDetail->place_id ?? null;

        return response()->json($response);

    }


    public function addNewPlace(Request $request)
    {

        if ($request->place_name) {
            $place = Place::create([
                'name' => $request->place_name,
                'user_id' => backpack_user()->id,
            ]);
        }

        if ($request->observation_name) {
            $observation = Observation::create([
                'name' => $request->observation_name,
                'user_id' => backpack_user()->id,
            ]);
        }


        PlaceDetails::create([
            'place_id' => $place->id ?? NULL,
            'observation_id' => $observation->id ?? NULL,
            'user_id' =>  backpack_auth()->user()->id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,

        ]);

        if ($request->observation_name) {
            return response()->json([
                'status' => 'success',
                'msg' => 'Observation added successfully, You can also add place for this place!',

            ]);
        } else {
            return response()->json([
                'status' => 'success',
                'msg' => 'Place added successfully, You also add obervation for this place!',

            ]);
        }
    }


    public function createNew($type='place')
    {
       
        
        $allPlaces = Place::where('user_id', null)
            ->where('parent_id', NULL)
            ->orWhere('user_id', backpack_auth()->user()->id)
            ->get();

      

        $allObservations = Observation::where('user_id', null)
            ->where('parent_id', NULL)
            ->orWhere('user_id', backpack_auth()->user()->id)
            ->get();
        
        $feelings = Feeling::all();

        return view('add-new-place', compact('allObservations', 'allPlaces','type','feelings'));
    }

   

    public function filter()
    {

        return view('filter');
    }


    public function saveDes(Request $request)
    {

        PlaceDetails::where('id', $request->id)
            ->update([

                'description' => $request->data

            ]);
    }
    public function saveComment(Request $request)
    {
        PlaceComment::updateOrcreate(
            [
                'place_detail_id' => $request->id,
                'user_id' => backpack_auth()->user()->id,
            ],
            [
                'comment' => $request->data,
            ]
        );
    }

    public function setLike(Request $request)
    {

        $placeLike = PlaceLike::where('place_detail_id', $request->id)
        ->where('user_id', backpack_auth()->user()->id)
        ->first();

        if ($placeLike) {
            $placeLike->delete();
        } else {
            PlaceLike::create([
                'place_detail_id' => $request->id,
                'user_id' => backpack_auth()->user()->id,
            ]);
        }
    }


    
}

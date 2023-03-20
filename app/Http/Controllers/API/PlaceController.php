<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Street;
use App\Models\Building;
use App\Models\Openspace;

class PlaceController extends Controller
{
    public function index()
    {

        $street = Street::all();
        $building = Building::all();
        $openspace = Openspace::all();

        $all_data = array_merge(
            $street->toArray(),
            $building->toArray(),
            $openspace->toArray()
        );
        
        return response()->json($all_data);

    }
}

<?php

namespace App\Http\Livewire;

use App\Models\PlaceDetails;
use App\Models\Place;
use App\Models\Observation;
use App\Models\User;
use Livewire\Component;

class Filter extends Component
{
    // public $places;

    public $selected_places = [];

    public function select_place($id)
    {
        array_push($this->selected_places, $id);
    }

    public function updateMap()
    {

        foreach ($this->selected_places as $value) {

            $data =  PlaceDetails::where('id', $value)->first();

            // dd($data);

            if ($data->is_home == 1) {
                PlaceDetails::where('id', $value)->update([
                    'is_home' => 0
                ]);
            }
            if ($data->is_home == 0) {
                PlaceDetails::where('id', $value)->update([
                    'is_home' => 1
                ]);
            }
        }

        $this->emit('success', 'Map updated successfully');
    }

    public function render()
    {
        $userid = backpack_auth()->user()->id;

        // $places = PlaceDetails::where('user_id', $userid)->where()
         
    //     $places = PlaceDetails::where('user_id', $userid)
    // ->select('place_id', 'observation_id')
    // ->distinct()
    // ->orderBy('id', 'desc')
    // ->get();

    $placeIds = PlaceDetails::where('user_id', $userid)->whereNotNull('place_id')->distinct()->pluck('place_id');
    $observationIds = PlaceDetails::where('user_id', $userid)->whereNotNull('observation_id')->distinct()->pluck('observation_id');
    

    $places = Place::whereIn('id', $placeIds)->get();
    $observations = Observation::whereIn('id', $observationIds)->get();

    $places->each(function ($place) {
        $place->source = 'place';
    });
    
    $observations->each(function ($observation) {
        $observation->source = 'observation';
    });

    $combined = $places->concat($observations);
    $sortedCombined = $combined->sortBy(function ($item) use ($placeIds, $observationIds) {
        if (in_array($item->id, $placeIds->toArray())) {
            return $placeIds->search($item->id);
        } elseif (in_array($item->id, $observationIds->toArray())) {
            return $observationIds->search($item->id);
        }
    });



    foreach($sortedCombined as $p){
        var_dump($p);
        echo '<br>';
        echo '<br>';
        echo '<br>';
    }
    

    die();


        return view('livewire.filter', compact('places'));
    }
}

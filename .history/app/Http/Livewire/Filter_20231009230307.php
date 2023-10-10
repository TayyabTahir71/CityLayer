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

    $placeDetails = PlaceDetails::where('user_id', $userid)
    ->whereIn('place_id', Place::distinct()->pluck('id')->toArray())
    ->orWhereIn('observation_id', Observation::distinct()->pluck('id')->toArray())
    ->orderBy('id', 'desc')
    ->get();
    $sortedPlaceDetails = $placeDetails->sortBy(function ($item) {
        return $item->id;
    });

    

    foreach ($sortedPlaceDetails as $placeDetail) {
        if ($placeDetail->place_id) {
            // It's a place
            echo "This is a Place: " . $placeDetail->place->name . "<br>";
        } elseif ($placeDetail->observation_id) {
            // It's an observation
            echo "This is an Observation: " . $placeDetail->observation->name . "<br>";
        }
    }
        

    die();


        return view('livewire.filter', compact('places'));
    }
}

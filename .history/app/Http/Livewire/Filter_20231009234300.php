<?php

namespace App\Http\Livewire;

use App\Models\PlaceDetails;
use App\Models\Place;
use App\Models\Observation;
use App\Models\User;
use DB;
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

        $user = User::find($userid);

        $places = PlaceDetails::where('user_id', $userid)->whereNotNull('place_id')->groupBy('place_id')->get();
        // $observations = $user->observations;

        // $combined = $places->concat($observations)->unique();

    

        foreach ($places as $key => $value) {
            var_dump($value);
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
        }


        

    die();


        return view('livewire.filter', compact('places'));
    }
}

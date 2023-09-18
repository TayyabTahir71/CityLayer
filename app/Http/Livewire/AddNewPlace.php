<?php

namespace App\Http\Livewire;

use App\Models\Observation;
use App\Models\Place;
use App\Models\PlaceDetails;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddNewPlace extends Component
{

    use WithFileUploads;

    public $place;
    public $search;
    public $observation;



    public function selected_observation($obs)
    {
        $this->observation = $obs;
    }

    public function selected_place($pls)
    {
        $this->place = $pls;
    }


    public function addPlace()
    {

        $place =  Place::create([
            'user_id' => backpack_user()->id,
            'name' => $this->place,
        ]);

        if ($this->observation) {
            $observation = Observation::create([
                'user_id' => backpack_user()->id,
                'name' => $this->observation,
            ]);

            PlaceDetails::create([
                'user_id' =>  backpack_user()->id,
                'place_id' => $place->id,
                'observation_id' => $observation->id,
            ]);
        }
    }
    public function addObservation()
    {

        $observation =  Observation::create([
            'user_id' => backpack_user()->id,
            'name' => $this->observation,
        ]);


        if ($this->place) {
            $place = Place::create([
                'user_id' => backpack_user()->id,
                'name' => $this->place,
            ]);

            PlaceDetails::create([
                'user_id' =>  backpack_user()->id,
                'place_id' => $place->id,
                'observation_id' => $observation->id,
            ]);
        }
    }




    public function render()
    {
        return view('livewire.add-new-place');
    }
}

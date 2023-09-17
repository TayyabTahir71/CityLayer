<?php

namespace App\Http\Livewire;

use App\Models\Place;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddNewPlace extends Component
{

    use WithFileUploads;

    public $place;
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

        Place::create([
            'user_id' => backpack_user()->id,
            'place' => $this->place,
            'observation' => $this->observation,
        ]);
    }
    public function addObservation()
    {

        Place::create([
            'user_id' => backpack_user()->id,
            'place' => $this->place,
            'observation' => $this->observation,
        ]);
    }




    public function render()
    {
        return view('livewire.add-new-place');
    }
}

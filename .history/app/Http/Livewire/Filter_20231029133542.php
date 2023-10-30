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
    public $formData = []; 

    public function __construct(){
        $placeIds = session('placeIds');
        $observationIds = session('observationIds');

        if(is_array($placeIds)){
            foreach($placeIds as $placeId){
                $this->formData[]='place_'.$placeId;
            }
        }
        if(is_array($observationIds)){
            foreach($observationIds as $observationId){
                $this->formData[]='observation_'.$observationId;
            }
        }
        
        
    }


    public function updateMap()
    {
        $selected_places = [
            'place'=>[],
            'observation'=>[]
        ];
        foreach($this->formData as $key=>$value){

            if (strpos($value, 'place_') === 0 && $value!=false) {
                $selected_places['place'][]=(int)str_replace('place_', '', $value);
            }elseif(strpos($value, 'observation_') === 0 && $value!=false){
                $selected_places['observation'][]=(int)str_replace('observation_', '', $value);
            }
        }
        
        session(['placeIds' => array_unique($selected_places['place']), 'observationIds' => array_unique($selected_places['observation'])]);
     

        return redirect('/');
    }

    public function render()
    {
        $userid = backpack_auth()->user()->id;

        $user = User::find($userid);

        $places = PlaceDetail::all()->map(function ($placeDetail) {
            return (object) [
                'id' => $placeDetail->place->id,
                'name' => $placeDetail->place->name,
                'source' => 'place',
            ];
        })->unique('id');

        dd($places);

        $observations = $user->placeDetails->flatMap(function ($post) {
            return $post->observationsDetail;
        })->map(function ($observation) {
            return (object)[
                'id' => $observation->observation->id,
                'name' => $observation->observation->name,
                'source' => 'observation',
            ];
        })->unique('id');

        $places = $places->concat($observations)->sortBy('name');

        $placeIds = session('placeIds');
        $observationIds = session('observationIds');

        


        return view('livewire.filter', compact('places','placeIds','observationIds'));
    }
}

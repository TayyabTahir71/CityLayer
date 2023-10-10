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

        foreach($placeIds as $placeId){
            $this->formData[]='place_'.$placeId;
        }
        foreach($observationIds as $observationId){
            $this->formData[]='observation_'.$observationId;
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
        
    }

    public function render()
    {
        $userid = backpack_auth()->user()->id;
        $placeIds = PlaceDetails::where('user_id', $userid)
            ->whereNotNull('place_id')
            ->distinct()
            ->pluck('place_id');
        $observationIds = PlaceDetails::where('user_id', $userid)
            ->whereNotNull('observation_id')
            ->distinct()
            ->pluck('observation_id');
        $places = Place::select('name','id')->whereIn('id', $placeIds)->get();
        $observations = Observation::select('name','id')->whereIn('id', $observationIds)->get();

        $places->each(function ($place) {
            $place->source = 'place';
        });
        
        $observations->each(function ($observation) {
            $observation->source = 'observation';
        });

        $combined = $places->concat($observations);
        $places = $combined->sortBy(function ($item) {
            return $item->name;
        });

        $placeIds = session('placeIds');
        $observationIds = session('observationIds');

        


        return view('livewire.filter', compact('places','placeIds','observationIds'));
    }
}

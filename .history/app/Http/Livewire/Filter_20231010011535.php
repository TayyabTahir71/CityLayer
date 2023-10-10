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

    public $selected_places = [
        'place'=>[],
        'observation'=>[]
    ];

    public function select_place($id)
    {

        $this->selected_places['place'] = session('placeIds');
        $this->selected_places['observation'] = session('observationIds');

        if (strpos($id, 'place_') === 0) {
            
            if (($key = array_search((int)str_replace('place_', '', $id), $this->selected_places['place'])) !== false) {
                unset($this->selected_places['place'][$key]);
            }
            else{
                $this->selected_places['place'][]=(int)str_replace('place_', '', $id);
            }

            
        }elseif (strpos($id, 'observation_') === 0) {
                
                if (($key = array_search((int)str_replace('observation_', '', $id), $this->selected_places['observation'])) !== false) {
                    unset($this->selected_places['observation'][$key]);
                }
                else{
                    $this->selected_places['observation'][]=(int)str_replace('observation_', '', $id);
                }
        }

        session(['placeIds' => array_unique($this->selected_places['place']), 'observationIds' => array_unique($this->selected_places['observation'])]);


    }

    public function updateMap()
    {

     
        dd($this->selected_places);
        // $placeArray = [];
        // $observationArray = [];

        // foreach ($this->selected_places as $item) {
        //     if (strpos($item, 'place_') === 0) {
        //         $placeArray[] = (int)str_replace('place_', '', $item);
        //     } elseif (strpos($item, 'observation_') === 0) {
        //         $observationArray[] = (int)str_replace('observation_', '', $item);
        //     }
        // }

        

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

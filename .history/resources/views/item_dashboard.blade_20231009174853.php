@forelse ($placeDetails as $data)

                    <div class="flex p-2 mt-8 mb-2 items-center justify-between">
                        <div class="flex items-center">
                            <div class="h-20 w-20 rounded-full bg-[#ffa500] flex flex-row items-center justify-center text-center">
                                
                                @if($data->place_id):
                                    <img  src="{{asset('img/street.png')}}" class="h-10" alt=""/>
                                @elseif($data->observation_id):
                                    <img  src="{{asset('img/worried.png')}}" class="h-8" alt=""/>
                                    <img  src="{{asset('img/pleasant.png')}}" class="h-8" alt=""/>
                                @endif
                                
                                
                            </div>
                            <h2 class="pl-2 italic text-base">Place A</h2>
                        </div>
                        <div class="">

                            <div class="parts bg-site">
                                Edit
                            </div>
                        </div>
                    </div>

        

                    
            
                @endforeach
                
                foreach($placeDetails as $data){

                    if($data->place_id){
                        var_dump($data->place->name);
                    }elseif($data->observation_id){
                        var_dump($data->observation->name);
                    }
                    
                }
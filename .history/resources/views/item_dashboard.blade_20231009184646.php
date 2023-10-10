@foreach ($placeDetails as $data)

                    <div class="flex p-2 mt-8 mb-2 items-center justify-between">
                        <div class="flex items-center">
                            <div class="h-20 w-20 rounded-full bg-[#ffa500] flex flex-row items-center justify-center text-center">
                                
                                @if($data->place_id)
                                    <img  src="{{asset('img/street.png')}}" class="h-10" alt=""/>
                                @elseif($data->observation_id)
                                    <img  src="{{asset('img/worried.png')}}" class="h-8" alt=""/>
                                    <img  src="{{asset('img/pleasant.png')}}" class="h-8" alt=""/>
                                @endif
                                
        
                            </div>
                            
                            @if($data->place_id)
                                <h2 class="pl-2 italic text-base">{{$data->place->name}}</h2>
                            @elseif($data->observation_id)
                                <h2 class="pl-2 italic text-base">{{$data->observation->name}}</h2>
                            @endif
                        </div>
                        <div class="">

                            <div class="parts bg-site">
                                Edit
                            </div>
                        </div>
                    </div>
                @endforeach

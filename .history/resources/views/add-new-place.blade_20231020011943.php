@php
    $locale = session()->get('locale');
    if ($locale == null) {
        $locale = 'en';
    }
@endphp
@extends('layouts.app')

@section('main')
    <div  class="p-6 lg:p-12">
        <a href="/" class="">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>


        <div class="relative pt-20" x-cloak x-data="{placeTitle:'Add new place',placeInput:'Enter a new place', tab: '{{$type}}',placeSubtab:'',observationSubtab:'',active:'',showMore: false,searchQueryPlace: '',searchQueryObservation:'' }">
            <div class="flex items-center justify-center">
                <div class="-mr-1 cursor-pointer" @click="tab='place'">
                    <div class="flex flex-col w-[84px] justify-center items-center">
                        <div class="bg-[#2d9bf0] border-2 border-white rounded-full"
                            :class="tab == 'place' ?
                                'bg-[#2d9bf0] z-10 p-[26px] placeTabActive' :
                                'bg-[#2d9bf0]/70 p-[40px]'">
                            <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7"
                                :class="tab == 'place' ? 'block' : 'hidden'"
                                id="place" alt="">
                        </div>
                        
                    </div>
                </div>
                <div class="-ml-1 cursor-pointer" @click="tab='observation'">
                    <div class="flex flex-col w-[75px] justify-center items-center">

                        <div class="flex items-center justify-center border-2 border-white rounded-full"
                            :class="tab == 'observation' || tab == 'observation1' ?
                                'bg-[#ffa726] z-10 p-[20px] observationTabActive' :
                                'bg-[#ffa726]/70 p-[40px]'">
                            <div class="flex items-center justify-center w-10 h-10 text-2xl"
                                :class="tab == 'observation' || tab == 'observation1' ? 'block' :
                                    'hidden'"
                                id="observation" alt="">🔍</div>
                        </div>

                    </div>
                </div>
            </div>



            <div class="flex flex-col items-center justify-center" x-show="tab=='place'">
                
                <div class="flex flex-col items-center justify-center w-full mt-12 mb-12">
                    <input type="text" :placeholder="placeInput" 
                    x-model="placeSubtab === 'addplace' ? searchQueryPlace : null"
                    name="place_name" class="w-full px-4 py-2 bg-white rounded-full">
                    <div id="errorTxtP" class="text-red-500"></div>
                    <div class="mt-3 italic font-normal" x-text="placeTitle"></div>
                    
                </div>

                <div class="grid grid-cols-4 italic font-semibold gap-10" x-show="placeSubtab=='addplace'">
                    <div x-show="!showMore" class="cursor-pointer">
                        <button @click="showMore = true; height = '100vh'">
                            <div class="rounded-full border-site border-4 p-[22px] bg-site">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="#ffff"
                                    class="w-6 h-6 font-bold color-site">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                            </div>
                            <div class="mt-4 text-black font-bold">Add new</div>
                        </button>
                    </div>

                    @foreach($allPlaces as $key=>$place)
                    <div 
                    x-show="(showMore || {{ $key }} < 2) && (searchQueryPlace === '' || '{{ strtolower($place->name) }}'.includes(searchQueryPlace.toLowerCase()))"
                
                    class="flex flex-col items-center cursor-pointer"
                        @click="active='PL_{{ $place->id }}'">
                        <div data-place="{{ json_encode(['id'=>$place->id,'name'=>$place->name,'child'=>$place->subplaces]) }}" class="w-[76px] h-[76px] rounded-full bg-[#2d9bf0]"
                            :class="active == 'PL_{{ $place->id }}' ? 'border-4 border-blue-300 placeActive' : ''">
                            <div class="flex align-item-center justify-center items-center h-full">
                            <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7" />
                            </div>
                        </div>
                        <span class="mt-4 text-black font-normal">{{ $place->name }}</span>
                    </div>
                    @endforeach
                    <div x-show="!showMore" class="cursor-pointer">
                        <button @click="showMore = true; height = '100vh'">
                            <div class="rounded-full border-site border-4 p-[22px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                    class="w-6 h-6 font-bold color-site">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                            </div>
                            <div class="mt-4 text-black font-normal">See more</div>
                        </button>
                    </div>
                </div>


                <div class="flex items-center justify-between w-2/3 pt-28 pb-16 font-semibold">
                    <label class="flex flex-col items-center gap-1 cursor-pointer" for="image-upload">
                        <input id="image-upload" type="file" class="hidden place_image" accept=".jpg, .png">
                        <img src="{{ asset('img/cam-2.PNG') }}" alt="" class="w-10 h-9">
                        <div class="text-sm">Upload image</div>
                    </label>

                    <div class="relative" x-data="{ placeText: false }">
                        <div @click="placeText = !placeText" class="flex flex-col items-center gap-1 cursor-pointer">
                            <img src="{{ asset('img/msg.PNG') }}" alt="" class="w-10 h-9">
                            <div class="text-sm">Add description</div>
                        </div>
                        <textarea class="font-normal place_description absolute px-2 py-2 bg-white rounded-xl w-[300px] right-0" x-show="placeText"></textarea>
                    </div>
                    
                </div>

            </div>

            <div class="flex flex-col items-center justify-center" x-show="tab=='observation'">
                
                
                <div class="flex flex-col items-center justify-center w-full mt-12 mb-12">
                    <input type="text" name="observation_name" x-model="searchQueryObservation" class="w-full px-4 py-2 bg-white rounded-full">
                    <div id="errorTxtP" class="text-red-500"></div>
                    <div class="mt-3 italic font-normal">Choose tags or add a new observation</div>
                </div>

                <div class="grid grid-cols-4 italic font-semibold gap-10">
                    <div x-show="!showMore" class="cursor-pointer">
                        <button @click="showMore = true; height = '100vh'">
                            <div class="rounded-full border-site border-4 p-[22px] bg-site">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="#ffff"
                                    class="w-6 h-6 font-bold color-site">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                            </div>
                            <div class="mt-4 text-black font-bold">Add new</div>
                        </button>
                    </div>
                    @foreach($allObservations as $key => $observation)
                        <div
                            x-data="{ active: false }"
                            x-show="(showMore || {{ $key }} < 2) && (searchQueryObservation === '' || '{{ strtolower($observation->name) }}'.includes(searchQueryObservation.toLowerCase()))"
                            class="flex flex-col items-center cursor-pointer"
                            @click="active = !active ? 'OB_{{ $observation->id }}' : false"
                        >
                            <div
                                data-observations="{{ json_encode(['id'=>$observation->id,'name'=>$observation->name,'child'=>$observation->subobservs]) }}"
                                class="w-[76px] h-[76px] rounded-full bg-[#ffa726]"
                                :class="active == 'OB_{{ $observation->id }}' ? 'border-4 border-blue-300 observationActive' : ''"
                            >
                                <div class="flex align-item-center justify-center items-center h-full">
                                    <img src="{{ asset('new_img/sad.png') }}" alt="" class="w-8 h-8 -mr-1">
                                    <img src="{{ asset('new_img/happy.png') }}" alt="" class="w-8 h-8 -ml-1">
                                </div>
                            </div>
                            <span class="mt-4 text-black font-normal">{{ $observation->name }}</span>
                        </div>
                    @endforeach


                
                    <div x-show="!showMore" class="flex flex-col items-center justify-center cursor-pointer">
                        <button @click="showMore = true; height = '100vh'" type="button">
                            <div class="rounded-full border-[#ffa726] border-4  p-[22px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                    class="w-6 h-6 font-bold text-[#ffa726]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m6-6H6" />
                                </svg>

                            </div>
                            <div class="mt-4 text-black font-normal">See more</div>
                        </button>

                    </div>
                
                </div>


            </div>

        
            <div class="fixed left-0 right-0 bg-white py-4 bottom-0 z-[100]">
                <div class="flex items-center justify-center gap-6">
                    <a href="/" class="flex cursor-pointer items-center justify-center border-2 border-site gap-2 px-8 py-3 text-lg font-extrabold color-site bg-white rounded-3xl transition-all">
                        Close
                    </a>

                    <div class="submitDataAll flex cursor-pointer items-center border-2 border-site justify-center gap-2 px-8 py-3 text-lg font-extrabold text-white bg-[#2d9bf0] rounded-3xl  hover:bg-[#268ede] transition-all">
                        Submit
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
<script>
        let place_data = {
            place_name:'',
            place_id: '',
            child_place_id: '',
            observation_name: '',
            observations: '',
            place_description: '',
            observation_description: '',
            latitude: '',
            longitude: '',
            tab: '{{$type}}',
        };
        
        if (navigator.geolocation) {
            getposition();
        } else {
            alert("Geolocation is not supported by this browser.");
        }
        function getposition(success, fail) {
            if (navigator && navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(pos) {
                        place_data['latitude']=pos.coords.latitude;
                        place_data['longitude']=pos.coords.longitude;
                    }
                );
            }
        }

        console.log(place_data);

        $('body').on('click', '.submitData', function() {
            



        });
</script>


@endsection


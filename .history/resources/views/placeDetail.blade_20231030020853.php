@extends('layouts.app')

@section('main')

@php
// dd($placeSignle->placeDetail);
$placename = ($placeSignle && $placeSignle->placeDetail->place) ? $placeSignle->placeDetail->place->name : '';
$placename.= ($placeSignle && $placeSignle->placeDetail->placeChild) ? ' → ' . $placeSignle->placeDetail->placeChild->name : '';
if(empty($placename)){
    $placename='No Place';
}

$observationList=[];
foreach ($placeSignle->observationsDetail as $observation) {
    
}

@endphp
    <div data-barba="container" class="p-6 lg:p-12">
        <a href="/dashboard">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>
        

        <div class="grid grid-cols-1">
            <div class="p-3 mx-4 space-y-4">
                
                <h1 class="text-2xl font-semibold text-center text-gray-900">{{$placename}}</h1>

                <legend class="pt-4 mb-1 text-xl font-medium text-center border-t">Location</legend>
                <div class="flex justify-center pb-4 text-sm md:w-4xl">
                    <a class="px-4 mx-1 text-white truncate bg-blue-800 rounded" target="_blank">{{$placeSignle->latitude}}</a>
                    <a class="px-4 mx-1 text-white truncate bg-blue-800 rounded" target="_blank">{{$placeSignle->longitude}}</a>

                </div>
                <legend class="pt-4 mb-1 text-xl font-medium text-center border-t">Observations</legend>
                <div>

                    <div class="grid grid-cols italic font-semibold gap-10 subObservationItems mt-12"><div data-observation_id="1"><div class="mb-4">Protection</div>
                            <div data-subobservation_id="27" class="flex gap-2 lg:gap-20 items-center justify-between mb-10">
                                <div class="flex flex-col items-center w-[160px]">
                                    <div class="w-[76px] h-[76px] rounded-full bg-[#ffa726]">
                                        <div class="flex align-item-center justify-center items-center h-full">
                                            <img src="http://127.0.0.1:8000/new_img/sad.png" alt="" class="w-8 h-8 -mr-1"> <img src="http://127.0.0.1:8000/new_img/happy.png" alt="" class="w-8 h-8 -ml-1">
                                        </div>
                                    </div>
                                    <span class="mt-1 text-black font-normal text-base">Protection from traffic</span>
                                </div>

                                
                                <div x-data="{ feelActive1: 'feel_1_1' }" class="flex flex-wrap items-center justify-center gap-2 italic font-semibold w-full ">
                                                                            <div data-feeling_id="1" @click="feelActive1='feel_1_1'" class="feel_1_27_1 cursor-pointer rounded-full border-4 border-blue-300 feelingActive" :class="feelActive1 == 'feel_1_1' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/comfortable.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="2" @click="feelActive1='feel_1_2'" class="feel_1_27_2 cursor-pointer rounded-full" :class="feelActive1 == 'feel_1_2' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/confused.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="3" @click="feelActive1='feel_1_3'" class="feel_1_27_3 cursor-pointer rounded-full" :class="feelActive1 == 'feel_1_3' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/sad.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="4" @click="feelActive1='feel_1_4'" class="feel_1_27_4 cursor-pointer rounded-full" :class="feelActive1 == 'feel_1_4' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/happy.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="5" @click="feelActive1='feel_1_5'" class="feel_1_27_5 cursor-pointer rounded-full" :class="feelActive1 == 'feel_1_5' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/disgusted.png" alt="">
                                        </div>
                                                                    </div>
                    
                            </div>
                            <div data-subobservation_id="28" class="flex gap-2 lg:gap-20 items-center justify-between mb-10">
                                <div class="flex flex-col items-center w-[160px]">
                                    <div class="w-[76px] h-[76px] rounded-full bg-[#ffa726]">
                                        <div class="flex align-item-center justify-center items-center h-full">
                                            <img src="http://127.0.0.1:8000/new_img/sad.png" alt="" class="w-8 h-8 -mr-1"> <img src="http://127.0.0.1:8000/new_img/happy.png" alt="" class="w-8 h-8 -ml-1">
                                        </div>
                                    </div>
                                    <span class="mt-1 text-black font-normal text-base">Protection from harm</span>
                                </div>

                                
                                <div x-data="{ feelActive1: 'feel_1_1' }" class="flex flex-wrap items-center justify-center gap-2 italic font-semibold w-full ">
                                                                            <div data-feeling_id="1" @click="feelActive1='feel_1_1'" class="feel_1_28_1 cursor-pointer rounded-full border-4 border-blue-300 feelingActive" :class="feelActive1 == 'feel_1_1' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/comfortable.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="2" @click="feelActive1='feel_1_2'" class="feel_1_28_2 cursor-pointer rounded-full" :class="feelActive1 == 'feel_1_2' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/confused.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="3" @click="feelActive1='feel_1_3'" class="feel_1_28_3 cursor-pointer rounded-full" :class="feelActive1 == 'feel_1_3' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/sad.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="4" @click="feelActive1='feel_1_4'" class="feel_1_28_4 cursor-pointer rounded-full" :class="feelActive1 == 'feel_1_4' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/happy.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="5" @click="feelActive1='feel_1_5'" class="feel_1_28_5 cursor-pointer rounded-full" :class="feelActive1 == 'feel_1_5' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/disgusted.png" alt="">
                                        </div>
                                                                    </div>
                    
                            </div>
                            <div data-subobservation_id="29" class="flex gap-2 lg:gap-20 items-center justify-between mb-10">
                                <div class="flex flex-col items-center w-[160px]">
                                    <div class="w-[76px] h-[76px] rounded-full bg-[#ffa726]">
                                        <div class="flex align-item-center justify-center items-center h-full">
                                            <img src="http://127.0.0.1:8000/new_img/sad.png" alt="" class="w-8 h-8 -mr-1"> <img src="http://127.0.0.1:8000/new_img/happy.png" alt="" class="w-8 h-8 -ml-1">
                                        </div>
                                    </div>
                                    <span class="mt-1 text-black font-normal text-base">Protection from dangerous objects</span>
                                </div>

                                
                                <div x-data="{ feelActive1: 'feel_1_1' }" class="flex flex-wrap items-center justify-center gap-2 italic font-semibold w-full ">
                                                                            <div data-feeling_id="1" @click="feelActive1='feel_1_1'" class="feel_1_29_1 cursor-pointer rounded-full border-4 border-blue-300 feelingActive" :class="feelActive1 == 'feel_1_1' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/comfortable.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="2" @click="feelActive1='feel_1_2'" class="feel_1_29_2 cursor-pointer rounded-full" :class="feelActive1 == 'feel_1_2' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/confused.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="3" @click="feelActive1='feel_1_3'" class="feel_1_29_3 cursor-pointer rounded-full" :class="feelActive1 == 'feel_1_3' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/sad.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="4" @click="feelActive1='feel_1_4'" class="feel_1_29_4 cursor-pointer rounded-full" :class="feelActive1 == 'feel_1_4' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/happy.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="5" @click="feelActive1='feel_1_5'" class="feel_1_29_5 cursor-pointer rounded-full" :class="feelActive1 == 'feel_1_5' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/disgusted.png" alt="">
                                        </div>
                                                                    </div>
                    
                            </div></div><div data-observation_id="2"><div class="mb-4">Comfort</div>
                            <div data-subobservation_id="" class="flex items-center justify-between mb-10">
                               
                                <div x-data="{ feelActive2: 'feel_2_1' }" class="flex flex-wrap items-center justify-center gap-2 italic font-semibold w-full ">
                                                                            <div data-feeling_id="1" @click="feelActive2='feel_2_1'" class="feel_2_1 cursor-pointer rounded-full border-4 border-blue-300 feelingActive" :class="feelActive2 == 'feel_2_1' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/comfortable.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="2" @click="feelActive2='feel_2_2'" class="feel_2_2 cursor-pointer rounded-full" :class="feelActive2 == 'feel_2_2' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/confused.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="3" @click="feelActive2='feel_2_3'" class="feel_2_3 cursor-pointer rounded-full" :class="feelActive2 == 'feel_2_3' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/sad.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="4" @click="feelActive2='feel_2_4'" class="feel_2_4 cursor-pointer rounded-full" :class="feelActive2 == 'feel_2_4' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/happy.png" alt="">
                                        </div>
                                                                            <div data-feeling_id="5" @click="feelActive2='feel_2_5'" class="feel_2_5 cursor-pointer rounded-full" :class="feelActive2 == 'feel_2_5' ? 'border-4 border-blue-300 feelingActive' : ''">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/disgusted.png" alt="">
                                        </div>
                                                                    </div>
                    
                            </div>
                        </div></div>

                    

                    {{var_dump($placeSignle->observationsDetail)}}

                    @foreach ($placeSignle->observationsDetail as $observation)
                       
                        <div class="flex items-center justify-center mb-10">
                            {{-- <div class="font-bold">Parent</div> --}}
                            <div class="flex gap-10">
                                <div class="flex flex-col items-center">
                                    <div class="font-bold mb-2"></div> 
                                    <img class="w-12 h-12 sm:w-16 sm:h-16" src="{{ asset($observation->feeling->image) }}" alt="">
                                </div>
                            
                            </div>
                        </div>

                        <div class="pt-4 mb-1 text-medium text-center">
                            {{ $observation->observation->name}}
                        </div>
                        @if(isset($observation->observationChild->name))
                            {{$observation->observationChild->name}}
                        @endif
                        
                       
                        
                    @endforeach
                </div>

            </div>
        </div>

        
    </div>

    <script>
        $(document).on('click', '.load-more-button', function() {
            var page = $(this).data('page');
            $.ajax({
                url: '/loadMore-dashboard?page=' + page,
                type: 'GET',
                success: function(data) {
                    
                    if (data.html != '') {
                        $('.load-more-button').data('page', page + 1);
                        $('.load-more-button').parent().before(data.html);
                    } 
                    
                    if(!data.hasMorePages){
                        $('.load-more-button').remove();
                    }
                }
            });
        });
    </script>
   
@endsection

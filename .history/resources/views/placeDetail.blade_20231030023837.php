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
    if(isset($observation->observationChild->name)){
        $observationList[$observation->observation->name][]=$observation;
    }else{
        $observationList[]=$observation;
    }
}
// echo '<pre>';
// var_dump($observationList);
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
                <div class="flex flex-col items-center justify-center">

                    <div class="grid grid-cols italic font-semibold gap-10 subObservationItems mt-12 text-center">
                        @forEach($observationList as $key=>$observation)
                        @if(is_array($observation))
                            <div>
                                <div class="mb-4">{{ $key }}</div>
                                
                                <div>
                                    @forEach($observation as $item)
                                    <div  class="flex flex-col gap-2 lg:gap-20 items-center justify-between mb-10">
                                        <div class="flex flex-col items-center w-[160px]">
                                            <span class="mt-1 text-black font-normal text-base">{{$item->observationChild->name}}</span>
                                        </div>

                        
                                        <div class="flex flex-wrap items-center justify-center gap-2 italic font-semibold w-full ">
                                            <div class="rounded-full">
                                                <img class="w-12 h-12 sm:w-16 sm:h-16" src="{{ asset($item->feeling->image) }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                
                                
                            </div>
                        @else
                            <div data-observation_id="2">
                                <div class="mb-4">{{ $observation->observation->name }}</div>
                                <div class="flex items-center justify-between mb-10">
                                    <div  class="flex flex-wrap items-center justify-center gap-2 italic font-semibold w-full ">
                                        <div class="rounded-full">
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="{{ asset($observation->feeling->image) }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        @endforeach
                            
                        
                    </div>

                    

                   

                   
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

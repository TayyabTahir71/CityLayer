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

                    <div class="flex items-center">
                        <div class="">Parent</div>
                        <div class="flex">
                            <div class="flex flex-col items-center">
                                <div>child</div> 
                                <img class="w-12 h-12 sm:w-16 sm:h-16" src="http://127.0.0.1:8000/img/comfortable.png" alt="">
                            </div>
                            
                        </div>

                    </div>

                    @foreach ($placeSignle->observationsDetail as $observation)
                       
                        <div class="pt-4 mb-1 text-medium text-center">
                            {{ $observation->observation->name}}
                        </div>
                        @if(isset($observation->observationChild->name))
                            {{$observation->observationChild->name}}
                        @endif
                        
                        <img class="w-12 h-12 sm:w-16 sm:h-16" src="{{ asset($observation->feeling->image) }}" alt="">
                        
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

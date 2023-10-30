@extends('layouts.app')

@section('main')

@php
// dd($placeSignle->placeDetail);
$placename = ($placeSignle && $placeSignle->placeDetail->place) ? $placeSignle->placeDetail->place->name : '';
$placename.= ($placeSignle && $placeSignle->placeDetail->placeChild) ? ' → ' . $placeSignle->placeDetail->placeChild->name : '';
if(empty($placename)){
    $placename='No Place';
}

@endphp
    <div data-barba="container" class="p-6 lg:p-12">
        <a href="/dashboard">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>
        

        <div class="grid grid-cols-1">
            <div class="z-0 max-w-4xl p-3 mx-4 space-y-4 md:mx-auto">
                
                <h1 class="text-2xl font-semibold text-center text-gray-900">{{$placename}}</h1>
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

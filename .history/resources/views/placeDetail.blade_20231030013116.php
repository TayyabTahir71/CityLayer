@extends('layouts.app')

@section('main')

@php
dd($placeDetail->place);
$placename = ($placeDetail && $placeDetail->place) ? $placeDetail->place->name : '';
$placename.= ($placeDetail && $placeDetail->placeChild) ? ' → ' . $placeDetail->placeChild->name : '';
if(empty($placename)){
    $placename='No Place';
}

@endphp
    <div data-barba="container" class="p-6 lg:p-12">
        <a href="/dashboard">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>
        

        <div class="grid grid-cols-1">
            <div class="">
                {{$placename}}
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

@extends('layouts.app')

@section('main')
    <div data-barba="container" class="p-6 lg:p-12">
        <a href="/">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>
        <div class="flex flex-col items-center justify-center pt-12 gap-x-6 lg:pt-20">
            <label for="image" class="relative">
                <img class="object-cover rounded-full avatar_image"
                     src="/storage/uploads/avatar/{{ backpack_auth()->user()->avatar }}" alt="">
                
            </label>
            <div class="flex-r pt-4">
                <div class="bl">Dashboard</div>
               
            </div>
        </div>

        <div class="grid grid-cols-1">
            <div class="">
                @include('item_dashboard')

                <div class="belo m-4">
                    @if ($placeDetails->hasMorePages())
                        <div class="first load-more-button cursor-pointer" data-page="{{ $placeDetails->currentPage() + 1 }}">see <div class="plu">+</div> all</div>
                    @endif
                    <a href="/" class="scnd mt-2">Back</a>
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

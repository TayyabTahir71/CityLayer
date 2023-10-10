@extends('layouts.app')

@section('main')
    <div data-barba="container" class="p-6 lg:p-12">
        <a href="/">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">
        </a>
        <div class="flex flex-col items-center justify-center pt-12 gap-x-6 lg:pt-20">
            <label  class=" relative">
                <div class="object-cover rounded-full avatar_image flex justify-center items-center text-4xl">
                    🏆
                </div>
            
            </label>
           
            <div class="flex-r pt-4">
                <div class="bl">Community achievements</div>
               
            </div>
            
        </div>

        <div class="grid grid-cols-1">
            <div class="">

                @forelse ($usersWithTotals as $user)

                    <div class="flex p-2 mt-8 mb-2">
                       @php $img = $user['avatar'] ?? null; @endphp
                        <img src="{{ asset('storage/uploads/avatar/' . $img) }}" alt="Just a flower" class="object-cover w-16 h-16 rounded-full border-4 border-site" onerror="this.src='/img/empty.png'">
                        <div class="flex flex-col justify-center w-full px-2 py-1">

                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    <h2 class="pl-2 italic text-base font-bold">{{ $user->name }}</h2>
                                </div>
                                  <div class="flex flex-col mr-2">
                                    <h2 class="pl-4 text-sm font-normal text-gray-800">Places added {{$user->total_places}}</h2>
                                    <h2 class="pl-4 mt-2 text-sm font-normal text-gray-800">Observations added {{$user->total_observations}}</h2>
                                </div>
                            </div>
                        </div>
    
              
                    </div>
            
                @endforeach
                <div class="belo m-4">
                    <div class="first load-more-button cursor-pointer" data-page="{{ $usersWithTotals->currentPage() + 1 }}">see <div class="plu">+</div> all</div>
                    <a href="/" class="scnd mt-2">Back</a>
                </div>
                

            </div>
        </div>

        

        
    </div>
    <script>
        $(document).on('click', '.load-more-button', function() {
            var page = $(this).data('page');
            $.ajax({
                url: '/load-more-community-achievements?page=' + page,
                type: 'GET',
                success: function(data) {
                    if (data.html != '') {
                        $('.load-more-button').data('page', page + 1);
                        $('.load-more-button').parent().before(data.html);
                    } else {
                        $('.load-more-button').remove();
                    }
                }
            });
        });
    </script>
    
    
@endsection

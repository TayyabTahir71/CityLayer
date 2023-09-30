
@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <a href="javascript:history.back()">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>
        <div class="flex flex-col h-screen mx-auto">
            <form action="save_profile" class="flex flex-col  justify-center p-4 mx-auto" method="POST">
                {!! csrf_field() !!}
                @csrf
                <input type="file" name="image" id="image" class="hidden" accept="image/*"
                       onchange="javascript:this.form.submit();">
                <label for="image" class="cursor-pointer new" >
                    <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full  " style="border-width: 7px"
                         src="{{asset('img/avatar.png')}}" alt="">
                </label>
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-2/3 ">

                </label>
                <div class="dash">Community achievements</div>
            </form>

            <div class="z-0 p-3 pt-16 space-y-4 lg:mx-16 md:pt-20">

                <div class="grid grid-cols-1">
                    <div class="dashboard">

                        @forelse ($users as $user)

                            <div class="ddas">
                                <div class="fist">
                                    <input type="file" style="" name="image" id="image" class="hidden" accept="image/*"
                                           onchange="javascript:this.form.submit();">
                                    <label for="image" class="cursor-pointer new" >
                                        @php $img = $user['avatar'] ?? null; @endphp
                                        <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full nimage "
                                             src="{{ asset('storage/uploads/avatar/' . $img) }}" alt="">
                                    </label>
                                    <div class="taz">   {{ $user['name'] }}</div>
                                </div>
                                <div class="scn">
                                    <div class="taz">   Places mapped:xx</div>
                                    <div class="taz">   Observations mapped:xx</div>
                                </div>

                            </div>
                        <br/>
{{--                            <div class="flex p-2 mt-8 mb-2 bg-white border rounded shadow-md">--}}
{{--                               @php $img = $user['avatar'] ?? null; @endphp--}}
{{--                                <img src="{{ asset('storage/uploads/avatar/' . $img) }}" alt="Just a flower" class="object-cover w-12 h-12 rounded" onerror="this.src='/img/empty.png'">--}}
{{--                                <div class="flex flex-col justify-center w-full px-2 py-1">--}}

{{--                                    <div class="flex items-center justify-between">--}}
{{--                                        <div class="flex flex-col">--}}
{{--                                            <h2 class="pl-4 text-sm font-medium text-gray-800">{{ $user['name'] }}</h2>--}}
{{--                                        </div>--}}
{{--                                          <div class="flex flex-col mr-2">--}}
{{--                                            <h2 class="pl-4 text-xs font-medium text-gray-800">Street: {{ count($street->where('user_id', $user['id'])) }}</h2>--}}
{{--                                             <h2 class="pl-4 text-xs font-medium text-gray-800">Building: {{ count($building->where('user_id', $user['id'])) }}</h2>--}}
{{--                                              <h2 class="pl-4 text-xs font-medium text-gray-800">Openspace: {{ count($openspace->where('user_id', $user['id'])) }}</h2>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="flex items-center justify-between ">--}}
{{--                                        <div class="flex flex-col pr-2">--}}
{{--                                             <h2 class="pl-2 text-sm font-medium text-gray-800">Score: {{ $user->score }}</h2>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                            </div>--}}
                        @empty

                        @endforelse
                            <div class="first">see <div class="plu">+</div> more</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let chunkIndex = 0; // Track the current chunk index

        function showNextChunk() {
            const chunks = document.querySelectorAll('.chunk-container');
            if (chunkIndex < chunks.length - 1) {
                chunks[chunkIndex].style.display = 'none'; // Hide the current chunk
                chunkIndex++;
                chunks[chunkIndex].style.display = 'block'; // Show the next chunk
            }
        }
    </script>
@endsection

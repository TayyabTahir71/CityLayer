@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <div class="flex flex-col mx-auto">
            <div class="flex flex-row items-center pt-2">
                <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 lg:ml-16 fas fa-close"></i></a>
            </div>

            <input type="hidden" id="placeid" value="{{ $placeid }}">
            <input type="hidden" id="placetype" value="{{ $type }}">
            <div class="pt-2 modal-content">
                <h1 id="title" class="text-xl font-bold text-center">
                    {{ __('messages.React to this place to earn 1 point!') }}</h1>
                <div class="relative pt-4">
                    <img id="img" src="/storage{{ $data->image0 }}" alt="image" class="object-cover w-full h-auto mx-auto" onerror="missing()">
                    <img id="feeling" src="/img/{{ $data->feeling }}.png" alt="feeling" class="absolute bottom-0 right-0 w-auto h-12 m-4">
                </div>
                <div id="opinions" class="pt-4"></div>
                <p id="description" class="p-2 m-2 text-base font-bold">{{ $data->description }}</p>
                <div class="pt-4">
                    <img id="img2" src="/storage{{ $data->image }}" alt="image" class="object-cover w-full h-auto mx-auto" onerror="missing2()">
                </div>
                <p id="description2" class="p-2 m-2 text-base font-bold">{{ $data->description2 }}</p>
                <h1 id="title2" class="pb-4 text-xl font-bold text-center">{{ __('messages.Your opinion') }}:</h1>
                <div class="flex flex-row justify-center pb-8">
                    <img src="/img/1.png" class="w-8 h-8 mx-4 hover:scale-110 active:scale-125" onclick="mapAction('like')">
                    <img src="/img/2.png" class="w-8 h-8 mx-4 hover:scale-110 active:scale-125" onclick="mapAction('dislike')">
                    <img src="/img/3.png" class="w-8 h-8 mx-4 hover:scale-110 active:scale-125" onclick="mapAction('stars')">
                    <img src="/img/4.png" class="w-8 h-8 mx-4 hover:scale-110 active:scale-125" onclick="mapAction('bof')">
                    <img src="/img/5.png" class="w-8 h-8 mx-4 hover:scale-110 active:scale-125" onclick="mapAction('weird')">
                </div>
                <div class="flex flex-col items-center justify-center w-full p-2 mb-16">
                    <textarea name="comm" style="overflow:auto;resize:none" id="comm" cols="10" rows="2"
                        class="w-full mx-2 mb-4 font-light border rounded focus:outline-none focus:border-blue-300" placeholder=""></textarea>
                    <button type="button"
                        class="w-1/2 px-2 py-2 mx-auto mt-1 text-xs text-white bg-gray-400 rounded-lg focus:outline-none focus:shadow-outline active:bg-gray-500"
                        onclick="comment()">{{ __('messages.Leave a comment') }}</button>
                </div>
            </div>
        </div>

          <div x-data="{ modelOpen: false }">
            <button id="point" @click="modelOpen =!modelOpen" class="hidden"></button>

            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div class="flex items-center justify-center px-4 text-center">
                    <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="z-50 inline-block overflow-hidden transition-all transform bg-white rounded-lg shadow-xl mt-60">

                        <div class="items-center px-2 pt-3 space-x-4 bloc">
                            <div class="flex justify-center font-bold">
                                {{ __('messages.You have earned') }} <img src="/img/plus1.png" class="w-8 h-8 pb-2">{{ __('messages.point!') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div x-data="{ modelOpen: false }">
            <button id="already" @click="modelOpen =!modelOpen" class="hidden"></button>

            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div class="flex items-center justify-center px-4 text-center">
                    <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="z-50 inline-block overflow-hidden transition-all transform bg-white rounded-lg shadow-xl mt-60">

                        <div class="items-center px-2 py-3 space-x-4 bloc">
                            <div class="flex justify-center font-bold">
                                 {{ __('messages.You have already react to this place!') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div x-data="{ modelOpen: false }">
            <button id="commented" @click="modelOpen =!modelOpen" class="hidden"></button>

            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div class="flex items-center justify-center px-4 text-center">
                    <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="z-50 inline-block overflow-hidden transition-all transform bg-white rounded-lg shadow-xl mt-60">

                        <div class="items-center px-2 py-3 space-x-4 bloc">
                            <div class="flex justify-center font-bold">{{ __('messages.Your comment as been saved!') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>
        function missing() {
            document.getElementById("img").src = "/img/empty.png";
        }

        function missing2() {
            document.getElementById("img2").src = "/img/empty.png";
        }

        function mapAction(action) {
            var id = document.getElementById("placeid").value;
            var type = document.getElementById("placetype").value;

            var url;
            switch (action) {
                case 'like':
                    url = "/place/like";
                    break;
                case 'dislike':
                    url = "/place/dislike";
                    break;
                case 'stars':
                    url = "/place/stars";
                    break;
                case 'bof':
                    url = "/place/bof";
                    break;
                case 'weird':
                    url = "/place/weird";
                    break;
                case 'ohh':
                    url = "/place/ohh";
                    break;
                case 'wtf':
                    url = "/place/wtf";
                    break;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    id: id,
                    type: type
                },
                success: function(data) {
                    if (data == 'already') {
                        document.getElementById('already').click();
                        setTimeout(function() {
                            document.getElementById('already').click();
                        }, 1000);
                    } else {
                        document.getElementById('point').click();
                        //close popup after 3 seconds
                        setTimeout(function() {
                            document.getElementById('point').click();
                        }, 1000);
                    }
                }
            });
 
        }

        function comment() {
            var id = document.getElementById('placeid').value;
            var type = document.getElementById('placetype').value;
            var comment = document.getElementById('comm').value;
            var url = "/place/comment";
            console.log(comment)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    id: id,
                    type: type,
                    comment: comment
                },
                success: function(data) {
                    if (data == 'commented') {
                        document.getElementById('commented').click();
                        //close popup after 3 seconds
                        setTimeout(function() {
                            document.getElementById('commented').click();
                        }, 1000);
                    }
                }
            });

        }
    </script>
@endsection

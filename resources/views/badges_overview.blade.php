@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <a href="javascript:history.back()">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>

        <div class="flex flex-col h-screen mx-auto">
{{--            <div class="flex flex-col items-center pt-24 gap-x-6 lg:pt-32">--}}
{{--                <form action="avatar" method="POST" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    <input type="file" name="image" id="image" class="hidden" accept="image/*"--}}
{{--                           onchange="javascript:this.form.submit();">--}}
{{--                    <label for="image" class="cursor-pointer ">--}}
{{--                        <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full  " style="border-width: 7px"--}}
{{--                             src="/storage/uploads/avatar/{{ backpack_auth()->user()->avatar }}" alt="">--}}
{{--                    </label>--}}
{{--                    <div class="bg-black rounded-full text-white  text-center text-lg relative mt-[-22%] text-2xl" style="width: 31px;font-size: 2rem">+</div>--}}
{{--                </form>--}}

{{--            </div>--}}
            <h1 class="pt-4 bold text-center text-gray-800 f15">Username</h1>
            <br/>
            <h2 class="pt-2 text-blue-600 font-bold text-center" style="color: #2d9bf0;font-weight: 300"> Level {{ backpack_auth()->user()->score }} !</h2>

            <div class="w-2/3 mx-auto">
                <div class="circle">2</div>
                <div class="relative pt-1">
                    <div class="flex h-3 overflow-hidden text-xs bg-white border-2 border-blue-500 ">
                        @php $score = backpack_auth()->user()->score / 10; @endphp
                        <div style="width:{{ $score }}%"
                             class="flex flex-col bg-blue-600 justify-center text-center text-white  shadow-none whitespace-nowrap">
                        </div>
                    </div>
{{--                    <div class="pt-2">--}}
{{--                        @if (backpack_auth()->user()->score < 100)--}}
{{--                            <div class="text-xs font-semibold text-center text-blue-300">Level 1</div>--}}
{{--                        @elseif(backpack_auth()->user()->score < 200)--}}
{{--                            <div class="text-xs font-semibold text-center text-blue-300">Level 2</div>--}}
{{--                        @elseif(backpack_auth()->user()->score < 300)--}}
{{--                            <div class="text-xs font-semibold text-center text-blue-300">Level 3</div>--}}
{{--                        @elseif(backpack_auth()->user()->score < 400)--}}
{{--                            <div class="text-xs font-semibold text-center text-blue-300">Level 4</div>--}}
{{--                        @elseif(backpack_auth()->user()->score < 500)--}}
{{--                            <div class="text-xs font-semibold text-center text-blue-300">Level 5</div>--}}
{{--                        @elseif(backpack_auth()->user()->score < 600)--}}
{{--                            <div class="text-xs font-semibold text-center text-blue-300">Level 6</div>--}}
{{--                        @elseif(backpack_auth()->user()->score < 700)--}}
{{--                            <div class="text-xs font-semibold text-center text-blue-300">Level 7</div>--}}
{{--                        @elseif(backpack_auth()->user()->score < 800)--}}
{{--                            <div class="text-xs font-semibold text-center text-blue-300">Level 8</div>--}}
{{--                        @elseif(backpack_auth()->user()->score < 900)--}}
{{--                            <div class="text-xs font-semibold text-center text-blue-300">Level 9</div>--}}
{{--                        @elseif(backpack_auth()->user()->score < 1000)--}}
{{--                            <div class="text-xs font-semibold text-center text-blue-300">Level 10</div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
                    <br/>
                    <div class="flex flex-col justify-center items-center">
                     </div>
                    <div class="fc">
                        <div class="df">
                            <div class="box">
                                <img src="{{ asset('img/icons/architect.png') }}" class="image cursor-pointer" alt="Your Image">
<div class="tes">explorer</div>
                            </div>
                            <div class="box">
                                <img src="{{ asset('img/icons/CL_B-star.png') }}" class="image cursor-pointer" alt="Your Image">
<div class="tes">explorer</div>
                            </div>
                            <div class="box">
                                <img src="{{ asset('img/icons/CL_B-citymaker.png') }}" class="image cursor-pointer" alt="Your Image">
<div class="tes">explorer</div>
                            </div>


                        </div>
                        <div class="df">
                            <div class="box">
                                <img src="{{ asset('img/icons/CL_B-explorer.png') }}" class="image cursor-pointer" alt="Your Image">
<div class="tes">explorer</div>
                            </div>
                            <div class="box">
                                <img src="{{ asset('img/icons/architect.png') }}" class="image cursor-pointer" alt="Your Image">
<div class="tes">explorer</div>
                            </div>
                            <div class="box">
                                <img src="{{ asset('img/icons/guru.png') }}" class="image cursor-pointer" alt="Your Image">
<div class="tes">explorer</div>
                            </div>


                        </div>
                        <div class="df">
                            <div class="box">
                                <img src="{{ asset('img/icons/CL_B-investigator.png') }}" class="image cursor-pointer" alt="Your Image">
<div class="tes">explorer</div>
                            </div>
                            <div class="box">
                                <img src="{{ asset('img/icons/architect.png') }}" class="image cursor-pointer" alt="Your Image">
<div class="tes">explorer</div>
                            </div>
                            <div class="box">
                                <img src="{{ asset('img/icons/CL_B-influencer.png') }}" class="image cursor-pointer" alt="Your Image">
<div class="tes">explorer</div>
                            </div>


                        </div>
                        <div class="box">
                            <img src="{{ asset('img/icons/CL_B-supermapper.png') }}" class="image cursor-pointer" alt="Your Image">
                            <div class="tes">explorer</div>
                        </div>
                    </div>

                    <div>

                    </div>
                    <br/>
                    <div class="flex flex-row justify-center items-center gap-4">
                        <button style="background: #2d9bf0;font-weight: bold" class="bg-blue-500 text-white font-bold py-2 px-7 rounded-lg brad fnor clbtn">Close</button>
                    </div>


                    {{--                     <div class="fixed top-0 left-0 w-full h-full popup z-100" style="display:none;">--}}
                    {{--                         <div class="popup-content absolute top-[50%] left-[50%] bg-white rounded p-4 text-xs font-bold text-center w-2/3">--}}

                    {{--                         </div>--}}
                    {{--                     </div>--}}
                    {{--                     <h1 class="pt-2 text-xs font-bold text-center text-gray-800">{{ __('messages.My badges:') }}</h1>--}}
                    {{--                     <div class="flex justify-center pt-2">--}}
                    {{--                         <div class="flex flex-col">--}}
                    {{--                             <div class="flex gap-x-1">--}}
                    {{--                                 <button id="btn1">--}}
                    {{--                                     @if ($explorer == 1)--}}
                    {{--                                         <img class="w-24" src="/img/icons/explorer.png" alt="">--}}
                    {{--                                     @else--}}
                    {{--                                         <img class="w-24 grayscale" src="/img/icons/explorer.png">--}}
                    {{--                                     @endif--}}
                    {{--                                 </button>--}}
                    {{--                                 <button id="btn2">--}}
                    {{--                                     @if ($citymaker == 1)--}}
                    {{--                                         <img class="w-24" src="/img/icons/citymaker.png" alt="">--}}
                    {{--                                     @else--}}
                    {{--                                         <img class="w-24 grayscale" src="/img/icons/citymaker.png">--}}
                    {{--                                     @endif--}}
                    {{--                                 </button>--}}

                    {{--                                 <button id="btn3">--}}
                    {{--                                     @if ($architect == 1)--}}
                    {{--                                         <img class="w-24" src="/img/icons/architect.png" alt="">--}}
                    {{--                                     @else--}}
                    {{--                                         <img class="w-24 grayscale" src="/img/icons/architect.png">--}}
                    {{--                                     @endif--}}
                    {{--                                 </button>--}}

                    {{--                                 <button id="btn4">--}}
                    {{--                                     @if ($flaneur == 1)--}}
                    {{--                                         <img class="w-24" src="/img/icons/flaneur.png" alt="">--}}
                    {{--                                     @else--}}
                    {{--                                         <img class="w-24 grayscale" src="/img/icons/flaneur.png">--}}
                    {{--                                     @endif--}}
                    {{--                                 </button>--}}

                    {{--                                 <button id="btn5">--}}
                    {{--                                     @if ($urbanist == 1)--}}
                    {{--                                         <img class="w-24" src="/img/icons/urbanist.png" alt="">--}}
                    {{--                                     @else--}}
                    {{--                                         <img class="w-24 grayscale" src="/img/icons/urbanist.png">--}}
                    {{--                                     @endif--}}
                    {{--                                 </button>--}}
                    {{--                             </div>--}}
                    {{--                             <div class="flex pt-2 gap-x-1">--}}
                    {{--                                 <button id="btn6">--}}
                    {{--                                     @if ($influencer == 1)--}}
                    {{--                                         <img class="w-24" src="/img/icons/influencer.png" alt="">--}}
                    {{--                                     @else--}}
                    {{--                                         <img class="w-24 grayscale" src="/img/icons/influencer.png">--}}
                    {{--                                     @endif--}}
                    {{--                                 </button>--}}

                    {{--                                 <button id="btn7">--}}
                    {{--                                     @if ($star == 1)--}}
                    {{--                                         <img class="w-24" src="/img/icons/star.png" alt="">--}}
                    {{--                                     @else--}}
                    {{--                                         <img class="w-24 grayscale" src="/img/icons/star.png">--}}
                    {{--                                     @endif--}}
                    {{--                                 </button>--}}

                    {{--                                 <button id="btn8">--}}
                    {{--                                     @if ($guru == 1)--}}
                    {{--                                         <img class="w-24" src="/img/icons/guru.png" alt="">--}}
                    {{--                                     @else--}}
                    {{--                                         <img class="w-24 grayscale" src="/img/icons/guru.png">--}}
                    {{--                                     @endif--}}
                    {{--                                 </button>--}}

                    {{--                                 <button id="btn9">--}}
                    {{--                                     @if ($investigator == 1)--}}
                    {{--                                         <img class="w-24" src="/img/icons/investigator.png" alt="">--}}
                    {{--                                     @else--}}
                    {{--                                         <img class="w-24 grayscale" src="/img/icons/investigator.png">--}}
                    {{--                                     @endif--}}
                    {{--                                 </button>--}}

                    {{--                                 <button id="btn10">--}}
                    {{--                                     @if ($supermapper == 1)--}}
                    {{--                                         <img class="w-24" src="/img/icons/supermapper.png" alt="">--}}
                    {{--                                     @else--}}
                    {{--                                         <img class="w-24 grayscale" src="/img/icons/supermapper.png">--}}
                    {{--                                     @endif--}}
                    {{--                                 </button>--}}
                    {{--                             </div>--}}

                    {{--                         </div>--}}
                    {{--                     </div>--}}
                </div>
            </div>


            <h1 class="pt-4 text-2xl text-center text-gray-800">{{ backpack_auth()->user()->email }}</h1>

            {{--             <div class="flex justify-center pt-4 mx-4">--}}
            {{--                 @php--}}
            {{--                     $preferences = explode(',', $infos->preferences);--}}
            {{--                     // remove all special characters but keep the spaces--}}
            {{--                     $preferences = preg_replace('/[^A-Za-z0-9 ]/', '', $preferences);--}}

            {{--                 @endphp--}}
            {{--                 @foreach ($preferences as $preference)--}}
            {{--                     <div class="flex flex-col gap-y-2">--}}
            {{--                         <h1 class="text-xs flex py-2 mx-2 px-2 text-center text-white bg-[#667DC7] rounded-lg">--}}
            {{--                             {{ $preference }}</h1>--}}
            {{--                     </div>--}}
            {{--                 @endforeach--}}

            {{--             </div>--}}
            {{--             <button--}}
            {{--                 class="px-4 py-2 mx-auto mt-8 mb-8 text-center text-white bg-green-400 rounded-full hover:bg-green-300 active:bg-green-800">--}}
            {{--                 <a href="/edit_profile">{{ __('messages.Edit Profile') }}</a>--}}
            {{--             </button>--}}
        </div>
    </div>

    <script>
        // Get references to all the buttons
        var button1 = document.getElementById("btn1");
        var button2 = document.getElementById("btn2");
        var button3 = document.getElementById("btn3");
        var button4 = document.getElementById("btn4");
        var button5 = document.getElementById("btn5");
        var button6 = document.getElementById("btn6");
        var button7 = document.getElementById("btn7");
        var button8 = document.getElementById("btn8");
        var button9 = document.getElementById("btn9");
        var button10 = document.getElementById("btn10");
        var popup = document.querySelector(".popup");

        // Add event listeners to each button
        button1.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/explorer.png'><br><p>Explorer - Map a space that was not mapped before!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button2.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/citymaker.png'><br><p>City-maker – Map at least 10 spaces!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button3.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/architect.png'><br><p>Architect - Map at least 10 buildings!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button4.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/flaneur.png'><br><p>Flaneur - Map at least 10 streets!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button5.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/urbanist.png'><br><p>Urbanist - Map at least 10 open spaces!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button6.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/influencer.png'><br><p>Influencer – Receive 10+ comments by other users on one contribution!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button7.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/star.png'><br><p>Star - Receive 20+ reactions by other users on one contribution!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button8.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/guru.png'><br><p>Guru - Comment on 10 other people's posts!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button9.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/investigator.png'><br><p>Investigator - Post more that 10 pictures!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button10.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/supermapper.png'><br><p>Supermapper - Collect 500 points!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        popup.addEventListener("click", function(e) {
            // Check if the user clicked outside of the popup content
            if (e.target === popup) {
                // Hide the popup if the user clicked outside of it
                popup.style.display = "none";
            }
        });


        // Repeat the same pattern for the other buttons
    </script>
    <style>
        .popup {
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 100;
        }

        .popup-content {
            transform: translate(-50%, -50%);
        }
    </style>
@endsection

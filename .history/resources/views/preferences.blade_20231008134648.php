@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
        <a href="/profile">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>

        <form action="save_preferences" class="flex flex-col items-center justify-center p-8 mx-auto" method="POST">
            {!! csrf_field() !!}
            @csrf
            <input type="file" name="image" id="image" class="hidden" accept="image/*"
                   onchange="javascript:this.form.submit();">
            <label for="image" class="cursor-pointer new" >
                <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full  " style="border-width: 7px"
                     src="{{asset('images/iconfinder_avatar_boy_kid_person_4043238.svg')}}" alt="">
            </label>
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-2/3 ">
                <div class="flex flex-col items-center justify-center pb-6">
                </div>
            </label>
            <div class="flex-r">
                <div class="bl">Edit city tags</div>
                <div class="i">i</div>
            </div>
            <br/>
            <input placeholder="Browse or add new city tags" class="inp1">
            <br/>

            <div class="flex flex-col items-center justify-center">
                @php
                    if ($preferences == null) {
                    $preference = [];}
                    else {
                        $preference = json_decode($preferences);
                    }
                @endphp
                <div class="pt-8">


                    <label>
                        <input type="checkbox" name="preferences[]" value="city cycling" {{ in_array("city cycling", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">

                            <div class="flex justify-center text-white">
                                <div class="font-semibold ">{{ __('city cycling') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="street photography" {{ in_array("street photography", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex bg-yel items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">

                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('street photography') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="cityscape exploring"  {{ in_array("cityscape exploring", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('cityscape exploring') }}</div>
                            </div>
                        </div>
                    </label>


                    <label>
                        <input type="checkbox" name="preferences[]" value="nature exploring"  {{ in_array("nature exploring", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 bg-yel ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('nature exploring') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="urban gardening"  {{ in_array("urban gardening", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('urban gardening') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="park picnics"  {{ in_array("park picnics", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('park picnics') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="outdoor sports"  {{ in_array("outdoor sports", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 bg-yel ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('outdoor sports') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="long walks through the city"  {{ in_array("long walks through the city", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border bg-yel p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('long walks through the city') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="nightlife"  {{ in_array("nightlife", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('nightlife') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]"
                               value="historic landmarks"  {{ in_array("historic landmarks", $preference) ? "checked" : "" }}
                               class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">
                                    {{ __('historic landmarks') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]"
                               value="hidden germs"  {{ in_array("hidden germs", $preference) ? "checked" : "" }}
                               class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">
                                    {{ __('hidden germs') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="architecture"  {{ in_array("architecture", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('architecture') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="observing nature"  {{ in_array("observing nature", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('observing nature') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="observing people"  {{ in_array("observing people", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 bg-yel ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('observing people') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="lively and vibrant places"  {{ in_array("lively and vibrant places", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('lively and vibrant places') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="walking difficulties"  {{ in_array("walking difficulties", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('walking difficulties') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="walking to work / school"  {{ in_array("walking to work school", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('walking to work school') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="car travelling"  {{ in_array("car travelling", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('.car travelling') }}</div>
                            </div>
                        </div>
                    </label>
                    <label>
                        <input type="checkbox" name="preferences[]" value="public transport"  {{ in_array("public transport", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('public transport') }}</div>
                            </div>
                        </div>
                    </label>
                    <label>
                        <input type="checkbox" name="preferences[]" value="outdoor activities"  {{ in_array("outdoor activities", $preference) ? "checked" : "" }}
                        class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('outdoor activities') }}</div>
                            </div>
                        </div>
                    </label>

                </div>

                <div class="flex-r items-center justify-center">
                    <button class="bg-blue-500 text-white p-3 rounded-lg backbtn">Back</button>
                    <button type="submit" class="text-blue-500 border border-blue-500 p-3   rounded-lg backbtn">Save and close</button>
                </div>
        </form>
    </div>



    <script>

        document.querySelector('.inp1').addEventListener('click',()=>{
            document.querySelector(".none").style.display = "block";
        })
    </script>
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

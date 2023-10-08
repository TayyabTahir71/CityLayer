@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
        <a href="javascript:history.back()">
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
                <div class="fb">
                    @php
                        $preferences = explode(',', $infos->preferences);
                        // remove all special characters but keep the spaces
                        $preferences = preg_replace('/[^A-Za-z0-9 ]/', '', $preferences);

                    @endphp
                    @foreach ($preferences as $preference)
                        <div class="flex flex-row items-center justify-center " style="width: 45%">
                            <div class="flex flex-row items-center justify-center  w-89 gap5 w45">

                                <button class="bg-yel  border-ms p5">{{$preference}}</button>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="pt-8 none">

                 @php
                 if ($preferences == null) {
                     $preference = [];}
                    else {
                          $preference = json_decode($preferences);
                    }
                 @endphp
                    <label>
                        <input type="checkbox" name="preferences[]" value="I love long walks" {{ in_array("I love long walks", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">

                            <div class="flex justify-center text-white">
                                <div class="font-semibold ">{{ __('messages.I love long walks') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I walk to school / work" {{ in_array("I walk to school / work", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex bg-yel items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">

                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I walk to school / work') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I am in a wheelchair"  {{ in_array("I am in a wheelchair", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I am in a wheelchair') }}</div>
                            </div>
                        </div>
                    </label>


                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy outdoor sports"  {{ in_array("I enjoy outdoor sports", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 bg-yel ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I enjoy outdoor sports') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I walk to school or work"  {{ in_array("I walk to school or work", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I walk to school / work') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I cycle / scooter"  {{ in_array("I cycle / scooter", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I cycle / scooter') }}</div>
                            </div>
                        </div>
                    </label>

                                      <label>
                        <input type="checkbox" name="preferences[]" value="I mostly travel by car"  {{ in_array("I mostly travel by car", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 bg-yel ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I mostly travel by car') }}</div>
                            </div>
                        </div>
                    </label>

                                      <label>
                        <input type="checkbox" name="preferences[]" value="I mostly travel by public transport"  {{ in_array("I mostly travel by public transport", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border bg-yel p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I mostly travel by public transport') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I love exploring new places"  {{ in_array("I love exploring new places", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I love exploring new places') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]"
                            value="I am interested in architecture"  {{ in_array("I am interested in architecture", $preference) ? "checked" : "" }}
                             class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">
                                    {{ __('messages.I am interested in architecture') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]"
                            value="I enjoy visiting historical landmarks"  {{ in_array("I enjoy visiting historical landmarks", $preference) ? "checked" : "" }}
                             class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">
                                    {{ __('messages.I enjoy visiting historical landmarks') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy calm parks and nature"  {{ in_array("I enjoy calm parks and nature", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I enjoy calm parks and nature') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I love pocket parks"  {{ in_array("I love pocket parks", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I love pocket parks') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy gardening in urban spaces"  {{ in_array("I enjoy gardening in urban spaces", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 bg-yel ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I enjoy gardening in urban spaces') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy lively and vibrant places"  {{ in_array("I enjoy lively and vibrant places", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I enjoy lively and vibrant places') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy being outside in the night"  {{ in_array("I enjoy being outside in the night", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I enjoy being outside in the night') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I have difficulties walking"  {{ in_array("I have difficulties walking", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I have difficulties walking') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I have issues with eyesight"  {{ in_array("I have issues with eyesight", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I have issues with eyesight') }}</div>
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

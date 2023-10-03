@php use \App\Http\Controllers\GlobalController;
$info = GlobalController::myprofile();
@endphp

@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">

        <a href="javascript:history.back()">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>
        <form action="save_profile" class="flex flex-col items-center justify-center p-8 mx-auto" method="POST">
            @csrf
            <input type="file" name="image" id="image" class="hidden" accept="image/*"
                   onchange="javascript:this.form.submit();">
            <label for="image" class="cursor-pointer ">
                <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full  " style="border-width: 7px"
                     src="{{asset('images/iconfinder_avatar_boy_kid_person_4043238.svg')}}" alt="">
            </label>
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-2/3">
                <div class="flex flex-col items-center justify-center pb-6">
                </div>
            </label>
            <div class="fbox" id="toggleContainer1">
                <div class="sbox">
                    <div class="text">Email</div>
                    <div>change /add email</div>
                </div>
                <div class="plus">
                    +
                </div>
            </div>
            <div id="email1">
                <label for="email" class="block mb-2 text-base font-medium text-gray-900">Email:</label>
                <input id="email" name="email" type="email" value="{{ backpack_auth()->user()->email }}"
                       class="block w-2/3 px-4 py-3 mb-2 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg md:w-1/3 focus:ring-blue-500 focus:border-blue-500 text-center">
            </div>
            <br/>
            <div class="fbox" id="toggleContainer2">
                <div class="sbox">
                    <div class="text">Age</div>
                    <div>change /add age</div>
                </div>
                <div class="plus">
                    +
                </div>
            </div>
          <div id="age1">
              <label for="age" class="block mb-2 text-base font-medium text-gray-900">{{ __('messages.Age:') }}</label>
              <input type="number" name="age" style="-moz-appearance: textfield"
                     class="block w-2/3 px-4 py-3 mb-2 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg md:w-1/3 focus:ring-blue-500 focus:border-blue-500 text-center"
                     name="custom-input-number" min="10" value="{{ $info->age }}">

          </div>
<br/>
            <div class="fbox" id="toggleContainer3">
                <div class="sbox">
                    <div class="text">Gender</div>
                    <div>change /add gender</div>
                </div>
                <div class="plus">
                    +
                </div>
            </div>
            <div id="gender1">
                <label for="gender" class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Gender:') }}</label>
                <select id="gender" name="gender"
                        class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg md:w-1/3 focus:ring-blue-500 focus:border-blue-500 text-center">
                    <option selected></option>
                    <option value="male" {{ $info->gender == 'male' ? 'selected' : '' }}>{{ __('messages.Male') }}</option>
                    <option value="female" {{ $info->gender == 'female' ? 'selected' : '' }}>{{ __('messages.Female') }}</option>
                    <option value="other"  {{ $info->gender == 'other' ? 'selected' : '' }}>{{ __('messages.Other') }}</option>
                </select>
            </div>
<br/>
            <div class="fbox" id="toggleContainer4">
                <div class="sbox">
                    <div class="text">Education</div>
                    <div>change /add education level</div>
                </div>
                <div class="plus">
                    +
                </div>
            </div>
            <div id="job1">
                <label for="job"
                       class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Education:') }}</label>
                <select id="job" name="profession"
                        class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg md:w-1/3 focus:ring-blue-500 focus:border-blue-500 text-center">
                    <option selected></option>
                    <option value="elementary school student" {{ $info->profession == 'elementary school student' ? 'selected' : '' }}>{{ __('messages.elementary school student') }}</option>
                    <option value="high school student" {{ $info->profession == 'high school student' ? 'selected' : '' }}>{{ __('messages.high school student') }} &nbsp;</option>
                    <option value="high school graduate" {{ $info->profession == 'high school graduate' ? 'selected' : '' }}>{{ __('messages.high school graduate') }} &nbsp;</option>
                    <option value="university student" {{ $info->profession == 'university student' ? 'selected' : '' }}>{{ __('messages.university student') }} &nbsp;</option>
                    <option value="university graduate" {{ $info->profession == 'university graduate' ? 'selected' : '' }}>{{ __('messages.university graduate') }} &nbsp;</option>

                </select>

            </div>

<br/>
            <button class="text-blue-500 border border-blue-500 p-1 md:p-4 rounded-lg pd editbtn editcity" type="submit">Edit city tags</button>
            <br/>
            <button class="bg-blue-500 text-white p-3 rounded-lg editbtn">
                Save and close
            </button>   </form>

    </div>
    <script>
        function decrement(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
                'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let value = Number(target.value);
            value--;
            if (value < 1) {
                value = 1;
            } else {
                target.value = value;
            }

        }

        function increment(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
                'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let value = Number(target.value);
            value++;
            target.value = value;
        }

        const decrementButtons = document.querySelectorAll(
            `button[data-action="decrement"]`
        );

        const incrementButtons = document.querySelectorAll(
            `button[data-action="increment"]`
        );

        decrementButtons.forEach(btn => {
            btn.addEventListener("click", decrement);
        });

        incrementButtons.forEach(btn => {
            btn.addEventListener("click", increment);
        });
    </script>
    <script>
        const toggleContainer1 = document.getElementById('toggleContainer1');

        toggleContainer1.addEventListener('click', function() {
            document.getElementById('email1').style.display = "block";
            document.getElementById('email1').style.display = "flex";
            toggleContainer1.style.display = "none";
        });
        const toggleContainer2 = document.getElementById('toggleContainer2');

        toggleContainer2.addEventListener('click', function() {
            document.getElementById('age1').style.display = "block";
            document.getElementById('age1').style.display = "flex";
            toggleContainer2.style.display = "none";
        });

        const toggleContainer3 = document.getElementById('toggleContainer3');

        toggleContainer3.addEventListener('click', function() {
            document.getElementById('gender1').style.display = "block";
            document.getElementById('gender1').style.display = "flex";
            toggleContainer3.style.display = "none";
        });
        const toggleContainer4 = document.getElementById('toggleContainer4');

        toggleContainer4.addEventListener('click', function() {
            document.getElementById('job1').style.display = "block";
            document.getElementById('job1').style.display = "flex";
            toggleContainer4.style.display = "none";
        });

    </script>

@endsection

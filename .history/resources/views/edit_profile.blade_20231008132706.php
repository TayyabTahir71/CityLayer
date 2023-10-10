@php use \App\Http\Controllers\GlobalController;
$info = GlobalController::myprofile();
@endphp

@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen p-6 lg:p-12">

        <a href="/profile">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>
        <div class="flex flex-col mx-auto">
            <div class="flex flex-col items-center pt-12 gap-x-6 lg:pt-20">
                <form action="avatar" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" id="image" class="hidden" accept="image/*"
                        onchange="javascript:this.form.submit();">
                    <label for="image" class="cursor-pointer relative">
                        <img class="object-cover rounded-full avatar_image"
                            src="/storage/uploads/avatar/{{ backpack_auth()->user()->avatar }}" alt="">
                        <div class="bg-black text-white  text-center plus_circle">+</div>
                    </label>
                    

                </form>
            </div>
        </div>
        <form action="save_profile" class="flex flex-col items-center justify-center p-8 mx-auto" method="POST">
            @csrf
           
            <div class="w-2/6">
                
                <div class="flex justify-between items-center" id="toggleContainer1">
                    <div class="sbox">
                        <div class="text">Email</div>
                        <div>change /add email</div>
                    </div>
                    <div class="plus bg-site">
                        +
                    </div>
                </div>

                <div id="email1">
                    <label for="email" class="block mb-2 text-gray-900 text">Email</label>
                    <input id="email" name="email" type="email" value="{{ backpack_auth()->user()->email }}"
                           class="inpW block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>

            </div>
            
            <br/>
            <div class="fbox" id="toggleContainer2">
                <div class="sbox">
                    <div class="text">Age</div>
                    <div>change /add age</div>
                </div>
                <div class="plus bg-site">
                    +
                </div>
            </div>
          <div id="age1">
              <label for="age" class="block mb-2 text-base font-medium text-gray-900">{{ __('messages.Age:') }}</label>
              <input type="number" name="age" style="-moz-appearance: textfield"
                     class="block w-2/3 px-4 py-3 mb-2 text-base text-gray-900 inpW placeholder-gray-400 border border-gray-600 rounded-lg md:w-1/3 focus:ring-blue-500 focus:border-blue-500 text-center"
                     name="custom-input-number" min="10" value="{{ $info->age }}">

          </div>
<br/>
            <div class="fbox" id="toggleContainer3">
                <div class="sbox">
                    <div class="text">Gender</div>
                    <div>change /add gender</div>
                </div>
                <div class="plus bg-site">
                    +
                </div>
            </div>
            <div id="gender1">
                <label for="gender" class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Gender:') }}</label>
                <select id="gender" name="gender"
                        class="block w-2/3 px-4 py-3 inpW text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg md:w-1/3 focus:ring-blue-500 focus:border-blue-500 text-center">
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
                <div class="plus bg-site ">
                    +
                </div>
            </div>
            <div id="job1">
                <label for="job"
                       class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Education:') }}</label>
                <select id="job" name="profession"
                        class="block w-2/3 px-4 py-3  inpW text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg md:w-1/3 focus:ring-blue-500 focus:border-blue-500 text-center">
                    <option selected></option>
                    <option value="elementary school student" {{ $info->profession == 'elementary school student' ? 'selected' : '' }}>{{ __('messages.elementary school student') }}</option>
                    <option value="high school student" {{ $info->profession == 'high school student' ? 'selected' : '' }}>{{ __('messages.high school student') }} &nbsp;</option>
                    <option value="high school graduate" {{ $info->profession == 'high school graduate' ? 'selected' : '' }}>{{ __('messages.high school graduate') }} &nbsp;</option>
                    <option value="university student" {{ $info->profession == 'university student' ? 'selected' : '' }}>{{ __('messages.university student') }} &nbsp;</option>
                    <option value="university graduate" {{ $info->profession == 'university graduate' ? 'selected' : '' }}>{{ __('messages.university graduate') }} &nbsp;</option>

                </select>

            </div>

<br/>
            <button class="font-bold color-site border-2 border-site px-8 py-4 font-bold	font-sm rounded-3xl" type="submit">Edit city tags</button>
            <br/>
            <button class="font-bold bg-site text-white border-2 border-site p-1 px-8 py-4 font-bold	font-sm rounded-3xl">
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

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
            <div class="mt-2 text-center">
                The data you input is entirely up to you, and all data is
                collected solely for statistical purposes.
            </div>
        </div>

        <form action="save_profile" class="flex flex-col items-center justify-center pt-8 mx-auto" method="POST">
            @csrf

            <div class="w-full lg:w-2/6">


                <div class="mb-4">
                    <div class="flex justify-between items-center" id="toggleContainer01">
                        <div class="sbox">
                            <div class="text">Name</div>
                            <div class="italic font-light">change /add name</div>
                        </div>
                        <div class="plus bg-site"> + </div>
                    </div>

                    <div id="name" class="hide">
                        <label for="name" class="block mb-2 text-gray-900 text">Name</label>
                        <input id="name" name="email" type="text" value="{{ backpack_auth()->user()->name }}"
                            class="inpW block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex justify-between items-center" id="toggleContainer1">
                        <div class="sbox">
                            <div class="text">Email</div>
                            <div class="italic font-light">change /add email</div>
                        </div>
                        <div class="plus bg-site"> + </div>
                    </div>

                    <div id="email1">
                        <label for="email" class="block mb-2 text-gray-900 text">Email</label>
                        <input id="email" name="email" type="email" value="{{ backpack_auth()->user()->email }}"
                            class="inpW block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex justify-between items-center" id="toggleContainer2">
                        <div class="sbox">
                            <div class="text">Age</div>
                            <div class="italic font-light">change /add age</div>
                        </div>
                        <div class="plus bg-site"> + </div>
                    </div>


                    <div id="age1">
                        <label for="age" class="block mb-2 text-gray-900 text">Age</label>
                        <input type="number" name="age" style="-moz-appearance: textfield"
                            class="block w-full px-4 py-3 mb-2 text-base text-gray-900 inpW placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            name="custom-input-number" min="10" value="{{ $info->age ?? '' }}">
                    </div>
                </div>

                <div class="mb-4">

                    <div class="flex justify-between items-center" id="toggleContainer3">
                        <div class="sbox">
                            <div class="text">Gender</div>
                            <div class="italic font-light">change /add gender</div>
                        </div>
                        <div class="plus bg-site">
                            +
                        </div>
                    </div>
                    <div id="gender1">
                        <label for="gender" class="block mb-2 text-gray-900 text">Gender</label>
                        <select id="gender" name="gender"
                            class="block w-full px-4 py-3 inpW text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            <option selected></option>
                            <option value="male" {{ $info->gender ?? '' == 'male' ? 'selected' : '' }}>
                                {{ __('messages.Male') }}
                            </option>
                            <option value="female" {{ $info->gender ?? '' == 'female' ? 'selected' : '' }}>
                                {{ __('messages.Female') }}</option>
                            <option value="other" {{ $info->gender ?? '' == 'other' ? 'selected' : '' }}>
                                {{ __('messages.Other') }}</option>
                        </select>
                    </div>

                </div>

                <div class="mb-4">

                    <div class="flex justify-between items-center" id="toggleContainer4">
                        <div class="sbox">
                            <div class="text">Education</div>
                            <div class="italic font-light">change /add education level</div>
                        </div>
                        <div class="plus bg-site ">
                            +
                        </div>
                    </div>
                    <div id="job1">
                        <label for="job" class="block mb-2 text-gray-900 text">Education</label>
                        <select id="job" name="profession"
                            class="block w-full px-4 py-3  inpW text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            <option selected></option>
                            <option value="elementary school student"
                                {{ $info->profession ?? '' == 'elementary school student' ? 'selected' : '' }}>
                                {{ __('messages.elementary school student') }}</option>
                            <option value="high school student"
                                {{ $info->profession ?? '' == 'high school student' ? 'selected' : '' }}>
                                {{ __('messages.high school student') }} &nbsp;</option>
                            <option value="high school graduate"
                                {{ $info->profession ?? '' == 'high school graduate' ? 'selected' : '' }}>
                                {{ __('messages.high school graduate') }} &nbsp;</option>
                            <option value="university student"
                                {{ $info->profession ?? '' == 'university student' ? 'selected' : '' }}>
                                {{ __('messages.university student') }} &nbsp;</option>
                            <option value="university graduate"
                                {{ $info->profession ?? '' == 'university graduate' ? 'selected' : '' }}>
                                {{ __('messages.university graduate') }} &nbsp;</option>

                        </select>

                    </div>

                </div>

            </div>







            <div class="mt-8 flex flex-col">
                <a href="/preferences" class="font-bold color-site border-2 border-site px-8 py-4 font-bold	font-sm rounded-3xl block mb-6 text-center">Edit city tags</a>
            
                <button class="font-bold bg-site text-white border-2 border-site p-1 px-8 py-4 font-bold	font-sm rounded-3xl block" type="submit">
                    Save and close
                </button> 
            </div>

        </form>

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
        const toggleContainer01 = document.getElementById('toggleContainer01');

        toggleContainer01.addEventListener('click', function() {
            document.getElementById('name').style.display = "block";
            toggleContainer01.style.display = "none";
        });
        
        const toggleContainer1 = document.getElementById('toggleContainer1');

        toggleContainer1.addEventListener('click', function() {
            document.getElementById('email1').style.display = "block";
            toggleContainer1.style.display = "none";
        });
        const toggleContainer2 = document.getElementById('toggleContainer2');

        toggleContainer2.addEventListener('click', function() {
            document.getElementById('age1').style.display = "block";
            toggleContainer2.style.display = "none";
        });

        const toggleContainer3 = document.getElementById('toggleContainer3');

        toggleContainer3.addEventListener('click', function() {
            document.getElementById('gender1').style.display = "block";
            toggleContainer3.style.display = "none";
        });
        const toggleContainer4 = document.getElementById('toggleContainer4');

        toggleContainer4.addEventListener('click', function() {
            document.getElementById('job1').style.display = "block";
            toggleContainer4.style.display = "none";
        });
    </script>
@endsection

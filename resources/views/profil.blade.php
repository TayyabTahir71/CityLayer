@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
        <form action="save_profile" class="flex flex-col items-center justify-center p-8 mx-auto" method="POST">
            {!! csrf_field() !!}
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-2/3">
                <div class="flex flex-col items-center justify-center pb-6">
                    <h1 class="text-3xl font-bold text-gray-900">{{ __('messages.Your Profile') }}</h1>
                </div>
            </label>

            <label for="age" class="block mb-2 text-base font-medium text-gray-900">{{ __('messages.Age:') }}</label>
             <div class="flex flex-row w-2/3 h-12 my-2 bg-transparent rounded-lg md:w-1/3">
                <button data-action="decrement" onclick="return false;"
                    class="w-20 h-full text-gray-600 bg-gray-300 border border-gray-500 rounded-l outline-none cursor-pointer active:bg-gray-200">
                    <span class="m-auto text-2xl font-thin">−</span>
                </button>
                <input type="number" name="age" style="-moz-appearance: textfield"
                    class="flex items-center w-full font-semibold text-center text-gray-700 outline-none outline focus:outline-none text-md hover:text-black focus:text-black md:text-basecursor-default"
                    name="custom-input-number" min="1" value="1">
                <button data-action="increment" onclick="return false;"
                    class="w-20 h-full text-gray-600 bg-gray-300 border border-gray-500 rounded-r cursor-pointer active:bg-gray-200">
                    <span class="m-auto text-2xl font-thin">+</span>
                </button>
            </div>

            <label for="gender"
                class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Gender:') }}</label>
            <select id="gender" name="gender"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
                <option value="male">{{ __('messages.Male') }}</option>
                <option value="female">{{ __('messages.Female') }}</option>
                <option value="other">{{ __('messages.Other') }}</option>
            </select>

            <label for="job"
                class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Professional/Education:') }}</label>
            <select id="job" name="profession"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
             <option value="school pupil" {{ $info->profession == 'school pupil' ? 'selected' : '' }}>{{ __('messages.school pupil') }}</option>
                <option value="high school student" {{ $info->profession == 'high school student' ? 'selected' : '' }}>{{ __('messages.high school student') }} &nbsp;</option>
                <option value="high school graduate" {{ $info->profession == 'high school graduate' ? 'selected' : '' }}>{{ __('messages.high school graduate') }} &nbsp;</option>
                <option value="university student" {{ $info->profession == 'university student' ? 'selected' : '' }}>{{ __('messages.university student') }} &nbsp;</option>
                <option value="university graduate" {{ $info->profession == 'university graduate' ? 'selected' : '' }}>{{ __('messages.university graduate') }} &nbsp;</option>
                <option value="teacher / professor" {{ $info->profession == 'teacher / professor' ? 'selected' : '' }}>{{ __('messages.teacher / professor') }} &nbsp;</option>
            </select>

            <label for="preferences"
                class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Preferences:') }}</label>
            <select id="preferences" name="preferences"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
                <option value="I enjoy long walks in the city">{{ __('messages.I enjoy long walks in the city') }}</option>
                <option value="I cycle to school / work">{{ __('messages.I cycle to school, work') }}</option>
                <option value="I enjoy urban photography">{{ __('messages.I enjoy urban photography') }}</option>
                <option value="I enjoy outdoor exercising">{{ __('messages.I enjoy outdoor exercising') }}</option>
                <option value="I usually meet with my friends in open spaces">
                    {{ __('messages.I usually meet with my friends in open spaces') }}</option>
                <option value="I like relaxing on the ground and read/eat">
                    {{ __('messages.I like relaxing on the ground and read/eat') }}</option>
                <option value="I move in a wheelchair">{{ __('messages.I move in a wheelchair') }}</option>
                <option value="I like skateboarding">{{ __('messages.I like skateboarding') }}</option>
                <option value="I walk to school/work">{{ __('messages.I walk to school/work') }}</option>
                <option value="I am an environmental activist">{{ __('messages.I am an environmental activist') }}</option>
                <option value="I practice yoga in the park">{{ __('messages.I practice yoga in the park') }}</option>
                <option value="I enjoy taking my dog to the park">{{ __('messages.I enjoy taking my dog to the park') }}
                </option>
                <option value="I can only exercise during the evening">
                    {{ __('messages.I can only exercise during the evening') }}</option>
                <option value="I enjoy being outside during night hours">
                    {{ __('messages.I enjoy being outside during night hours') }}</option>
                    <option value="I love long walks"  {{ $info->preferences == 'I love long walks' ? 'selected' : '' }}>{{ __('messages.I love long walks') }}</option>
                <option value="I enjoy outdoor sports and recreation" {{ $info->preferences == 'I enjoy outdoor sports and recreation' ? 'selected' : '' }}>{{ __('messages.I enjoy outdoor sports and recreation') }}</option>
<option value="I walk to school / work" {{ $info->preferences == 'I walk to school / work' ? 'selected' : '' }}>{{ __('messages.I walk to school / work') }}</option>
<option value="I cycle / scooter" {{ $info->preferences == 'I cycle / scooter' ? 'selected' : '' }}>{{ __('messages.I cycle / scooter') }}</option>
<option value="I love exploring new places" {{ $info->preferences == 'I love exploring new places' ? 'selected' : '' }}>{{ __('messages.I love exploring new places') }}</option>
<option value="I am interested in architecture and urban design" {{ $info->preferences == 'I am interested in architecture and urban design' ? 'selected' : '' }}>{{ __('messages.I am interested in architecture and urban design') }}</option>
<option value="I enjoy visiting historical landmarks and monuments" {{ $info->preferences == 'I enjoy visiting historical landmarks and monuments' ? 'selected' : '' }}>{{ __('messages.I enjoy visiting historical landmarks and monuments') }}</option>
<option value="I enjoy calm parks and nature" {{ $info->preferences == 'I enjoy calm parks and nature' ? 'selected' : '' }}>{{ __('messages.I enjoy calm parks and nature') }}</option>
<option value="I love pocket parks" {{ $info->preferences == 'I love pocket parks' ? 'selected' : '' }}>{{ __('messages.I love pocket parks') }}</option>
<option value="I enjoy gardening in urban spaces" {{ $info->preferences == 'I enjoy gardening in urban spaces' ? 'selected' : '' }}>{{ __('messages.I enjoy gardening in urban spaces') }}</option>
<option value="I enjoy lively and vibrant places" {{ $info->preferences == 'I enjoy lively and vibrant places' ? 'selected' : '' }}>{{ __('messages.I enjoy lively and vibrant places') }}</option>
<option value="I enjoy being outside in the evening" {{ $info->preferences == 'I enjoy being outside in the evening' ? 'selected' : '' }}>{{ __('messages.I enjoy being outside in the evening') }}</option>
<option value="I have difficulties walking" {{ $info->preferences == 'I have difficulties walking' ? 'selected' : '' }}>{{ __('messages.I have difficulties walking') }}</option>
<option value="I have issues with eyesight" {{ $info->preferences == 'I have issues with eyesight' ? 'selected' : '' }}>{{ __('messages.I have issues with eyesight') }}</option>
            </select>

            <button type="submit"
                class="px-8 py-5 mt-16 mb-2 text-sm font-bold text-center text-white bg-[#0CA789] rounded-full hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{ __('messages.Save Profile') }}</button>
        </form>

    </div>
    <div id="myModal" class="modal">
        <div class="flex flex-col items-center justify-center text-white modal-content">
            <h1 class="text-2xl italic font-extrabold text-center">
                {{ __('messages.Tell us about yourself and boost your account!') }}</h1>
            <h2 class="pt-4 text-xl italic font-semibold text-center">{{ __('messages.my avatar') }}</h2>
            <p class="text-center">{{ __('messages.-choose your avatar') }}</p>
            <h2 class="pt-4 text-xl italic font-semibold text-center">{{ __('messages.my email') }}</h2>
            <p class="text-center">{{ __('messages.-enter your email address') }}</p>
            <h2 class="pt-4 text-xl italic font-semibold text-center">{{ __('messages.my age') }}</h2>
            <p class="text-center">{{ __('messages.-enter your age') }}</p>
            <h2 class="pt-4 text-xl italic font-semibold text-center">{{ __('messages.my gender') }}</h2>
            <p class="text-center">{{ __('messages.male') }}</p>
            <p class="text-center">{{ __('messages.female') }}</p>
            <p class="text-center">{{ __('messages.other') }}</p>
            <h2 class="pt-4 text-xl italic font-semibold text-center">{{ __('messages.my education') }}</h2>
            <p class="text-center">{{ __('messages.-education level') }}</p>
            <h2 class="pt-4 text-xl italic font-semibold text-center">{{ __('messages.relationship with the city') }}</h2>
            <p class="text-center">{{ __('messages.-relations') }}</p>
            <h2 class="pt-4 text-xl italic font-semibold text-center">{{ __('messages.preferences') }}</h2>
            <p class="text-center">{{ __('messages.-personal preference') }}</p>
        </div>
    </div>



    <script>
        var modal = document.getElementById("myModal");

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {

            modal.style.display = "none";

        }

        modal.style.display = "block";

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
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: #0CA789;
        }
    </style>
@endsection

@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
        <form action="save_profile" class="flex flex-col items-center justify-center p-8 mx-auto" method="POST">
            {!! csrf_field() !!}
                     <label for="dropzone-file" class="flex flex-col items-center justify-center w-2/3 mb-8">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <h1 class="text-3xl font-bold text-gray-900">{{ __('messages.Your Profile') }}</h1>
                </div>
            </label>

            <label for="age" class="block mb-2 text-base font-medium text-gray-900">{{ __('messages.Age:') }}</label>
            <select id="age" name="age"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
                <option value="12">
                    < 12 {{ __('messages.years') }}</option>
                <option value="13-18">13-18 {{ __('messages.years') }}</option>
                <option value="19-35">19-35 {{ __('messages.years') }}</option>
                <option value="36-50">36-50 {{ __('messages.years') }}</option>
                <option value="51-70">51-70 {{ __('messages.years') }}</option>
                <option value="71">70+</option>
            </select>

            <label for="gender" class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Gender:') }}</label>
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
                <option value="Student">{{ __('messages.Student') }}</option>
                <option value="Teacher/Professor">{{ __('messages.Teacher/Professor') }} &nbsp;</option>
                <option value="Public Administrator">{{ __('messages.Public Administrator') }} &nbsp;</option>
                <option value="Engineer / Architect">{{ __('messages.Engineer/Architect') }} &nbsp;</option>
                <option value="Artist">{{ __('messages.Artist') }} &nbsp;</option>
                <option value="Public Utility">{{ __('messages.Public Utility') }} &nbsp;</option>
                <option value="Houseworker">{{ __('messages.Houseworker') }} &nbsp;</option>
                <option value="Retiree">{{ __('messages.Retiree') }} &nbsp;</option>
                <option value="Tourist">{{ __('messages.Tourist') }} &nbsp;</option>
                <option value="Entrepreneur">{{ __('messages.Entrepreneur') }} &nbsp;</option>
            </select>

            <label for="relation" class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Relation:') }}</label>
            <select id="relation" name="relation"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
                <option value="I normally work from home and spend most of my evenings outside">{{ __('messages.I normally work from home and spend most of my evenings outside') }}</option>
                <option value="I normally go out mainly on the weekend">{{ __('messages.I normally go out mainly on the weekend') }}</option>
                <option value="I commute to work/school and normally go home right after work">{{ __('messages.I commute to work/school and normally go home right after work') }}</option>
                <option value="I commute to work/school and normally stay out with friends/family ">{{ __('messages.I commute to work/school and normally stay out with friends/family') }} </option>
            </select>


            <label for="preferences" class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Preferences:') }}</label>
            <select id="preferences" name="preferences"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
                <option value="I enjoy long walks in the city">{{ __('messages.I enjoy long walks in the city') }}</option>
                <option value="I cycle to school / work">{{ __('messages.I cycle to school, work') }}</option>
                <option value="I enjoy urban photography">{{ __('messages.I enjoy urban photography') }}</option>
                <option value="I enjoy outdoor exercising">{{ __('messages.I enjoy outdoor exercising') }}</option>
                <option value="I usually meet with my friends in open spaces">{{ __('messages.I usually meet with my friends in open spaces') }}</option>
                <option value="I like relaxing on the ground and read/eat">{{ __('messages.I like relaxing on the ground and read/eat') }}</option>
                <option value="I move in a wheelchair">{{ __('messages.I move in a wheelchair') }}</option>
                <option value="I like skateboarding">{{ __('messages.I like skateboarding') }}</option>
                <option value="I walk to school/work">{{ __('messages.I walk to school/work') }}</option>
                <option value="I am an environmental activist">{{ __('messages.I am an environmental activist') }}</option>
                <option value="I practice yoga in the park">{{ __('messages.I practice yoga in the park') }}</option>
                <option value="I enjoy taking my dog to the park">{{ __('messages.I enjoy taking my dog to the park') }}</option>
                <option value="I can only exercise during the evening">{{ __('messages.I can only exercise during the evening') }}</option>
                <option value="I enjoy being outside during night hours">{{ __('messages.I enjoy being outside during night hours') }}</option>
            </select>

            <button type="submit"
                class="px-8 py-5 mt-16 mb-2 text-sm font-bold text-center text-white bg-[#0CA789] rounded-full hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{ __('messages.Save Profile') }}</button>
        </form>

    </div>
    <div id="myModal" class="modal">
        <div class="flex flex-col items-center justify-center text-white modal-content">
            <h1 class="text-2xl italic font-extrabold text-center">{{ __('messages.Tell us about yourself and boost your account!') }}</h1>
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

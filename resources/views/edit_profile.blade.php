@php use \App\Http\Controllers\GlobalController; 
$info = GlobalController::myprofile();
@endphp

@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
                 <div class="flex flex-row items-center pt-2">
                 <a href="profile" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a>
             </div>
        <form action="save_profile" class="flex flex-col items-center justify-center p-8 mx-auto" method="POST">
            {!! csrf_field() !!}
           <label for="dropzone-file" class="flex flex-col items-center justify-center w-2/3">
                <div class="flex flex-col items-center justify-center pb-6">
                    <h1 class="text-3xl font-bold text-gray-900">{{ __('messages.Your Profile') }}</h1>
                </div>
            </label>

            <label for="email" class="block mb-2 text-base font-medium text-gray-900">Email:</label>
            <input id="email" name="email" type="email" value="{{ $info->email }}"
                class="block w-2/3 md:w-1/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 mb-2">


            <label for="age" class="block mb-2 text-base font-medium text-gray-900">{{ __('messages.Age:') }}</label>
            <select id="age" name="age"
                class="block w-2/3 md:w-1/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
                <option value="12" {{ $info->age == '12' ? 'selected' : '' }}> < 12 {{ __('messages.years') }}</option>
                <option value="13-18" {{ $info->age == '13-18' ? 'selected' : '' }}>13-18 {{ __('messages.years') }}</option>
                <option value="19-35" {{ $info->age == '19-35' ? 'selected' : '' }}>19-35 {{ __('messages.years') }}</option>
                <option value="36-50" {{ $info->age == '36-50' ? 'selected' : '' }}>36-50 {{ __('messages.years') }}</option>
                <option value="51-70" {{ $info->age == '51-70' ? 'selected' : '' }}>51-70 {{ __('messages.years') }}</option>
                <option value="71" {{ $info->age == '71' ? 'selected' : '' }}>70+</option>
            </select>

            <label for="gender" class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Gender:') }}</label>
            <select id="gender" name="gender"
                class="block w-2/3 md:w-1/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
                <option value="male" {{ $info->gender == 'male' ? 'selected' : '' }}>{{ __('messages.Male') }}</option>
                <option value="female" {{ $info->gender == 'female' ? 'selected' : '' }}>{{ __('messages.Female') }}</option>
                <option value="other"  {{ $info->gender == 'other' ? 'selected' : '' }}>{{ __('messages.Other') }}</option>
            </select>

            <label for="job"
                class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Professional/Education:') }}</label>
            <select id="job" name="profession"
                class="block w-2/3 md:w-1/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
                <option value="Student" {{ $info->profession == 'Student' ? 'selected' : '' }}>{{ __('messages.Student') }}</option>
                <option value="Teacher/Professor" {{ $info->profession == 'Teacher/Professor' ? 'selected' : '' }}>{{ __('messages.Teacher/Professor') }} &nbsp;</option>
                <option value="Public Administrator" {{ $info->profession == 'Public Administrator' ? 'selected' : '' }}>{{ __('messages.Public Administrator') }} &nbsp;</option>
                <option value="Engineer / Architect" {{ $info->profession == 'Engineer / Architect' ? 'selected' : '' }}>{{ __('messages.Engineer/Architect') }} &nbsp;</option>
                <option value="Artist" {{ $info->profession == 'Artist' ? 'selected' : '' }}>{{ __('messages.Artist') }} &nbsp;</option>
                <option value="Public Utility" {{ $info->profession == 'Public Utility' ? 'selected' : '' }}>{{ __('messages.Public Utility') }} &nbsp;</option>
                <option value="Houseworker" {{ $info->profession == 'Houseworker' ? 'selected' : '' }}>{{ __('messages.Houseworker') }} &nbsp;</option>
                <option value="Retiree" {{ $info->profession == 'Retiree' ? 'selected' : '' }}>{{ __('messages.Retiree') }} &nbsp;</option>
                <option value="Tourist" {{ $info->profession == 'Tourist' ? 'selected' : '' }}>{{ __('messages.Tourist') }} &nbsp;</option>
                <option value="Entrepreneur" {{ $info->profession == 'Entrepreneur' ? 'selected' : '' }}>{{ __('messages.Entrepreneur') }} &nbsp;</option>
            </select>

            <label for="relation" class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Relation:') }}</label>
            <select id="relation" name="relation"
                class="block w-2/3 md:w-1/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
                <option value="I normally work from home and spend most of my evenings outside" {{ $info->relation == 'I normally work from home and spend most of my evenings outside' ? 'selected' : '' }}>{{ __('messages.I normally work from home and spend most of my evenings outside') }}</option>
                <option value="I normally go out mainly on the weekend"  {{ $info->relation == 'I normally go out mainly on the weekend' ? 'selected' : '' }}>{{ __('messages.I normally go out mainly on the weekend') }}</option>
                <option value="I commute to work/school and normally go home right after work" {{ $info->relation == 'I commute to work/school and normally go home right after work' ? 'selected' : '' }}>{{ __('messages.I commute to work/school and normally go home right after work') }}</option>
                <option value="I commute to work/school and normally stay out with friends/family" {{ $info->relation == 'I commute to work/school and normally stay out with friends/family' ? 'selected' : '' }}>{{ __('messages.I commute to work/school and normally stay out with friends/family') }} </option>
            </select>


            <label for="preferences" class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Preferences:') }}</label>
            <select id="preferences" name="preferences"
                class="block w-2/3 md:w-1/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
                <option value="I enjoy long walks in the city"  {{ $info->preferences == 'I enjoy long walks in the city' ? 'selected' : '' }}>{{ __('messages.I enjoy long walks in the city') }}</option>
                <option value="I cycle to school / work"  {{ $info->preferences == 'I cycle to school / work' ? 'selected' : '' }}>{{ __('messages.I cycle to school, work') }}</option>
                <option value="I enjoy urban photography"  {{ $info->preferences == 'I enjoy urban photography' ? 'selected' : '' }}>{{ __('messages.I enjoy urban photography') }}</option>
                <option value="I enjoy outdoor exercising"  {{ $info->preferences == 'I enjoy outdoor exercising' ? 'selected' : '' }}>{{ __('messages.I enjoy outdoor exercising') }}</option>
                <option value="I usually meet with my friends in open spaces"  {{ $info->preferences == 'I usually meet with my friends in open spaces' ? 'selected' : '' }}>{{ __('messages.I usually meet with my friends in open spaces') }}</option>
                <option value="I like relaxing on the ground and read/eat"  {{ $info->preferences == 'I like relaxing on the ground and read/eat' ? 'selected' : '' }}>{{ __('messages.I like relaxing on the ground and read/eat') }}</option>
                <option value="I move in a wheelchair"  {{ $info->preferences == 'I move in a wheelchair' ? 'selected' : '' }}>{{ __('messages.I move in a wheelchair') }}</option>
                <option value="I like skateboarding"  {{ $info->preferences == 'I like skateboarding' ? 'selected' : '' }}>{{ __('messages.I like skateboarding') }}</option>
                <option value="I walk to school/work"  {{ $info->preferences == 'I walk to school/work' ? 'selected' : '' }}>{{ __('messages.I walk to school/work') }}</option>
                <option value="I am an environmental activist"  {{ $info->preferences == 'I am an environmental activist' ? 'selected' : '' }}>{{ __('messages.I am an environmental activist') }}</option>
                <option value="I practice yoga in the park"  {{ $info->preferences == 'I practice yoga in the park' ? 'selected' : '' }}>{{ __('messages.I practice yoga in the park') }}</option>
                <option value="I enjoy taking my dog to the park"  {{ $info->preferences == 'I enjoy taking my dog to the park' ? 'selected' : '' }}>{{ __('messages.I enjoy taking my dog to the park') }}</option>
                <option value="I can only exercise during the evening"  {{ $info->preferences == 'I can only exercise during the evening' ? 'selected' : '' }}>{{ __('messages.I can only exercise during the evening') }}</option>
                <option value="I enjoy being outside during night hours"  {{ $info->preferences == 'I enjoy being outside during night hours' ? 'selected' : '' }}>{{ __('messages.I enjoy being outside during night hours') }}</option>
            </select>

            <button type="submit"
                class="px-8 py-5 mt-16 mb-2 text-sm font-bold text-center text-white bg-[#0CA789] rounded-full hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{ __('messages.Save Profile') }}</button>
        </form>

    </div>

@endsection

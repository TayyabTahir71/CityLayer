@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
        <div class="absolute inset-0 bg-gray-900 -z-10">

        </div>
        <form action="save_profile" class="flex flex-col items-center justify-center p-8 mx-auto" method="POST">
           {!! csrf_field() !!}
            <label for="dropzone-file"
                class="flex flex-col items-center justify-center w-2/3 mb-8 border-2 border-dashed rounded-lg">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <h1 class="text-base font-medium text-gray-100">Welcome to the<br> City Layer App</h1>
                </div>
                <input id="dropzone-file" type="file" class="hidden" />
            </label>

            <label for="age" class="block mb-2 text-base font-medium text-white">Age:</label>
            <select id="age" name="age"
                class="block w-1/3 px-4 py-3 text-base text-white placeholder-gray-400 bg-gray-700 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected>
                    < 12 years</option>
                <option value="US">13-18 years</option>
                <option value="CA">19-35 years</option>
                <option value="FR">36-50 years</option>
                <option value="DE">51-70 years</option>
                <option value="DE">70+</option>
            </select>

            <label for="gender" class="block pt-4 mb-2 text-base font-medium text-white">Gender:</label>
            <select id="gender" name="gender"
                class="block w-1/3 px-4 py-3 text-base text-white placeholder-gray-400 bg-gray-700 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected>Male</option>
                <option value="US">Female</option>
                <option value="CA">Other</option>
            </select>

            <label for="job" class="block pt-4 mb-2 text-base font-medium text-white">Professional/Education:</label>
            <select id="job" name="profession"
                class="block w-1/3 px-4 py-3 text-base text-white placeholder-gray-400 bg-gray-700 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option value="Student">Student</option>
                <option value="Teacher/Professor">Teacher/Professor &nbsp;</option>
                <option value="Public Administrator">Public Administrator &nbsp;</option>
                <option value="Engineer / Architect">Engineer/Architect &nbsp;</option>
                <option value="Artist">Artist &nbsp;</option>
                <option value="Public Utility">Public Utility &nbsp;</option>
                <option value="Houseworker">Houseworker &nbsp;</option>
                <option value="Retiree">Retiree &nbsp;</option>
                <option value="Tourist">Tourist &nbsp;</option>
                <option value="Entrepreneur">Entrepreneur &nbsp;</option>
            </select>

    <label for="relation" class="block pt-4 mb-2 text-base font-medium text-white">Relation:</label>
            <select id="relation" name="relation"
                class="block w-1/3 px-4 py-3 text-base text-white placeholder-gray-400 bg-gray-700 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected>Relation</option>
                <option value="US">dummy</option>
                <option value="CA">dummy</option>
            </select>


    <label for="preferences" class="block pt-4 mb-2 text-base font-medium text-white">Preferences:</label>
            <select id="preferences" name="preferences"
                class="block w-1/3 px-4 py-3 text-base text-white placeholder-gray-400 bg-gray-700 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected>preferences</option>
                <option value="US">dummy</option>
                <option value="CA">dummy</option>
            </select>

            <button type="submit"
                class="px-8 py-5 mt-16 mb-2 text-sm font-bold text-center text-white bg-green-700 rounded-full hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save
                Profile</button>
        </form>

    </div>

@endsection

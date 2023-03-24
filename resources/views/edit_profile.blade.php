@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
                 <div class="flex flex-row items-center pt-2">
                 <a href="profile" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a>
             </div>
        <form action="save_profile" class="flex flex-col items-center justify-center p-8 mx-auto" method="POST">
            {!! csrf_field() !!}
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-2/3 mb-8">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <h1 class="text-3xl font-bold text-gray-900">Your Profile</h1>
                </div>
            </label>

            <label for="age" class="block mb-2 text-base font-medium text-gray-900">Age:</label>
            <select id="age" name="age"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
                <option value="12">
                    < 12 years</option>
                <option value="13-18">13-18 years</option>
                <option value="19-35">19-35 years</option>
                <option value="36-50">36-50 years</option>
                <option value="51-70">51-70 years</option>
                <option value="71">70+</option>
            </select>

            <label for="gender" class="block pt-4 mb-2 text-base font-medium text-gray-900">Gender:</label>
            <select id="gender" name="gender"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <label for="job"
                class="block pt-4 mb-2 text-base font-medium text-gray-900">Professional/Education:</label>
            <select id="job" name="profession"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
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

            <label for="relation" class="block pt-4 mb-2 text-base font-medium text-gray-900">Relation:</label>
            <select id="relation" name="relation"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
                <option value="I normally work from home and spend most of my evenings outside">I normally work from home
                    and spend most of my evenings outside</option>
                <option value="I normally go out mainly on the weekend">I normally go out mainly on the weekend</option>
                <option value="I commute to work/school and normally go home right after work">I commute to work/school and
                    normally go home right after work</option>
                <option value="I commute to work/school and normally stay out with friends/family ">I commute to work/school
                    and normally stay out with friends/family </option>
            </select>


            <label for="preferences" class="block pt-4 mb-2 text-base font-medium text-gray-900">Preferences:</label>
            <select id="preferences" name="preferences"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected></option>
                <option value="I enjoy long walks in the city">I enjoy long walks in the city</option>
                <option value="I cycle to school / work">I cycle to school / work</option>
                <option value="I enjoy urban photography">I enjoy urban photography</option>
                <option value="I enjoy outdoor exercising">I enjoy outdoor exercising</option>
                <option value="I usually meet with my friends in open spaces">I usually meet with my friends in open spaces</option>
                <option value="I like relaxing on the ground and read/eat">I like relaxing on the ground and read/eat</option>
                <option value="I move in a wheelchair">I move in a wheelchair</option>
                <option value="I like skateboarding">I like skateboarding</option>
                <option value="I walk to school/work">I walk to school/work</option>
                <option value="I am an environmental activist">I am an environmental activist</option>
                <option value="I practice yoga in the park">I practice yoga in the park</option>
                <option value="I enjoy taking my dog to the park">I enjoy taking my dog to the park</option>
                <option value="I can only exercise during the evening">I can only exercise during the evening</option>
                <option value="I enjoy being outside during night hours">I enjoy being outside during night hours</option>
            </select>

            <button type="submit"
                class="px-8 py-5 mt-16 mb-2 text-sm font-bold text-center text-white bg-[#0CA789] rounded-full hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save
                Profile</button>
        </form>

    </div>
    <div id="myModal" class="modal">
        <div class="flex flex-col items-center justify-center text-white modal-content">
            <h1 class="text-2xl italic font-extrabold text-center">Tell us about yourself and boost your account!</h1>
            <h2 class="pt-4 text-xl italic font-semibold text-center">my avatar</h2>
            <p class="text-center">-choose your avatar</p>
            <h2 class="pt-4 text-xl italic font-semibold text-center">my email</h2>
            <p class="text-center">-enter your email address</p>
            <h2 class="pt-4 text-xl italic font-semibold text-center">my age</h2>
            <p class="text-center">-enter your age</p>
            <h2 class="pt-4 text-xl italic font-semibold text-center">my gender</h2>
            <p class="text-center">-male</p>
            <p class="text-center">-female</p>
            <p class="text-center">-other</p>
            <h2 class="pt-4 text-xl italic font-semibold text-center">my education</h2>
            <p class="text-center">-education level</p>
            <h2 class="pt-4 text-xl italic font-semibold text-center">relationship with the city</h2>
            <p class="text-center">-relations</p>
            <h2 class="pt-4 text-xl italic font-semibold text-center">preferences</h2>
            <p class="text-center">-personal preference</p>
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

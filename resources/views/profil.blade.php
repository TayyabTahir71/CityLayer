@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
        <form action="save_profile" class="flex flex-col items-center justify-center p-8 mx-auto" method="POST">
            {!! csrf_field() !!}
            <label for="dropzone-file"
                class="flex flex-col items-center justify-center w-2/3 mb-8">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <h1 class="text-3xl font-medium text-gray-900">Your Profile</h1>
                </div>
                <input id="dropzone-file" type="file" class="hidden" />
            </label>

            <label for="age" class="block mb-2 text-base font-medium text-gray-900">Age:</label>
            <select id="age" name="age"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected> -- </option>
                <option value="12"> < 12 years</option>
                <option value="13-18">13-18 years</option>
                <option value="19-35">19-35 years</option>
                <option value="36-50">36-50 years</option>
                <option value="51-70">51-70 years</option>
                <option value="71">70+</option>
            </select>

            <label for="gender" class="block pt-4 mb-2 text-base font-medium text-gray-900">Gender:</label>
            <select id="gender" name="gender"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                  <option selected> -- </option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <label for="job" class="block pt-4 mb-2 text-base font-medium text-gray-900">Professional/Education:</label>
            <select id="job" name="profession"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                  <option selected> -- </option>
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
                  <option selected> -- </option>
                <option value="US">dummy</option>
                <option value="CA">dummy</option>
            </select>


            <label for="preferences" class="block pt-4 mb-2 text-base font-medium text-gray-900">Preferences:</label>
            <select id="preferences" name="preferences"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option selected> -- </option>
                <option value="US">dummy</option>
                <option value="CA">dummy</option>
            </select>

            <button type="submit"
                class="px-8 py-5 mt-16 mb-2 text-sm font-bold text-center text-white bg-green-700 rounded-full hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save
                Profile</button>
        </form>

    </div>
    <div id="myModal" class="modal">
  <div class="text-black modal-content">
    Tell us about yourself and boost your account!
  </div>
</div>
    <script>
        var modal = document.getElementById("myModal");

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Show the modal when clicked
        modal.style.display = "block";
    </script>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: black;
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
        }
    </style>
@endsection

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

            <label for="email" class="block mb-2 text-base font-medium text-gray-900">Email:</label>
            <input id="email" name="email" type="email" value=""
                class="block w-2/3 px-4 py-3 mb-2 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg md:w-1/3 focus:ring-blue-500 focus:border-blue-500 text-center">


            <label for="age" class="block mb-2 text-base font-medium text-gray-900">{{ __('messages.Age:') }}</label>
                <input type="number" name="age" style="-moz-appearance: textfield"
                    class="block w-2/3 px-4 py-3 mb-2 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg md:w-1/3 focus:ring-blue-500 focus:border-blue-500 text-center"
                    name="custom-input-number" min="10" value="">

       

            <label for="gender" class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Gender:') }}</label>
            <select id="gender" name="gender"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg md:w-1/3 focus:ring-blue-500 focus:border-blue-500 text-center">
                <option selected></option>
                <option value="male" >{{ __('messages.Male') }}</option>
                <option value="female" >{{ __('messages.Female') }}</option>
                <option value="other"  >{{ __('messages.Other') }}</option>
            </select>

            <label for="job"
                class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Education:') }}</label>
            <select id="job" name="profession"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg md:w-1/3 focus:ring-blue-500 focus:border-blue-500 text-center">
                <option selected></option>
                <option value="school pupil" >{{ __('messages.school pupil') }}</option>
                <option value="high school student" >{{ __('messages.high school student') }} &nbsp;</option>
                <option value="high school graduate" >{{ __('messages.high school graduate') }} &nbsp;</option>
                <option value="university student" >{{ __('messages.university student') }} &nbsp;</option>
                <option value="university graduate" >{{ __('messages.university graduate') }} &nbsp;</option>
                <option value="teacher / professor" >{{ __('messages.teacher / professor') }} &nbsp;</option>
            </select>


          
            <button type="submit"
                class="px-8 py-5 mt-16 mb-2 text-sm font-bold text-center text-white bg-[#0CA789] rounded-full hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{ __('messages.Next') }}</button>
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
   
@endsection

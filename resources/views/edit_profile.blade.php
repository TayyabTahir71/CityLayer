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
            @csrf
            <input type="file" name="image" id="image" class="hidden" accept="image/*"
                   onchange="javascript:this.form.submit();">
            <label for="image" class="cursor-pointer ">
                <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full  " style="border-width: 7px"
                     src="/storage/uploads/avatar/{{ backpack_auth()->user()->avatar }}" alt="">
            </label>
           <label for="dropzone-file" class="flex flex-col items-center justify-center w-2/3">
                <div class="flex flex-col items-center justify-center pb-6">
                </div>
            </label>
            <div id="toggleContainer" class="w-1/2 flex flex-row gap-16">
           <div class="flex flex-col items-center justify-center pb-6 justify-start items-start" style="width: 58%">
               <div class="text-xl font-bold">Username</div>
               <div>change /add username</div>
           </div>
                <div class="bg-blue-500 text-white  flex items-center justify-center rounded-full text-3xl" style="height: 39px;width: 38px">+</div>
            </div>
<br/>
            <div id="toggleContainer1" class="w-1/2 flex flex-row gap-16">
           <div class="flex flex-col items-center justify-center pb-6 justify-start items-start" style="width: 58%">
               <div class="text-xl font-bold">Email</div>
               <div>change /add email</div>
           </div>
                <div class="bg-blue-500 text-white  flex items-center justify-center rounded-full text-3xl" style="height: 39px;width: 38px">+</div>
            </div>
            <br/>
            <div id="toggleContainer1" class="w-1/2 flex flex-row gap-16">
           <div class="flex flex-col items-center justify-center pb-6 justify-start items-start" style="width: 58%">
               <div class="text-xl font-bold">Age</div>
               <div>change /add age</div>
           </div>
                <div class="bg-blue-500 text-white  flex items-center justify-center rounded-full text-3xl" style="height: 39px;width: 38px">+</div>
            </div>
            <br/>
            <div id="toggleContainer1" class="w-1/2 flex flex-row gap-16">
           <div class="flex flex-col items-center justify-center pb-6 justify-start items-start" style="width: 58%">
               <div class="text-xl font-bold">Gender</div>
               <div>change /add gender</div>
           </div>
                <div class="bg-blue-500 text-white  flex items-center justify-center rounded-full text-3xl" style="height: 39px;width: 38px">+</div>
            </div>
            <br/>
            <div id="toggleContainer1" class="w-1/2 flex flex-row gap-16">
           <div class="flex flex-col items-center justify-center pb-6 justify-start items-start" style="width: 58%">
               <div class="text-xl font-bold">Education</div>
               <div>change /add education level</div>
           </div>
                <div class="bg-blue-500 text-white  flex items-center justify-center rounded-full text-3xl" style="height: 39px;width: 38px">+</div>
            </div>
            <br/>
                <button class="text-blue-500 border border-blue-500 p-1 md:p-4 rounded-lg">Edit city tags</button>
<br/>
            <button class="bg-blue-500 text-white p-3 rounded-lg">
                 Save and close
            </button>



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
        const toggleContainer = document.getElementById('toggleContainer');

        toggleContainer.addEventListener('click', function() {
            // Create an input element
            const inputElement = document.createElement('input');
            inputElement.setAttribute('type', 'text');
            inputElement.setAttribute('value', toggleContainer.textContent);
            inputElement.classList.add('w-60', 'p-2', 'border', 'rounded');


            // Replace the div with the input
            toggleContainer.replaceWith(inputElement);

            // Focus on the input
            inputElement.focus();

            const toggleContainer1 = document.getElementById('toggleContainer1');

        toggleContainer1.addEventListener('click', function() {
            // Create an input element
            const inputElement = document.createElement('input');
            inputElement.setAttribute('type', 'text');
            inputElement.setAttribute('value', toggleContainer1.textContent);
            inputElement.classList.add('w-60', 'p-2', 'border', 'rounded');


            // Replace the div with the input
            toggleContainer.replaceWith(inputElement);

            // Focus on the input
            inputElement.focus();
        });
            // Event listener to toggle back to div when clicking outside the input

        });
    </script>


@endsection

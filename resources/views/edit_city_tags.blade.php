@php use \App\Http\Controllers\GlobalController;
$info = GlobalController::myprofile();
@endphp

@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">

        <div class="flex flex-row items-center pt-2">
            <a href="profile" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a>
        </div>
        <form action="save_profile" class="flex flex-col  justify-center p-8 mx-auto" method="POST">
            {!! csrf_field() !!}
            @csrf
            <input type="file" name="image" id="image" class="hidden" accept="image/*"
                   onchange="javascript:this.form.submit();">
            <label for="image" class="cursor-pointer ml" >
                <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full  " style="border-width: 7px"
                     src="/storage/uploads/avatar/{{ backpack_auth()->user()->avatar }}" alt="">
            </label>
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-2/3 ">
                <div class="flex flex-col items-center justify-center pb-6">
                </div>
            </label>
            <div class="ml-c flex-r">
                <div class="bl">Edit city tags</div>
                <div class="i">i</div>
            </div>
            <br/>
            <input placeholder="Browse or add new city tags" class="inp ">
            <br/>
            <div class="flex flex-row items-center justify-center">
                <div class="flex flex-row items-center justify-center   gap-4 w51" >

                    <button class="bg-yellow-400 w-1/2 rounded-md p-3">1</button>
                    <button class="bg-yellow-400 w-1/2 rounded-md p-3">2</button>
                </div>
            </div>
            <br/>
            <div class="flex flex-row items-center justify-center">
                <div class="flex flex-row items-center justify-center  w-1/2 gap-8">
                    <button class="bg-yellow-400 w-1/2 rounded-md p-3" style="width:100%">3</button>
                </div>
            </div>
            <br/>
            <div class="flex flex-row items-center justify-center">
                <div class="flex flex-row items-center justify-center  w-1/2 gap-4">
                    <button class="bg-yellow-400 w-1/2 rounded-md p-3" style="width:62%">4</button>
                    <button class="bg-yellow-400 w-1/3 rounded-md p-3">5</button>
                </div>
            </div><br/>
            <div class="flex flex-row items-center justify-center">
                <div class="flex flex-row items-center justify-center  w-1/2 gap-4">
                    <button class="bg-yellow-400 w-1/3 rounded-md p-3" style="width: 46%">6</button>
                    <button class="bg-yellow-400 w-1/2 rounded-md p-3">7</button>
                </div>
            </div>
            <br/>
            <div class="flex-r items-center justify-center">
                <button class="text-blue-500 border border-blue-500 p-3  rounded-lg">Back</button>
                <button class="bg-blue-500 text-white p-3 rounded-lg">Save and close</button>
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

@php use \App\Http\Controllers\GlobalController;
$info = GlobalController::myprofile();
@endphp

@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
        <a href="javascript:history.back()">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>
        <form action="save_profile" class="flex flex-col  justify-center p-8 mx-auto" method="POST">
            {!! csrf_field() !!}
            @csrf
            <input type="file" name="image" id="image" class="hidden" accept="image/*"
                   onchange="javascript:this.form.submit();">
            <label for="image" class="cursor-pointer new" >
                <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full  " style="border-width: 7px"
                     src="{{asset('images/iconfinder_avatar_boy_kid_person_4043238.svg')}}" alt="">
            </label>
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-2/3 ">
                <div class="flex flex-col items-center justify-center pb-6">
                </div>
            </label>
            <div class="flex-r">
                <div class="bl">Edit city tags</div>
                <div class="i">i</div>
            </div>
            <br/>
            <input placeholder="Browse or add new city tags" class="inp1">
            <br/>
            <div class="fb">
                <div class="flex flex-row items-center justify-center">
                    <div class="flex flex-row items-center justify-center  w90 gap5 w45">

                        <button class="bg-yel w-1/2 border-ms p5">1</button>
                        <button class="bg-yel w-1/2 border-ms p5">2</button>
                    </div>
                </div>

                <div class="flex flex-row items-center justify-center">
                    <div class="flex flex-row items-center justify-center  w90 gap-8 w45">
                        <button class="bg-yel w-1/2 border-ms p5" style="width:100%">3</button>
                    </div>
                </div>

                <div class="flex flex-row items-center justify-center">
                    <div class="flex flex-row items-center justify-center  w90 gap5 w45">
                        <button class="bg-yel w-1/2 border-ms p5" style="width:76%">4</button>
                        <button class="bg-yel w-1/3 border-ms p5">5</button>
                    </div>
                </div>

                <div class="flex flex-row items-center justify-center">
                    <div class="flex flex-row items-center justify-center  w90 gap5 w45">
                        <button class="bg-yel w-1/3 rounded-md p5" style="width: 46%">6</button>
                        <button class="bg-yel w-1/2 rounded-md p5 w-89">7</button>
                    </div>
                </div>
            </div>


            <br/>
            <br/>
            <div class="flex-r items-center justify-center">
                <button class="bg-blue-500 text-white p-3 rounded-lg backbtn">Back</button>
                <button class="text-blue-500 border border-blue-500 p-3   rounded-lg backbtn">Save and close</button>
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

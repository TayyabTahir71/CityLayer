@php use \App\Http\Controllers\GlobalController;
$info = GlobalController::myprofile();
@endphp

@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">

        <a href="javascript:history.back()">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>
        <form action="save_profile" class="flex flex-col items-center justify-center p-8 mx-auto" method="POST">
            {!! csrf_field() !!}
            @csrf
            <input type="file" name="image" id="image" class="hidden" accept="image/*"
                   onchange="javascript:this.form.submit();">
            <label for="image" class="cursor-pointer ">
                <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full  " style="border-width: 7px"
                     src="{{asset('img/avatar.png')}}" alt="">
            </label>
           <label for="dropzone-file" class="flex flex-col items-center justify-center w-2/3">
                <div class="flex flex-col items-center justify-center pb-6">
                </div>
            </label>
            <div class="fbox" id="toggleContainer">
<div class="sbox">
    <div class="text">Username</div>
    <div>change /add username</div>
</div>
                <div class="plus">
                    +
                </div>
            </div>

<br/>
            <div class="fbox" id="toggleContainer1">
                <div class="sbox">
                    <div class="text">Email</div>
                    <div>change /add email</div>
                </div>
                <div class="plus">
                    +
                </div>
            </div>
            <br/>
            <div class="fbox" id="toggleContainer2">
                <div class="sbox">
                    <div class="text">Age</div>
                    <div>change /add age</div>
                </div>
                <div class="plus">
                    +
                </div>
            </div>
            <br/>
            <div class="fbox" id="toggleContainer3">
                <div class="sbox">
                    <div class="text">Gender</div>
                    <div>change /add gender</div>
                </div>
                <div class="plus">
                    +
                </div>
            </div>
            <br/>
            <div class="fbox" id="toggleContainer4">
                <div class="sbox">
                    <div class="text">Education</div>
                    <div>change /add education level</div>
                </div>
                <div class="plus">
                    +
                </div>
            </div>
            <br/>
                <button class="text-blue-500 border border-blue-500 p-1 md:p-4 rounded-lg pd editbtn editcity">Edit city tags</button>
<br/>
            <button class="bg-blue-500 text-white p-3 rounded-lg editbtn">
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
            const inputElement = document.createElement('input');
            inputElement.setAttribute('type', 'text');
            inputElement.classList.add('fuulwd', 'p-2', 'border', 'rounded');
            inputElement.setAttribute('placeholder', 'Enter your Username');
            toggleContainer.replaceWith(inputElement);
            inputElement.focus();
        });
        const toggleContainer1 = document.getElementById('toggleContainer1');

        toggleContainer1.addEventListener('click', function() {
            // Create the input element
            const inputElement1 = document.createElement('input');
            inputElement1.setAttribute('type', 'text');
            inputElement1.classList.add('fuulwd', 'p-2', 'border', 'rounded');
            inputElement1.setAttribute('placeholder', 'Enter your email');
            inputElement1.id = 'toggleInput1';


            // Replace toggleContainer1 with the input and label
            toggleContainer1.replaceWith(inputElement1);

            // Focus on the input
            inputElement1.focus();
        });


        const toggleContainer2 = document.getElementById('toggleContainer2');

        toggleContainer2.addEventListener('click', function() {
            const inputElement2 = document.createElement('input');
            inputElement2.setAttribute('type', 'text');
            inputElement2.classList.add('fuulwd', 'p-2', 'border', 'rounded');
            inputElement2.setAttribute('placeholder', 'Enter your Age');
            toggleContainer2.replaceWith(inputElement2);
            inputElement2.focus();
        });
        const toggleContainer3 = document.getElementById('toggleContainer3');

        toggleContainer3.addEventListener('click', function() {
            const inputElement3 = document.createElement('input');
            inputElement3.setAttribute('type', 'text');
            inputElement3.classList.add('fuulwd', 'p-2', 'border', 'rounded');
            inputElement3.setAttribute('placeholder', 'Enter your Gender');
            toggleContainer3.replaceWith(inputElement3);
            inputElement3.focus();
        });

        const toggleContainer4 = document.getElementById('toggleContainer4');
        toggleContainer4.addEventListener('click', function() {
            const inputElement4 = document.createElement('input');
            inputElement4.setAttribute('type', 'text');
            inputElement4.classList.add('fuulwd', 'p-2', 'border', 'rounded');
            inputElement4.setAttribute('placeholder', 'Enter your Education');
            toggleContainer4.replaceWith(inputElement4);
            inputElement4.focus();
        });
    </script>


@endsection

@extends('layouts.app')

@section('main')
    {{-- <div class="relative">
        <div class="absolute top-0 z-50 right-4">
            <div class="px-6 py-4 text-black border border-black rounded-full">
                About
            </div>
        </div>
    </div> --}}

    <div data-barba="container " class="relative ">
        <div class="absolute top-0 z-50 -mt-2 right-7">
            <a href="/about" class="px-6 py-4 text-black border border-black rounded-full">
                About
            </a>
        </div>
        <div class="flex flex-col items-center justify-center mt-8">

            @include('authTop')



            <section class="mb-4" x-data="{ tab: 'username' }">


                <form role="form" method="POST" action="{{ route('backpack.auth.login') }}">
                    {!! csrf_field() !!}
                    <div class="flex flex-col items-center justify-center gap-4 mt-8" x-show="tab==='username'">
                        <input type="text" placeholder="Username" name="name" id="name" class="form-input"
                            required />
                        <button type="button" class="cursor-pointer btn btn-primary" @click="tab='password'">
                            <div class="text-center"> Next</div>

                        </button>
                    </div>



                    <div class="flex flex-col items-center justify-center gap-4 mt-12" x-show="tab==='password'">
                        <input type="password" placeholder="Password" name="password" id="password" class="form-input"
                            required />
                        <button type="submit" class="cursor-pointer btn btn-primary">
                            <div class="text-center"> Login</div>

                        </button>
                    </div>
                </form>


            </section>



        </div>


    </div>
@endsection
@push('scripts')
    <script>
        $('.mysilder').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,

        });
    </script>
@endpush

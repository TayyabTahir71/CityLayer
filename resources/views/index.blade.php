@extends('layouts.app')

@section('main')
    <div data-barba="container" class="">

        <div class="flex flex-col items-center justify-center mt-8">

            @include('authTop')


            <section class="mt-8" x-data="{ tab: 'get_started' }">

                <div class="flex flex-col items-center justify-center gap-4" x-show="tab=='get_started'">
                    <button @click="tab='login_optns'" class="cursor-pointer btn btn-primary">
                        <div class="text-center">Get Started</div>

                    </button>
                    <a href="/login" class="cursor-pointer btn btn-secondary">
                        <div class="text-center">Login</div>
                    </a>

                    <p class="mt-2 text-center px-7">
                        By Confirming you agree with 'City Layer' <span class="text-blue-500">Privacy Policy</span> and
                        <span class="text-blue-500">Terms of Service.</span>
                    </p>
                </div>

                <div class="flex flex-col items-center justify-center gap-4" x-show="tab=='login_optns'">


                    <a href="/signup/username" class="cursor-pointer btn btn-primary" @click="opt='username'">
                        <div class="text-center">Sign up with username</div>

                    </a>
                    <a href="/signup/email" class="cursor-pointer btn btn-primary" @click="opt='email'">
                        <div class="text-center">Sign up with email</div>

                    </a>




                    <a href="/signup/later" class="cursor-pointer my-2 btn btn-secondary">
                        <div class="text-center">Sign up later</div>
                    </a>
                </div>

                {{-- <div class="flex flex-col items-center justify-center gap-4" x-show=" opt==='username'">
                        <form role="form" method="POST" action="{{ route('backpack.auth.login') }}">
                            {!! csrf_field() !!}
                            <div class="flex flex-col items-center justify-center gap-4 mt-12" x-show="tab==='username'">
                                <input type="text" placeholder="Username" name="name" id="name"
                                    class="form-input" required />
                                <button type="button" class="cursor-pointer btn btn-primary" @click="tab='password'">
                                    <div class="text-center"> Next</div>

                                </button>
                            </div>



                            <div class="flex flex-col items-center justify-center gap-4 mt-12" x-show="tab==='password'">
                                <input type="password" placeholder="Password" name="password" id="password"
                                    class="form-input" required />
                                <button type="submit" class="cursor-pointer btn btn-primary">
                                    <div class="text-center"> Login</div>

                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-4" x-show=" opt==='email'">

                        <form role="form" method="POST" action="{{ route('backpack.auth.login') }}">
                            {!! csrf_field() !!}
                            <div class="flex flex-col items-center justify-center gap-4 mt-12" x-show="tab==='username'">
                                <input type="text" placeholder="Username" name="name" id="name"
                                    class="form-input" required />
                                <button type="button" class="cursor-pointer btn btn-primary" @click="tab='password'">
                                    <div class="text-center"> Next</div>

                                </button>
                            </div>



                            <div class="flex flex-col items-center justify-center gap-4 mt-12" x-show="tab==='password'">
                                <input type="password" placeholder="Password" name="password" id="password"
                                    class="form-input" required />
                                <button type="submit" class="cursor-pointer btn btn-primary">
                                    <div class="text-center"> Login</div>

                                </button>
                            </div>
                        </form>
                    </div> --}}






            </section>


        </div>


    </div>
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
@endsection

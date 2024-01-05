@extends('layouts.app')

@section('main')
    <div data-barba="container" class="">

        <div class="flex flex-col items-center justify-center mt-8">

            @include('authTop')




            <section class="">


                <form role="form" method="POST" action="{{ route('auth.register.username') }}">
                    {!! csrf_field() !!}
                    <div class="flex flex-col items-center justify-center gap-4 mt-8">
                        <div>
                            <input type="text" placeholder="Username" name="name" value="{{old('name')}}" id="name" class="form-input"
                            required />
                            @if ($errors->has('name'))
                                <div class="text-red-500">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        
                        <div>
                            <input type="password" placeholder="Password" name="password" id="password" class="form-input"
                            required />
                            @if ($errors->has('password'))
                                <div class="text-red-500">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        
                        <div>
                            <input type="password" placeholder="Confirm Password" name="password_confirmation"
                            id="password_confirmation" class="form-input" required />
                            @if ($errors->has('password_confirmation'))
                                <div class="text-red-500">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </div>

                        <button type="submit" class="mb-3 cursor-pointer btn btn-primary">
                            <div class="text-center"> Signup</div>

                        </button>
                    </div>


                </form>


            </section>


            {{-- <p class="mt-4 text-center px-7">
            By Confirming you agree with 'City Layer' <span class="text-blue-500">Privacy Policy</span> and <span class="text-blue-500">Terms of Service.</span>
        </p> --}}

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

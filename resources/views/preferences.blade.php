@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
     <div class="flex flex-row items-center pt-2">
                <a href="profile" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a>
            </div>
      
        <form action="save_preferences" class="flex flex-col items-center justify-center p-8 mx-auto" method="POST">
            {!! csrf_field() !!}
           
            <div class="flex flex-col items-center justify-center">
                <h1 class="pt-2 mx-8 text-2xl font-bold text-center text-gray-900">
                    {{ __('messages.Preferences:') }}</h1>
                <div class="pt-8">
              
                 @php 
                 if ($preferences == null) {
                     $preference = [];}
                    else {
                          $preference = json_decode($preferences);
                    }
                 @endphp
                    <label>
                        <input type="checkbox" name="preferences[]" value="I love long walks" {{ in_array("I love long walks", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">

                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I love long walks') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I walk to school / work" {{ in_array("I walk to school / work", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">

                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I walk to school / work') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I am in a wheelchair"  {{ in_array("I am in a wheelchair", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I am in a wheelchair') }}</div>
                            </div>
                        </div>
                    </label>


                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy outdoor sports"  {{ in_array("I enjoy outdoor sports", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I enjoy outdoor sports') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I walk to school or work"  {{ in_array("I walk to school or work", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I walk to school / work') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I cycle / scooter"  {{ in_array("I cycle / scooter", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I cycle / scooter') }}</div>
                            </div>
                        </div>
                    </label>

                                      <label>
                        <input type="checkbox" name="preferences[]" value="I mostly travel by car"  {{ in_array("I mostly travel by car", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I mostly travel by car') }}</div>
                            </div>
                        </div>
                    </label>

                                      <label>
                        <input type="checkbox" name="preferences[]" value="I mostly travel by public transport"  {{ in_array("I mostly travel by public transport", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I mostly travel by public transport') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I love exploring new places"  {{ in_array("I love exploring new places", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I love exploring new places') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]"
                            value="I am interested in architecture"  {{ in_array("I am interested in architecture", $preference) ? "checked" : "" }}
                             class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">
                                    {{ __('messages.I am interested in architecture') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]"
                            value="I enjoy visiting historical landmarks"  {{ in_array("I enjoy visiting historical landmarks", $preference) ? "checked" : "" }}
                             class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">
                                    {{ __('messages.I enjoy visiting historical landmarks') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy calm parks and nature"  {{ in_array("I enjoy calm parks and nature", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I enjoy calm parks and nature') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I love pocket parks"  {{ in_array("I love pocket parks", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I love pocket parks') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy gardening in urban spaces"  {{ in_array("I enjoy gardening in urban spaces", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I enjoy gardening in urban spaces') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy lively and vibrant places"  {{ in_array("I enjoy lively and vibrant places", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I enjoy lively and vibrant places') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy being outside in the night"  {{ in_array("I enjoy being outside in the night", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I enjoy being outside in the night') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I have difficulties walking"  {{ in_array("I have difficulties walking", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I have difficulties walking') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I have issues with eyesight"  {{ in_array("I have issues with eyesight", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I have issues with eyesight') }}</div>
                            </div>
                        </div>
                    </label>



                    <div class="flex justify-center">
                        <button type="submit"
                            class="px-8 py-5 mt-8 mb-2 text-sm font-bold text-center text-white bg-[#0CA789] rounded-full hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300">{{ __('messages.Save Profile') }}</button>
                    </div>
        </form>
    </div>
 


    <script></script>
@endsection

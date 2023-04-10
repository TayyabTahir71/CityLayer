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
                        <input type="checkbox" name="preferences[]" value="I enjoy long walks in the city" {{ in_array("I enjoy long walks in the city", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">

                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I enjoy long walks in the city') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I cycle to school or work" {{ in_array("I cycle to school or work", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">

                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I cycle to school or work') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy urban photography" {{ in_array("I enjoy urban photography", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I enjoy urban photography') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy outdoor exercising"  {{ in_array("I enjoy outdoor exercising", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I enjoy outdoor exercising') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I usually meet with my friends in open spaces" {{ in_array("I usually meet with my friends in open spaces", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">
                                    {{ __('messages.I usually meet with my friends in open spaces') }}
                                </div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I like relaxing on the ground and read, eat"  {{ in_array("I like relaxing on the ground and read, eat", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I like relaxing on the ground and read, eat') }}
                                </div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I move in a wheelchair"  {{ in_array("I move in a wheelchair", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I move in a wheelchair') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I like skateboarding"  {{ in_array("I like skateboarding", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I like skateboarding') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy outdoor sports and recreation"  {{ in_array("I enjoy outdoor sports and recreation", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I enjoy outdoor sports and recreation') }}</div>
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
                        <input type="checkbox" name="preferences[]" value="I cycle or scooter"  {{ in_array("I cycle or scooter", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I cycle / scooter') }}</div>
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
                            value="I am interested in architecture and urban design"  {{ in_array("I am interested in architecture and urban design", $preference) ? "checked" : "" }}
                             class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">
                                    {{ __('messages.I am interested in architecture and urban design') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]"
                            value="I enjoy visiting historical landmarks and monuments"  {{ in_array("I enjoy visiting historical landmarks and monuments", $preference) ? "checked" : "" }}
                             class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">
                                    {{ __('messages.I enjoy visiting historical landmarks and monuments') }}</div>
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
                        <input type="checkbox" name="preferences[]" value="I enjoy being outside in the evening"  {{ in_array("I enjoy being outside in the evening", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center">
                                <div class="font-semibold">{{ __('messages.I enjoy being outside in the evening') }}</div>
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
                            class="px-8 py-5 mt-8 mb-2 text-sm font-bold text-center text-white bg-[#0CA789] rounded-full hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 bg-green-600 hover:bg-green-700 focus:ring-green-800">{{ __('messages.Save Profile') }}</button>
                    </div>
        </form>
    </div>
 


    <script></script>
@endsection

@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
        <form action="save_preferences" class="flex flex-col items-center justify-center p-8 mx-auto" method="POST">
            {!! csrf_field() !!}
            <label for="preferences"
                class="block pt-4 mb-2 text-base font-medium text-gray-900">{{ __('messages.Preferences:') }}</label>
            <select id="preferences" name="preferences[]"
                class="block w-2/3 px-4 py-3 text-base text-gray-900 placeholder-gray-400 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500" multiple>
                <option selected></option>
                <option value="I enjoy long walks in the city">{{ __('messages.I enjoy long walks in the city') }}</option>
                <option value="I cycle to school / work">{{ __('messages.I cycle to school, work') }}</option>
                <option value="I enjoy urban photography">{{ __('messages.I enjoy urban photography') }}</option>
                <option value="I enjoy outdoor exercising">{{ __('messages.I enjoy outdoor exercising') }}</option>
                <option value="I usually meet with my friends in open spaces">
                    {{ __('messages.I usually meet with my friends in open spaces') }}</option>
                <option value="I like relaxing on the ground and read/eat">
                    {{ __('messages.I like relaxing on the ground and read/eat') }}</option>
                <option value="I move in a wheelchair">{{ __('messages.I move in a wheelchair') }}</option>
                <option value="I like skateboarding">{{ __('messages.I like skateboarding') }}</option>
                <option value="I walk to school/work">{{ __('messages.I walk to school/work') }}</option>
                <option value="I am an environmental activist">{{ __('messages.I am an environmental activist') }}</option>
                <option value="I practice yoga in the park">{{ __('messages.I practice yoga in the park') }}</option>
                <option value="I enjoy taking my dog to the park">{{ __('messages.I enjoy taking my dog to the park') }}
                </option>
                <option value="I can only exercise during the evening">
                    {{ __('messages.I can only exercise during the evening') }}</option>
                <option value="I enjoy being outside during night hours">
                    {{ __('messages.I enjoy being outside during night hours') }}</option>
                    <option value="I love long walks">{{ __('messages.I love long walks') }}</option>
                <option value="I enjoy outdoor sports and recreation">{{ __('messages.I enjoy outdoor sports and recreation') }}</option>
<option value="I walk to school / work">{{ __('messages.I walk to school / work') }}</option>
<option value="I cycle / scooter">{{ __('messages.I cycle / scooter') }}</option>
<option value="I love exploring new places">{{ __('messages.I love exploring new places') }}</option>
<option value="I am interested in architecture and urban design">{{ __('messages.I am interested in architecture and urban design') }}</option>
<option value="I enjoy visiting historical landmarks and monuments">{{ __('messages.I enjoy visiting historical landmarks and monuments') }}</option>
<option value="I enjoy calm parks and nature" >{{ __('messages.I enjoy calm parks and nature') }}</option>
<option value="I love pocket parks">{{ __('messages.I love pocket parks') }}</option>
<option value="I enjoy gardening in urban spaces" >{{ __('messages.I enjoy gardening in urban spaces') }}</option>
<option value="I enjoy lively and vibrant places" >{{ __('messages.I enjoy lively and vibrant places') }}</option>
<option value="I enjoy being outside in the evening" >{{ __('messages.I enjoy being outside in the evening') }}</option>
<option value="I have difficulties walking" >{{ __('messages.I have difficulties walking') }}</option>
<option value="I have issues with eyesight" >{{ __('messages.I have issues with eyesight') }}</option>
            </select>

            <button type="submit"
                class="px-8 py-5 mt-16 mb-2 text-sm font-bold text-center text-white bg-[#0CA789] rounded-full hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{ __('messages.Save Profile') }}</button>
        </form>

    </div>


    <script>

      
    </script>
 
@endsection

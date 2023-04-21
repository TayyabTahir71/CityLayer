@extends('layouts.app')

@section('main')
    @php $locale = session()->get('locale');  @endphp
    <div data-barba="container">
        <div class="flex flex-col h-screen mx-auto">
            <div class="p-3 pt-8 lg:mx-16 md:pt-20">
                <div class="flex flex-row items-center pt-2">
                    <a href="/" class="prevent"> <i class="ml-4 text-2xl text-gray-900 fas fa-close"></i></a>
                </div>
                @if ($locale == 'de')
                      <div class="flex flex-col items-center justify-center pt-8">
                        <h1 class="pb-4 font-extrabold text-center text-gray-900">Inhaber der Website:</h1>
                        <h1 class="pb-4 text-xl font-bold text-center text-gray-900"> FORSCHUNGSBEREICH</h1>
                        <h1 class="pb-4 text-xl font-bold text-center text-gray-900"> VISUELLE KULTUR (E264-03)</h1>
                        <h1 class="pb-4 text-xl font-bold text-center text-gray-900"> INSTITUTE OF ART AND DESIGN</h1>
                        <h1 class="pb-4 text-xl font-bold text-center text-gray-900"> INSTITUT FÜR KUNST UND GESTALTUNG</h1>
                        <p class="pb-4 text-base text-center text-gray-600">  Technische Universität Wien <br> Karlsplatz 13/264-03, 1040 Wien </p>
                        <p class="pb-4 text-base text-center text-gray-600"> +43 1 58801-26403</p>
                        <a href="mailto:visualculture@tuwien.ac.at"
                            class="pb-4 text-base text-center text-blue-400">visualculture@tuwien.ac.at</a>
                    </div>
                @else
                 <div class="flex flex-col items-center justify-center pt-8">
                        <h1 class="pb-4 font-extrabold text-center text-gray-900">Website owner:</h1>
                        <h1 class="pb-4 text-xl font-bold text-center text-gray-900"> DEPARTMENT OF VISUAL CULTURE (E264-03)
                        </h1>
                        <h1 class="pb-4 text-xl font-bold text-center text-gray-900"> INSTITUTE OF ART AND DESIGN</h1>
                        <p class="pb-4 text-base text-center text-gray-600"> TU Wien<br> Karlsplatz 13/264-03, 1040 Vienna
                        </p>
                        <p class="pb-4 text-base text-center text-gray-600"> +43 1 58801-26403</p>
                        <a href="mailto:visualculture@tuwien.ac.at"
                            class="pb-4 text-base text-center text-blue-400">visualculture@tuwien.ac.at</a>
                    </div>
                @endif

            </div>
        </div>
    @endsection

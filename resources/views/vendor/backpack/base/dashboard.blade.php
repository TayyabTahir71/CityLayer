@php use \App\Http\Controllers\GlobalController; @endphp
@php
    $users = GlobalController::allusers();
@endphp


@extends(backpack_view('blank'))
@section('content')
    <section class="text-gray-600 body-font">
        <div id="main-content" class="relative w-full h-full mt-2 overflow-y-auto rounded-lg">

            <div class="flex flex-col gap-4">
                <div class="flex flex-col mt-2">
                    <div class="p-3 bg-white rounded-lg shadow">
                        <div class="flex items-center justify-between mb-2">
                            <div>
                                <h3 class="mb-1 text-xl font-bold text-gray-900">Users score</h3>
                                <a class="p-2 text-sm font-medium text-gray-800 rounded-lg">Total: {{ $users->count() }}</a>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="user/"
                                    class="p-2 text-sm font-medium rounded-lg text-cyan-600 hover:bg-gray-100">All users</a>
                            </div>
                        </div>
                        <div class="flex flex-col mt-2 h-[400px]">
                            <div class="overflow-auto overflow-x-hidden rounded-lg">
                                <div class="inline-block min-w-full align-middle">
                                    <div class="shadow sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Username
                                                    </th>
                                                     <th scope="col"
                                                        class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Email
                                                    </th>
                                                    <th scope="col"
                                                        class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Score
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white">

                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td
                                                            class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap time-container">
                                                            {{ $user->name }}
                                                        </td>
                                                         <td
                                                            class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap time-container">
                                                            {{ $user->email }}
                                                        </td>
                                                        <td class="p-4 text-sm font-normal text-gray-900 rate-container">
                                                            {{ $user->score }}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



    </section>
    <style>
        * {
            scrollbar-width: thin;
            scrollbar-color: #86878B #05070C;
        }

        /* Chrome, Edge, and Safari */
        *::-webkit-scrollbar {
            width: 15px;
        }

        *::-webkit-scrollbar-track {
            margin-top: 5px;
            margin-bottom: 5px;
            background: #05070C;
            border-radius: 5px;
        }

        *::-webkit-scrollbar-thumb {
            margin-top: 5px;
            background-color: #86878B;
            border-radius: 14px;
            border: 3px solid #05070C;
        }

        body {
            background: linear-gradient(360deg, #0a0a0a 0%, #01163a 100%);
             !important;
        }
    </style>
@endsection

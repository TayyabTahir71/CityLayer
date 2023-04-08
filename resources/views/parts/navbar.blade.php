 <nav class="fixed top-0 z-20 w-full">
     <div class="flex flex-wrap items-center justify-between pt-4 pb-4 mx-2 mr-2 bg-white border-b border-gray-400">
     <div class="flex items-center">
         <a href="/" class="mx-2 text-sm font-bold select-none active:text-gray-500"><i class="pr-1 fa-solid fa-house"></i><span class="">Home</span></a>
          <a href="dashboard" class="mx-2 text-sm font-bold select-none active:text-gray-500"><i class="pr-1 fa-solid fa-table"></i><span class="">Dashboard</span></a>
           <a href="leaderboard" class="mx-2 text-sm font-bold select-none active:text-gray-500"><i class="pr-1 fa-solid fa-trophy"></i> <span class="">Leaderboard</span></a>
           </div>
         <div x-data="{ modelOpen: false }">
             <button @click="modelOpen =!modelOpen"
                 class="inline-flex items-center p-2 ml-3 text-sm text-gray-400 rounded-lg focus:outline-none focus:ring-2 hover:bg-gray-700 focus:ring-gray-600">
                 <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd"
                         d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                         clip-rule="evenodd"></path>
                 </svg>
             </button>


             <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                 role="dialog" aria-modal="true">
                 <div
                     class="flex items-start justify-center min-h-screen px-4 pt-16 text-center sm:block sm:p-0">
                     <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                         x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200 transform"
                         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                         class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true">
                     </div>

                     <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                         x-transition:leave="transition ease-in duration-200 transform"
                         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                         class="z-50 inline-block w-full max-w-xl p-8 overflow-hidden transition-all transform">

                         <div class="w-full">
                             <ul
                                 class="flex flex-col p-4 mt-4 font-bold bg-white rounded-lg shadow mynav">
                                 <li>
                                     <a href="/profile"
                                         class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:text-blue-500 prevent"><i class="pr-2 fa-solid fa-user"></i> {{ __('messages.Profile') }}</a>
                                 </li>
                                 <li>
                                     <a href="/admin/logout"
                                         class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:text-blue-500 prevent"><i class="pr-2 fa-solid fa-right-from-bracket"></i> {{ __('messages.Log-out') }}</a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </nav>
 <script>
     document.addEventListener('DOMContentLoaded', function() {

         const currentLocation = location.href;
         const menuItem = document.querySelectorAll('.mynav a');
         const menuLength = menuItem.length;
         for (let i = 0; i < menuLength; i++) {
             if (menuItem[i].href === currentLocation) {
                 menuItem[i].className =
                     'block py-2 pl-3 pr-4 rounded border border-gray-600 bg-gray-500 text-white prevent';
             }
         }
     });
 </script>

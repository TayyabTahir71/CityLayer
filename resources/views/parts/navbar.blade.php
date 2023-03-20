 <nav class="fixed top-0 z-20 w-full px-2 pt-4 mx-2 md:pt-8">
     <div class="flex flex-wrap items-center justify-between pb-4 mx-2 mr-2 border-b border-gray-400 lg:mx-16">
         <a href="#" class="flex items-center">
            
         </a>
         <a href="/" <span class="self-center pl-8 text-3xl font-bold text-center text-gray-800 whitespace-nowrap">City
                 Layers</span></a>
         <button data-collapse-toggle="navbar-multi-level" type="button"
             class="inline-flex items-center p-2 ml-3 text-sm text-gray-400 rounded-lg focus:outline-none focus:ring-2 hover:bg-gray-700 focus:ring-gray-600"
             aria-controls="navbar-multi-level" aria-expanded="false">
             <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd"
                     d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                     clip-rule="evenodd"></path>
             </svg>
         </button>
         <div class="relative hidden w-full" id="navbar-multi-level">
             <ul class="flex flex-col p-4 mt-4 font-bold bg-gray-800 border border-gray-700 rounded-lg mynav">
                 <li>
                     <a href="/"
                         class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-700 hover:text-blue-500 prevent">Home</a>
                 </li>
                 <li>
                     <a href="dashboard"
                         class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-700 hover:text-blue-500 prevent">Dashboard</a>
                 </li>
                 <li>
                     <a href="profile"
                         class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-700 hover:text-blue-500 prevent">Profile</a>
                 </li>
                 <li>
                     <a href="admin/logout"
                         class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-700 hover:text-blue-500 prevent">Log-out</a>
                 </li>
             </ul>
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
      menuItem[i].className = 'block py-2 pl-3 pr-4 rounded border border-gray-600 bg-gray-700 text-blue-500 prevent';
    }
  }
});
</script>
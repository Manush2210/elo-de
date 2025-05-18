<div>
    <!-- Menu Toggle Button -->
    <button id="menu-toggle" class="fixed top-4 left-4 z-50 text-white bg-gray-900 p-2 rounded-md hover:bg-gray-800">
        <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Sidebar -->
    <div id="sidebar"
        class="h-full pt-24 w-0 bg-gray-900 flex flex-col justify-between py-4 fixed left-0 top-0 transition-all duration-300 overflow-hidden z-40">
        <nav class="flex items-center flex-col space-y-2">
            <a class="text-white/50 p-4 inline-flex items-center rounded-md hover:bg-gray-800 hover:text-white smooth-hover w-full {{ request()->routeIs('admin.orders') ? 'bg-gray-800 text-white' : '' }}"
                href="{{ route('admin.orders') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span class="ml-3">Commandes</span>
            </a>

            <a class="text-white/50 p-4 inline-flex items-center rounded-md hover:bg-gray-800 hover:text-white smooth-hover w-full {{ request()->routeIs('admin.users') ? 'bg-gray-800 text-white' : '' }}"
                href="{{ route('admin.users') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span class="ml-3">Utilisateurs</span>
            </a>

            <a class="text-white/50 p-4 inline-flex items-center rounded-md hover:bg-gray-800 hover:text-white smooth-hover w-full {{ request()->routeIs('admin.products') ? 'bg-gray-800 text-white' : '' }}"
                href="{{ route('admin.products') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <span class="ml-3">Produits</span>
            </a>

            <a class="text-white/50 p-4 inline-flex items-center rounded-md hover:bg-gray-800 hover:text-white smooth-hover w-full {{ request()->routeIs('admin.payment-methods') ? 'bg-gray-800 text-white' : '' }}"
                href="{{ route('admin.payment-methods') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
                <span class="ml-3">Moyens de Paiement</span>
            </a>

            <a class="text-white/50 p-4 inline-flex items-center rounded-md hover:bg-gray-800 hover:text-white smooth-hover w-full {{ request()->routeIs('admin.accounts.add') ? 'bg-gray-800 text-white' : '' }}"
                href="{{ route('admin.accounts.add') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                    <path fill-rule="evenodd"
                        d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                        clip-rule="evenodd" />
                </svg>
                <span class="ml-3">Ajouter Compte</span>
            </a>
        </nav>
        <div class="flex items-center flex-col space-y-2">
            <a class="text-white/50 p-4 inline-flex items-center rounded-md hover:bg-gray-800 hover:text-white smooth-hover w-full {{ request()->routeIs('admin.settings') ? 'bg-gray-800 text-white' : '' }}"
                href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                        clip-rule="evenodd" />
                </svg>
                <span class="ml-3">Paramètres</span>
            </a>
            <a class="text-white/50 p-4 inline-flex items-center rounded-md hover:bg-gray-800 hover:text-white smooth-hover w-full"
                href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
                <span class="ml-3">Déconnexion</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>

    <!-- Overlay to close menu on click outside -->
    <div id="sidebar-overlay"
        class="fixed inset-0 bg-black opacity-0 pointer-events-none transition-opacity duration-300 z-30"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const menuIcon = document.getElementById('menu-icon');
            const closeIcon = document.getElementById('close-icon');

            function openMenu() {
                sidebar.classList.remove('w-0');
                sidebar.classList.add('w-64');
                overlay.classList.add('opacity-50');
                overlay.classList.remove('pointer-events-none');
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            }

            function closeMenu() {
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-0');
                overlay.classList.remove('opacity-50');
                overlay.classList.add('pointer-events-none');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }

            menuToggle.addEventListener('click', function() {
                if (sidebar.classList.contains('w-0')) {
                    openMenu();
                } else {
                    closeMenu();
                }
            });

            overlay.addEventListener('click', function() {
                closeMenu();
            });
        });
    </script>
</div>

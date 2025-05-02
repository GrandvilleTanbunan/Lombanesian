<header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ asset('images/logo.PNG') }}" alt="Lombanesia Logo" class="h-10 mr-2">
            <span class="text-blue-600 text-2xl font-bold">Lombanesia</span>
        </a>

        <!-- Navigation -->
        <nav class="hidden md:flex space-x-8">
            <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-600 font-bold {{ request()->routeIs('home') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">Home</a>
            <a href="{{ route('lomba.index') }}" class="text-blue-600 hover:text-blue-600 font-bold {{ request()->routeIs('lomba.index') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">Lomba</a>
            <a href="{{ route('info.tutor') ?? '#' }}" class="text-blue-600 hover:text-blue-600 font-bold {{ request()->routeIs('info.tutor') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">Info Tutor</a>
            <a href="{{ route('partner.lomba') ?? '#' }}" class="text-blue-600 hover:text-blue-600 font-bold {{ request()->routeIs('partner.lomba') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">Partner Lomba</a>
        </nav>

        <!-- User Menu -->
        <div class="flex items-center relative">
            @auth
                <div class="relative">
                    <button id="user-menu-button" class="flex items-center text-blue-600 hover:text-blue-700 focus:outline-none">
                        <span class="mr-2">{{ Auth::user()->name }}</span>
                        <svg class="h-5 w-5 transition-transform" id="dropdown-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="user-dropdown" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-lg hidden z-10">
                        {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil Saya</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Lomba Tersimpan</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Lomba Terdaftar</a> --}}
                        <hr class="my-1">
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors mr-2">Login</a>
                {{-- <a href="{{ route('register') }}" class="text-blue-600 border border-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50 transition-colors hidden md:inline-block">Daftar</a> --}}
            @endauth
        </div>

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-gray-500 hover:text-gray-700 focus:outline-none" id="mobile-menu-button">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'text-white bg-blue-600' : 'text-gray-700 hover:bg-gray-50' }}">Home</a>
            <a href="{{ route('lomba.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('lomba.index') ? 'text-white bg-blue-600' : 'text-gray-700 hover:bg-gray-50' }}">Lomba</a>
            <a href="{{ route('info.tutor') ?? '#' }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('info.tutor') ? 'text-white bg-blue-600' : 'text-gray-700 hover:bg-gray-50' }}">Info Tutor</a>
            <a href="{{ route('partner.lomba') ?? '#' }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('partner.lomba') ? 'text-white bg-blue-600' : 'text-gray-700 hover:bg-gray-50' }}">Partner Lomba</a>

            @guest
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Login</a>
                <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Daftar</a>
            @else
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Profil Saya</a>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-red-500 hover:bg-gray-50">Logout</button>
                </form>
            @endguest
        </div>
    </div>
</header>

@push('scripts')
<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    // User dropdown toggle
    document.addEventListener('DOMContentLoaded', function() {
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');
        const dropdownArrow = document.getElementById('dropdown-arrow');

        // Only proceed if the user menu button exists (user is logged in)
        if (userMenuButton) {
            // Toggle dropdown when button is clicked
            userMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                userDropdown.classList.toggle('hidden');

                // Rotate arrow when dropdown is opened
                if (userDropdown.classList.contains('hidden')) {
                    dropdownArrow.classList.remove('rotate-180');
                } else {
                    dropdownArrow.classList.add('rotate-180');
                }
            });

            // Close dropdown when clicking anywhere else on the page
            document.addEventListener('click', function(e) {
                if (!userMenuButton.contains(e.target) && !userDropdown.contains(e.target)) {
                    userDropdown.classList.add('hidden');
                    dropdownArrow.classList.remove('rotate-180');
                }
            });

            // Prevent dropdown from closing when clicking inside it
            userDropdown.addEventListener('click', function(e) {
                // Don't stop propagation for the logout form submit
                if (!e.target.closest('form')) {
                    e.stopPropagation();
                }
            });
        }
    });
</script>
@endpush

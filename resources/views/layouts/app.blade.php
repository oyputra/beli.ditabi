<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- add icon link -->
    <link rel="icon" href="{{ asset('images/icon_app.png') }}" type="image/x-icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .active, .navbar-tabi:hover {
            color: #2d3748;
        }
    </style>

    {{-- Icons --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div id="app">
        {{-- navbar --}}
        <nav class="relative flex flex-wrap items-center justify-between py-3 bg-primary">
            <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
                <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                    <a href="{{ route('landingpage') }}" class="flex items-center font-comfortaa lg:text-2xl text-xl font-extrabold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        beli<span class="text-white">.ditabi</span>
                    </a>
                    <button class="text-white cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" onclick="toggleNavbar('example-collapse-navbar')">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="hidden lg:flex flex-grow" id="example-collapse-navbar">
                    <div class="lg:ml-6 flex lg:flex-row flex-col lg:items-center flex-grow lg:justify-between">
                        <!-- Left Side Of Navbar -->
                        <div class="flex lg:flex-row text-xs lg:text-base flex-col lg:space-x-6 space-y-3 lg:space-y-0 mt-3 lg:mt-0">
                            <a href="{{ route('landingpage') }}" class="block @if (Route::is('landingpage')) active @endif text-white font-medium navbar-tabi transition">
                                Home
                            </a>
                            <a href="{{ route('products') }}" class="block @if (Route::is('products')) active @endif text-white font-medium navbar-tabi transition">
                                Products
                            </a>
                            <a href="{{ route('aboutus') }}" class="block @if (Route::is('aboutus')) active @endif text-white font-medium navbar-tabi transition">
                                About Us
                            </a>
                            <a href="{{ route('contactus') }}" class="block @if (Route::is('contactus')) active @endif text-white font-medium navbar-tabi transition">
                                Contact Us
                            </a>
                        </div>
                        <!-- Left Side Of Navbar End -->
                        <!-- Right Side Of Navbar -->                        
                        <div class="flex lg:flex-row flex-col items-start lg:space-x-6 space-y-3 lg:space-y-0 mt-3 lg:mt-0">
                            @guest
                                @if (Route::is('login'))
                                    <a href="{{ route('register') }}" class="block px-4 py-2 bg-transparent text-xs lg:text-sm border border-white text-white font-medium rounded capitalize hover:bg-white hover:text-primary transition">
                                        Register
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="block px-4 py-2 bg-transparent text-xs lg:text-sm border border-white text-white font-medium rounded capitalize hover:bg-white hover:text-primary transition">
                                        Login
                                    </a>
                                @endif
                            @else
                                <!-- dropdown menu -->
                                <div class="relative inline-block text-left text-xs lg:text-sm">
                                    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
                                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                        <button @click="open = !open" type="button" class="px-4 py-2 bg-white hover:text-gray-800 transition inline-flex w-full rounded-md shadow-sm text-gray-800 focus:outline-none focus:ring-0" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                            {{ Auth::user()->name }}
                                            <!-- Heroicon name: solid/chevron-down -->
                                            <svg class="-mr-1 ml-2 lg:h-5 h-4 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                                            <div class="z-20 origin-top-left absolute lg:right-0 mt-2 w-56 rounded-md shadow-lg bg-white divide-y divide-gray-200 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                                <div class="py-1" role="none">
                                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                                    @if (auth()->user()->is_admin == 1)
                                                        <a href="{{ route('db-admin.index') }}" class="text-gray-700 block px-4 py-2 hover:bg-gray-200 transition" role="menuitem" tabindex="-1" id="menu-item-2">
                                                            Dashboard
                                                        </a>
                                                    @else
                                                        <a href="{{ route('dashboard.avatar') }}" class="text-gray-700 block px-4 py-2 hover:bg-gray-200 transition" role="menuitem" tabindex="-1" id="menu-item-0">
                                                            Profil
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="py-1" role="none">
                                                    <a href="{{ route('dashboard.unpaid') }}" class="text-gray-700 block px-4 py-2 hover:bg-gray-200 transition" role="menuitem" tabindex="-1" id="menu-item-2">
                                                        Purchase
                                                    </a>
                                                </div>
                                                <div class="py-1" role="none">
                                                    <a class="text-gray-700 block px-4 py-2 hover:bg-gray-200 transition" role="menuitem" tabindex="-1" id="menu-item-6" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>
        
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- dropdown menu end -->
                            @endguest
                            
                        </div>
                        <!-- Right Side Of Navbar End -->
                    </div>
                </div>
            </div>
            <script>
            function toggleNavbar(collapseID){
                document.getElementById(collapseID).classList.toggle("hidden");
                document.getElementById(collapseID).classList.toggle("flex");
            }
            </script>
        </nav>
        {{-- navbar end --}}

        {{-- main --}}
        @yield('content')
        {{-- main end --}}

    </div>
    <!-- footer -->
    <footer class="shadow-sm bg-gray-800">
        <div class="container flex flex-col lg:flex-row items-start py-8">
            <div class="lg:w-4/12 space-y-6 px-6 pb-6">
                <!-- logo -->
                <a href="#" class="flex items-center font-comfortaa lg:text-2xl text-xl font-extrabold text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    beli<span class="text-primary">.ditabi</span>
                </a>
                <!-- logo end -->
                <p class="text-xs text-gray-400 leading-loose">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, quos dicta voluptas rem incidunt veritatis culpa odit. Amet provident voluptate possimus fugit in pariatur. Dolores maxime pariatur recusandae. Aut, iusto itaque!</p>
            </div> 
            <div class="w-full flex lg:gap-8 px-6 justify-between">
                <div class="text-gray-400 space-y-4 text-xs lg:text-base pb-5">
                    <h1 class="font-semibold uppercase">Solutions</h1>
                    <div class="hover:text-white">
                        <a href="#">Marketing</a>
                    </div>
                    <div class="hover:text-white">
                        <a href="#">Analytics</a>
                    </div>
                    <div class="hover:text-white">
                        <a href="#">Commerce</a>
                    </div>
                    <div class="hover:text-white">
                        <a href="#">Insight</a>
                    </div>
                </div>
                <div class="text-gray-400 space-y-4 text-xs lg:text-base">
                    <h1 class="font-semibold uppercase">Support</h1>
                    <div class="hover:text-white">
                        <a href="#">Pricing</a>
                    </div>
                    <div class="hover:text-white">
                        <a href="#">Feature</a>
                    </div>
                    <div class="hover:text-white">
                        <a href="#">Guides</a>
                    </div>
                    <div class="hover:text-white">
                        <a href="#">API Status</a>
                    </div>
                </div>
                <div class="text-gray-400 space-y-4 text-xs lg:text-base">
                    <h1 class="font-semibold uppercase">Solutions</h1>
                    <div class="hover:text-white">
                        <a href="#">Marketing</a>
                    </div>
                    <div class="hover:text-white">
                        <a href="#">Analytics</a>
                    </div>
                    <div class="hover:text-white">
                        <a href="#">Commerce</a>
                    </div>
                    <div class="hover:text-white">
                        <a href="#">Insight</a>
                    </div>
                </div>
                <div class="text-gray-400 space-y-4 text-xs lg:text-base">
                    <h1 class="font-semibold uppercase">Support</h1>
                    <div class="hover:text-white">
                        <a href="#">Pricing</a>
                    </div>
                    <div class="hover:text-white">
                        <a href="#">Feature</a>
                    </div>
                    <div class="hover:text-white">
                        <a href="#">Guides</a>
                    </div>
                    <div class="hover:text-white">
                        <a href="#">API Status</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <!-- copyright -->
    <div class="py-6 bg-gray-800">
        <div class="container">
            <div class="w-full flex flex-col lg:flex-row items-center justify-between text-xs lg:text-base">
                <p class="text-gray-200 pb-4 lg:pb-0">
                    &copy; Copyright 2021 <a href="#" class="font-comfortaa font-extrabold text-black"> beli<span class="text-primary font-semibold">.ditabi</span>
                    </a>
                </p>
                <div class="flex items-center justify-start gap-3 text-gray-600">
                    <a href="#">
                        <i class="fab fa-facebook fa-lg hover:text-white"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter fa-lg hover:text-white"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram fa-lg hover:text-white"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-youtube fa-lg hover:text-white"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright end -->
</body>
</html>

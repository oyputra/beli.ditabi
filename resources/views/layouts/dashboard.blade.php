<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- add icon link -->
    <link rel="icon" href="{{ asset('images/icon_app.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .active, .navbar-tabi:hover {
            color: white;
            background-color: #FD3D57;
            border-radius: 0.25rem;
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
                            <a href="{{ route('landingpage') }}" class="block text-white font-medium hover:text-gray-800 transition">
                                Home
                            </a>
                            <a href="{{ route('products') }}" class="block text-white font-medium hover:text-gray-800 transition">
                                Products
                            </a>
                            <a href="{{ route('aboutus') }}" class="block text-white font-medium hover:text-gray-800 transition">
                                About Us
                            </a>
                            <a href="{{ route('contactus') }}" class="block text-white font-medium hover:text-gray-800 transition">
                                Contact Us
                            </a>
                        </div>
                        <!-- Left Side Of Navbar End -->
                        <!-- Right Side Of Navbar -->                        
                        <div class="flex lg:flex-row flex-col items-start lg:space-x-6 space-y-3 lg:space-y-0">
                            <!-- dropdown menu -->
                            <div class="relative inline-block text-left text-xs lg:text-sm">
                                <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
                                <div @click.away="open = false" class="relative mt-3 lg:mt-0" x-data="{ open: false }">
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

        <!-- breadcrums -->
        <div class="container py-4 flex items-center gap-5">
            <a href="index.html" class="text-primary text-base">
                <i class="fas fa-home"></i>
            </a>
            <span class="text-sm text-gray-400">
                <i class="fas fa-chevron-right"></i>
            </span>
            <p class="text-gray-600 font-medium">Account</p>
        </div>
        <!-- breadcrums end -->

        <!-- account wrapper -->
        <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">
            <!-- sidebar -->
            <div class="lg:col-span-3 col-span-12">
                <!-- account profile -->
                <div class="px-4 py-3 bg-white shadow flex items-center gap-4">
                    <div class="flex-shrink-0">
                        @if ( $user->image == null )
                            <img src="{{ asset('images/user.bmp') }}" class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
                        @else
                            <img src="{{ Storage::url($user->image) }}" class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover" style="object-position: center top;">
                        @endif
                    </div>
                    <div class="flex-grow">
                        <p class="text-gray-600">
                            Hello,
                            <span class="text-gray-800 font-roboto font-medium">
                                {{ Auth::user()->name }}!
                            </span>
                        </p>
                        
                    </div>
                </div>
                <!-- account profile end -->

                <!-- profile links -->
                <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
                    <!-- single link -->
                    <div class="space-y-1 pl-8 ">
                        <div class="relative block font-medium capitalize">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="far fa-address-card"></i>
                            </span>
                            Profil
                        </div>
                        <a href="{{ route('dashboard.avatar') }}" class="pl-3 py-1 @if (Route::is('dashboard.avatar')) active @endif navbar-tabi block font-medium capitalize">
                            Avatar
                        </a>
                        <a href="{{ route('dashboard.detail') }}" class="pl-3 py-1 @if (Route::is('dashboard.detail')) active @endif navbar-tabi block font-medium capitalize">
                            Detail
                        </a>
                        <a href="{{ route('dashboard.changepassword') }}" class="pl-3 py-1 @if (Route::is('dashboard.changepassword')) active @endif navbar-tabi block font-medium capitalize">
                            Change Password
                        </a>
                    </div>
                    <!-- single link end -->
                    
                    <!-- single link -->
                    <div class="space-y-1 pl-8 pt-4">
                        <div class="relative block font-medium capitalize">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="far fa-shopping-bag"></i>
                            </span>
                            Products
                        </div>
                        <a href="{{ route('products') }}" class="pl-3 py-1 navbar-tabi block font-medium capitalize">
                            Shop
                        </a>
                    </div>
                    <!-- single link end -->
                    
                    <!-- single link -->
                    <div class="space-y-1 pl-8 pt-4">
                        <div class="relative block font-medium capitalize">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fas fa-shopping-basket"></i>
                            </span>
                            Purchase
                        </div>
                        <a href="{{ route('dashboard.unpaid') }}" class="@if (Route::is('dashboard.unpaid')) active @endif pl-3 py-1 navbar-tabi block font-medium capitalize">
                            still unpaid
                        </a>
                        <a href="{{ route('dashboard.delivery') }}" class="@if (Route::is('dashboard.delivery')) active @endif pl-3 py-1 navbar-tabi block font-medium capitalize">
                            delivery
                        </a>
                        <a href="{{ route('dashboard.history') }}" class="@if (Route::is('dashboard.history')) active @endif pl-3 py-1 navbar-tabi block font-medium capitalize">
                            history
                        </a>
                    </div>
                    <!-- single link end -->
                    
                    <!-- single link -->
                    <div class="space-y-1 pl-8 pt-4">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                        class="relative hover:text-primary block font-medium capitalize">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="far fa-sign-out"></i>
                            </span>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <!-- single link end -->
                </div>
            </div>
            <!-- sidebar end -->

            <!-- main -->
            <div class="lg:col-span-9 col-span-12">
                @if (session('status'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-3 rounded relative" role="alert">
                        <strong class="font-bold">Notice!</strong>
                        <span class="block sm:inline">{{ session('status') }}</span>
                    </div>
                @endif
                @yield('content')
            </div>
            <!-- main end -->

        </div>
        <!-- account wrapper end -->

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
    </div>

</body>
</html>
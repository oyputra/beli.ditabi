<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - beli.ditabi</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css')}}">
    
    <!-- add icon link -->
    <link rel="icon" href="{{ asset('images/icon_app.png') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between flex items-center">
                        <div class="logo">
                            <a href="{{ route('landingpage') }}" class="flex items-center font-comfortaa lg:text-2xl text-xl font-extrabold mt-2 text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                beli<span class="text-red-500">.ditabi</span>
                            </a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    
                    <div class="flex flex-col justify-center items-center mx-auto">
                        @if ( $user->image == null )
                            <img src="{{ asset('images/user.bmp') }}" class="rounded-full border border-gray-200 p-1 object-cover max-h-28" style="object-position: center top;">
                        @else
                            <img src="{{ Storage::url($user->image) }}" class="rounded-full border border-gray-200 p-1 object-cover w-20 h-20" style="object-position: center top;">
                        @endif
                        <a href="index.html" class="text-xl font-light">Hello, {{ Auth::user()->name }}!</a>
                    </div>
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  @if (Route::is('db-admin.index')) active @endif">
                            <a href="{{ route('db-admin.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Profile</span>
                            </a>
                            <ul class="submenu @if (Route::is('db-admin.avatar') || Route::is('db-admin.detail') || Route::is('db-admin.changepassword')) active @endif">
                                <li class="submenu-item @if (Route::is('db-admin.avatar')) active @endif">
                                    <a href="{{ route('db-admin.avatar') }}">Avatar</a>
                                </li>
                                <li class="submenu-item @if (Route::is('db-admin.detail')) active @endif">
                                    <a href="{{ route('db-admin.detail') }}">Detail</a>
                                </li>
                                <li class="submenu-item @if (Route::is('db-admin.changepassword')) active @endif">
                                    <a href="{{ route('db-admin.changepassword') }}">Change Password</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-bag-fill"></i>
                                <span>Products</span>
                            </a>
                            <ul class="submenu @if (Route::is('db-admin.category') || Route::is('db-admin.shop')) active @endif">
                                <li class="submenu-item @if (Route::is('db-admin.category')) active @endif">
                                    <a href="{{ route('db-admin.category') }}">Category</a>
                                </li>
                                <li class="submenu-item @if (Route::is('db-admin.shop')) active @endif">
                                    <a href="{{ route('db-admin.shop') }}">Shop</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-basket-fill"></i>
                                <span>Purchase</span>
                            </a>
                            <ul class="submenu @if (Route::is('db-admin.unpaid') || Route::is('db-admin.delivery') || Route::is('db-admin.history')) active @endif">
                                <li class="submenu-item @if (Route::is('db-admin.unpaid')) active @endif">
                                    <a href="{{ route('db-admin.unpaid') }}">Still Unpaid</a>
                                </li>
                                <li class="submenu-item @if (Route::is('db-admin.delivery')) active @endif">
                                    <a href="{{ route('db-admin.delivery') }}">Delivery</a>
                                </li>
                                <li class="submenu-item @if (Route::is('db-admin.history')) active @endif">
                                    <a href="{{ route('db-admin.history') }}">History</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-border-outer"></i>
                                <span>Page</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="extra-component-avatar.html">Home</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="extra-component-sweetalert.html">About Us</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="extra-component-toastify.html">Contact Us</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Navigation</li>

                        <li class="sidebar-item ">
                            <a href="{{ route('landingpage') }}" class='sidebar-link'>
                                <i class="bi bi-columns-gap"></i>
                                <span>Landing Page</span>
                            </a>
                        </li>

                        <li class="sidebar-item mb-32">
                            <a href="{{ route('logout') }}" class='sidebar-link' onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last mb-5">
                            @if (Route::is('db-admin.avatar'))
                                <h3 class="text-xl font-domine">Avatar</h3>
                            @elseif (Route::is('db-admin.detail'))
                                <h3 class="text-xl font-domine">Detail</h3>
                            @elseif (Route::is('db-admin.changepassword'))
                                <h3 class="text-xl font-domine">Change Password</h3>
                            @elseif (Route::is('db-admin.shop'))
                                <h3 class="text-xl font-domine">Shop</h3>
                            @elseif (Route::is('db-admin.addproduct'))
                                <h3 class="text-xl font-domine">Add Product</h3>
                            @elseif (Route::is('db-admin.category') || Route::is('db-admin.addcategory') || Route::is('db-admin.changecategory'))
                                <h3 class="text-xl font-domine">Category</h3>
                            @elseif (Route::is('db-admin.unpaid'))
                                <h3 class="text-xl font-domine">Still Unpaid</h3>
                            @elseif (Route::is('db-admin.delivery'))
                                <h3 class="text-xl font-domine">Delivery</h3>
                            @elseif (Route::is('db-admin.history'))
                                <h3 class="text-xl font-domine">History</h3>
                            @elseif (Route::is('db-admin.showorder'))
                                <h3 class="text-xl font-domine">Order</h3>
                            @endif
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    
                                    @if (Route::is('db-admin.avatar') || Route::is('db-admin.detail') || Route::is('db-admin.changepassword'))
                                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                    @elseif (Route::is('db-admin.shop') || Route::is('db-admin.addproduct') || Route::is('db-admin.category') || Route::is('db-admin.addcategory') || Route::is('db-admin.changecategory'))
                                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                                    @elseif (Route::is('db-admin.unpaid') || Route::is('db-admin.delivery') || Route::is('db-admin.history') || Route::is('db-admin.showorder'))
                                        <li class="breadcrumb-item active" aria-current="page">Purchase</li>
                                    @endif
                                    
                                    @if (Route::is('db-admin.avatar'))
                                        <li class="breadcrumb-item active" aria-current="page">Avatar</li>
                                    @elseif (Route::is('db-admin.detail'))
                                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                                    @elseif (Route::is('db-admin.changepassword'))
                                        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                                    @elseif (Route::is('db-admin.shop') || Route::is('db-admin.addproduct'))
                                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                    @elseif (Route::is('db-admin.category') || Route::is('db-admin.addcategory') || Route::is('db-admin.changecategory'))
                                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                                    @elseif (Route::is('db-admin.unpaid'))
                                        <li class="breadcrumb-item active" aria-current="page">Still Unpaid</li>
                                    @elseif (Route::is('db-admin.delivery'))
                                        <li class="breadcrumb-item active" aria-current="page">Delivery</li>
                                    @elseif (Route::is('db-admin.history'))
                                        <li class="breadcrumb-item active" aria-current="page">History</li>
                                    @elseif ( Route::is('db-admin.showorder'))
                                        <li class="breadcrumb-item active" aria-current="page">Order</li>
                                    @endif
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                @if (session('status'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-3 rounded relative" role="alert">
                        <strong class="font-bold">Notice!</strong>
                        <span class="block sm:inline">{!! session('status') !!}</span>
                    </div>
                @endif

                <div class="page-content">
                    {{-- main --}}
                    @yield('content')
                    {{-- main end --}}
                </div>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="flex justify-center">
                        <p>2022 &copy; beli.ditabi</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js')}}"></script>

    <script src="{{ asset('assets/js/main.js')}}"></script>
</body>

</html>
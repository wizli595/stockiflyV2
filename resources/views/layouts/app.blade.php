<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    {{-- @livewireStyles --}}

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>{{ config('app.name', 'Stockifly') }}</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    {{-- <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico"> --}}
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="assets/js/config.js"></script>
    <script src="vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css"> --}}
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- @livewireChartsScripts --}}

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css"> --}}




    @yield('head')

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="{{ asset('vendors/prism/prism-okaidia.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-rtl.min.css') }} " rel="stylesheet" id="style-rtl">
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
 
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>

</head>


<body>

    <div id="app">

        <!-- ===============================================-->
        <!--    Main Content-->
        <!-- ===============================================-->
        <main class="main" id="top">
            <div class="container-fluid" data-layout="container-fluid">
               
                <script>
                    var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                    if (isFluid) {
                        var container = document.querySelector('[data-layout]');
                        container.classList.remove('container');
                        container.classList.add('container-fluid');
                    }
                </script>

                <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
                    <script>
                        var navbarStyle = localStorage.getItem("navbarStyle");
                        if (navbarStyle && navbarStyle !== 'transparent') {
                            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                        }
                    </script>
                    <div class="d-flex align-items-center">
                        <div class="toggle-icon-wrapper">
                            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle"
                                data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation">
                                <span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="/">
                            <div class="py-3 d-flex align-items-center"><img class="me-2"
                                    src="assets/img/Stockifly_icon.png" alt="" width="30" /><span
                                    class="font-sans-serif">Stockifly</span>
                            </div>
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                        <div class="navbar-vertical-content scrollbar">
                            <ul class="mb-3 navbar-nav flex-column" id="navbarVerticalNav">

                                <!-- parent pages-->
                                <a class="nav-link" href="{{ route('dashboard') }}" role="button" data-bs-toggle=""
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                            <span class="fas fa-home"></span>
                                        </span>
                                        <span class="nav-link-text ps-1">dashboard</span>
                                    </div>
                                </a>

                                <li class="nav-item"> 
                                    <!-- parent pages-->
                                    <a class="nav-link dropdown-indicator" href="#dashboard" role="button"
                                        data-bs-toggle="collapse" aria-expanded="false" aria-controls="dashboard">
                                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                    class="fas fa-user-tie"></span></span><span
                                                class="nav-link-text ps-1">parties</span>
                                        </div>
                                    </a>
                                    <ul class="nav collapse" id="dashboard">

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('customers.index') }}" data-bs-toggle=""
                                                aria-expanded="false">
                                                <div class="d-flex align-items-center"><span
                                                        class="nav-link-text ps-1">custmers</span>
                                                </div>
                                            </a>
                                            <!-- more inner pages-->
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('suppliers.index') }}"
                                                data-bs-toggle="" aria-expanded="false">
                                                <div class="d-flex align-items-center"><span
                                                        class="nav-link-text ps-1">suplaire</span>
                                                </div>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item"> 
                                    <!-- parent pages-->
                                    <a class="nav-link dropdown-indicator" href="#products" role="button"
                                        data-bs-toggle="collapse" aria-expanded="false" aria-controls="products">
                                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                    class="fas fa-cube"></span></span><span
                                                class="nav-link-text ps-1">product_manager</span>
                                        </div>
                                    </a>
                                    <ul class="nav collapse" id="products">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('brands.index') }}" data-bs-toggle=""
                                                aria-expanded="false">
                                                <div class="d-flex align-items-center"><span
                                                        class="nav-link-text ps-1">brands</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('categories.index') }}" data-bs-toggle=""
                                                aria-expanded="false">
                                                <div class="d-flex align-items-center"><span
                                                        class="nav-link-text ps-1">categories</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('products.index') }}" data-bs-toggle=""
                                                aria-expanded="false">
                                                <div class="d-flex align-items-center"><span
                                                        class="nav-link-text ps-1">products</span>
                                                </div>
                                            </a>
                                        </li>


                                    </ul>
                                </li>

                                <!-- parent pages-->
                                <a class="nav-link" href="{{ route('users.index') }}" role="button"
                                    data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                            <span class="fas fa-users"></span>
                                        </span>
                                        <span class="nav-link-text ps-1">users</span>
                                    </div>
                                </a>

                                 <!-- parent pages-->
                                <a class="nav-link" href="{{ route('purchases.index')}}" role="button"
                                 data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center">
                                     <span class="nav-link-icon">
                                         <span class="fas fa-columns"></span>
                                     </span>
                                     <span class="nav-link-text ps-1">purchase</span>
                                 </div>
                                </a>

                                 <!-- parent pages-->
                                <a class="nav-link" href="{{ route('werhouses.index')}}" role="button"
                                 data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center">
                                     <span class="nav-link-icon">
                                         <span class="fas fa-laptop-house"></span>
                                     </span>
                                     <span class="nav-link-text ps-1">werhouse</span>
                                 </div>
                                </a>

                                <!-- parent pages-->
                                <a class="nav-link" href="{{ route('unites.index')}}" role="button"
                                 data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center">
                                     <span class="nav-link-icon">
                                         <span class="fas fa-house"></span>
                                     </span>
                                     <span class="nav-link-text ps-1">unite</span>
                                 </div>
                                </a>

                               

                                <!-- parent pages-->
                                <a class="nav-link" href="#" role="button"
                                    data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                            <span class="far fa-arrow-alt-circle-left"></span>
                                        </span>
                                        <form  action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <span class="dropdown-item nav-link-text ps-1 " :href="route('logout')"
                                                onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                                class="">Lougout</span>
                                        </form>
                                    </div>
                                </a>


                            </ul>

                        </div>
                    </div>
                </nav>

                <div class="content">
                    <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

                        <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
                            data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                            aria-controls="navbarVerticalCollapse" aria-expanded="false"
                            aria-label="Toggle Navigation">
                            <span class="navbar-toggle-icon">
                                <span class="toggle-line"></span>
                            </span>
                        </button>

                        <a class="navbar-brand me-1 me-sm-3" href="/">
                            <div class="d-flex align-items-center">
                                <img class="me-2" src="assets/img/Stockifly_icon.png" alt="S"
                                    width="30" />
                                <span class="font-sans-serif">Stockifly</span>
                            </div>
                        </a>

                        <!--  Left nav Content-->
                        <ul class="navbar-nav align-items-center d-none d-lg-block">

                            <li class="nav-item">
                                <div class="search-box" data-list='{"valueNames":["title"]} '>
                                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                        <input class="form-control search-input fuzzy-search" type="search"
                                            placeholder="Search..." aria-label="Search" />
                                        <span class="fas fa-search search-box-icon"></span>
                                    </form>
                                </div>
                            </li>
                            
                        </ul>

                        <!--  Right nav Content-->
                        <ul class="flex-row navbar-nav navbar-nav-icons ms-auto align-items-center">

                            <li class="nav-item dropdown">
                                <a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div>
                                        FR
                                    </div>
                                </a>
                                <div class="py-0 dropdown-menu dropdown-caret dropdown-menu-end"
                                    aria-labelledby="navbarDropdownUser">
                                    <div class="py-2 bg-white dark__bg-1000 rounded-2">
                                        <a class="dropdown-item" href="/"> FR </a>
                                    </div>
                                </div>
                            </li>
                            <!--  Darck/Ligth Mode  -->
                            <li class="nav-item">
                                <div class="px-2 theme-control-toggle fa-icon-wait">
                                    <input class="form-check-input ms-0 theme-control-toggle-input"
                                        id="themeControlToggle" type="checkbox" data-theme-control="theme"
                                        value="dark" />
                                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-light"
                                        for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label>
                                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark"
                                        for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label>
                                </div>
                            </li>
                            <!--  Profile -->
                            <li class="nav-item ">
                                <a class="nav-link pe-0 ps-2" role="button" href="{{ route('profile.edit') }}">
                                    <div>
                                        @auth
                                            {{ Auth::user()->name }}
                                        @endauth
                                    </div>
                                </a>
                            </li>

                        </ul>

                    </nav>
                    
                    <!--   Page Content-->
                    @yield('content')

                    <!--    footer Content-->
                    <footer class="footer">
                        <div class="mt-4 mb-3 row g-0 justify-content-between fs--1">
                            <div class="text-center col-12 col-sm-auto">
                                <p class="mb-0 text-600">
                                    <span class="d-none d-sm-inline-block"> </span> <br class="d-sm-none" />
                                    2024 &copy; <a href="https://www.webexpert.nl">SMART SERVICE & TOOLS</a>
                                </p>
                            </div>
                            <div class="text-center col-12 col-sm-auto">
                                <p class="mb-0 text-600">v1.1</p>
                            </div>
                        </div>
                    </footer>

                </div>

            </div>
        </main>
        <!-- ===============================================-->
        <!--    End of Main Content-->
        <!-- ===============================================-->


    </div>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendors/prism/prism.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
    <script src="{{ asset('https://polyfill.io/v3/polyfill.min.js?features=window.scroll') }}"></script>
    <script src="{{ asset('vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <script src="{{ asset('assets/js/echarts-example.js') }}"></script>

    @stack('scripts')


</body>

</html>

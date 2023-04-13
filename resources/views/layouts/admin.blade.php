<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">



    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        {{-- Header --}}
        <header class="navbar-dark d-flex sticky-top my-bg-primary flex-md-nowrap align-items-center px-4 shadow my-header justify-content-between">
                <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <a class="navbar-brand col-md-3 col-lg-2 me-0 fw-bold" href="/admin">
                <div style="transform: scale(1);">
                <svg width="150" height="100" viewBox="0 0 389.91304347826093 103.89720702562627" class="css-1j8o68f"><defs id="SvgjsDefs2918"></defs><g id="SvgjsG2919" featurekey="2ou6gm-0" transform="matrix(0.25194356464152035,0,0,0.25194356464152035,20,20)" fill="#111111"><defs xmlns="http://www.w3.org/2000/svg"></defs><g xmlns="http://www.w3.org/2000/svg"><path class="fil0" d="M151 0c84,0 151,68 151,151 0,63 -39,119 -97,141l0 41 -13 0 0 -36c-27,7 -55,7 -82,0l0 36 -12 0 0 -41c-59,-22 -98,-78 -98,-141 0,-83 68,-151 151,-151zm47 127c17,0 30,18 30,40 0,19 -10,35 -23,39l0 80c55,-22 91,-75 91,-135 0,-80 -65,-145 -145,-145 -80,0 -145,65 -145,145 0,60 37,113 92,135l0 -80c-14,-5 -24,-26 -24,-52 0,-10 2,-19 4,-27l10 0 2 22 3 27 3 -27 2 -22 12 0 3 22 3 27 2 -27 3 -22 8 0c3,8 5,17 5,27 0,26 -11,47 -24,52l0 84c27,8 56,8 82,0l0 -84c-13,-4 -23,-20 -23,-39 0,-22 13,-40 29,-40z" style="fill: #ffffff; fill-rule: nonzero;"></path></g></g><g id="SvgjsG2920" featurekey="kZnDdN-0" transform="matrix(2.619172295681901,0,0,2.619172295681901,112.85699124691185,27.808800185477505)" fill="#ffffff"><path d="M5.36 6 c4.08 0 7.08 3.1 7.08 7 s-3 7 -7.08 7 l-4.16 0 l0 -14 l4.16 0 z M5.34 18.42 c3.34 0 5.4 -2.42 5.4 -5.42 s-2.06 -5.42 -5.4 -5.42 l-2.48 0 l0 10.84 l2.48 0 z M16.1 18.44 l6.66 0 l0 1.56 l-7.06 0 l-1.26 0 l0 -14 l1.66 0 l6.48 0 l0 1.56 l-6.48 0 l0 4.64 l5.04 0 l0 1.52 l-5.04 0 l0 4.72 z M26.52 18.44 l6.28 0 l0 1.56 l-7.94 0 l0 -14 l1.66 0 l0 12.44 z M36.46 6 l0 14 l-1.66 0 l0 -14 l1.66 0 z M50.18000000000001 6 l1.76 0 l-6.26 14 l-1.38 0 l-6.24 -14 l1.76 0 l5.18 11.82 z M55.2 18.44 l6.66 0 l0 1.56 l-7.06 0 l-1.26 0 l0 -14 l1.66 0 l6.48 0 l0 1.56 l-6.48 0 l0 4.64 l5.04 0 l0 1.52 l-5.04 0 l0 4.72 z M70.7 12.3 c1.84 0.42 3.04 1.94 3.04 3.7 c0 2.46 -1.6 4 -5.06 4 l-4.72 0 l0 -14 l4.78 0 c2.74 0 4.1 1.56 4.1 3.38 c0 1.34 -0.76 2.42 -2.14 2.92 z M68.62 7.48 l-3 0 l0 4.28 l3 0 c1.6 0 2.58 -0.88 2.58 -2.16 c0 -1.32 -0.92 -2.12 -2.58 -2.12 z M68.62 18.52 c2.4 0 3.46 -0.98 3.46 -2.66 c0 -1.46 -1.06 -2.72 -3.36 -2.72 l-3.1 0 l0 5.38 l3 0 z M82.5 5.800000000000001 c3.64 0 7.16 2.96 7.16 7.2 s-3.52 7.2 -7.16 7.2 c-3.66 0 -7.16 -2.96 -7.16 -7.2 s3.5 -7.2 7.16 -7.2 z M82.5 18.62 c2.74 0 5.44 -2.32 5.44 -5.62 s-2.7 -5.62 -5.44 -5.62 c-2.76 0 -5.44 2.32 -5.44 5.62 s2.68 5.62 5.44 5.62 z M98.62 5.800000000000001 c3.64 0 7.16 2.96 7.16 7.2 s-3.52 7.2 -7.16 7.2 c-3.66 0 -7.16 -2.96 -7.16 -7.2 s3.5 -7.2 7.16 -7.2 z M98.62 18.62 c2.74 0 5.44 -2.32 5.44 -5.62 s-2.7 -5.62 -5.44 -5.62 c-2.76 0 -5.44 2.32 -5.44 5.62 s2.68 5.62 5.44 5.62 z"></path></g></svg></div>
            </a>
            <div class="navbar nav">
                <div class="nav-item text-nowrap ms-2">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-user pe-2"></i> {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </header>

        
        <div class="container-fluid admin-vh-100">
            <div class="row h-100">

                {{-- Sidebar --}}
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block my-text-light fw-bold sidebar collapse my-bg-primary">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                           <li class="nav-item rounded {{ Route::currentRouteName() == 'admin.dashboard' ? 'my-selected' : '' }}">
                                <a class="nav-link" href="{{route('admin.dashboard')}}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item rounded {{ Route::currentRouteName() == 'admin.restaurateurs.index' ? 'my-selected' : '' }}">
                                <a class="nav-link" href="{{route('admin.restaurateurs.index') }}">
                                    <i class="fa-solid fa-utensils"></i> Ristoranti
                                </a>
                            </li>
                            <li class="nav-item rounded {{ Route::currentRouteName() == 'admin.orders.index' ? 'my-selected' : '' }}">
                                <a class="nav-link" href="{{route('admin.orders.index') }}">
                                    <i class="fa-solid fa-chart-line"></i> Ordini
                                </a>
                            </li>
                                {{--
                                <li class="nav-item rounded {{ Route::currentRouteName() == 'admin.tags.index' ? 'bg-secondary' : '' }}">
                                    <a class="nav-link text-white" href="{{route('admin.tags.index')}}">
                                        <i class="fa-solid fa-tag fa-lg fa-fw"></i> Tags
                                    </a>
                                </li>
                                <li class="nav-item rounded {{ Route::currentRouteName() == 'admin.tags.create' ? 'bg-secondary' : '' }}">
                                <a class="nav-link text-white" href="{{route('admin.tags.create')}}">
                                    <i class="fa-solid fa-tag fa-lg fa-fw"></i> Aggiungi un nuovo tag
                                </a>  
                                --}}
                            </li>

                        </ul>
                    </div>
                </nav>

                {{-- Main --}}
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-bg-light my-text-dark">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>


</body>
</html>

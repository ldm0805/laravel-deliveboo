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
        <header class="navbar-dark d-flex sticky-top bg-dark flex-md-nowrap align-items-center px-3 shadow admin-header">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 fw-bold" href="/admin">DeliverBoo</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control form-control-dark w-100" type="text" Placeholder="Search">
            <div class="navbar nav">
                <div class="nav-item text-nowrap ms-2">
                    <a class="btnblue" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </header>

        
        <div class="container-fluid admin-vh-100">
            <div class="row h-100">

                {{-- Sidebar --}}
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                           <li class="nav-item rounded {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}">
                                <a class="nav-link text-white" href="{{route('admin.dashboard')}}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item rounded {{ Route::currentRouteName() == 'admin.restaurateurs.index' ? 'bg-secondary' : '' }}">
                                <a class="nav-link text-white" href="{{route('admin.restaurateurs.index') }}">
                                    <i class="fa-solid fa-newspaper fa-lg fa-fw"></i> Ristoranti
                                </a>
                            </li>
                            <li class="nav-item rounded {{ Route::currentRouteName() == 'admin.plates.index' ? 'bg-secondary' : '' }}">
                                <a class="nav-link text-white" href="{{route('admin.plates.index')}}">
                                    <i class="fa-solid fa-newspaper fa-lg fa-fw"></i> Piatti
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
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>


</body>
</html>

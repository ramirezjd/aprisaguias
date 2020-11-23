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
    <script src="{{ asset('js/jquery.multifield.min.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Aprisa
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @guest
                @else
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @hasrole('super-admin')
                            <li>
                                <a class="navbar-brand" href="{{ url('/guias') }}">
                                    Guias
                                </a>
                            </li>
                        @else
                            @can('ver guia')
                            <li>
                                <a class="navbar-brand" href="{{ url('/guias') }}">
                                    Guias
                                </a>
                            </li>
                            @endcan
                        @endhasrole

                        @hasrole('super-admin')
                            <li>
                                <a class="navbar-brand" href="{{ url('/remesas') }}">
                                    Remesas
                                </a>
                            </li>
                        @else
                            @can('ver remesa')
                            <li>
                                <a class="navbar-brand" href="{{ url('/remesas') }}">
                                    Remesas
                                </a>
                            </li>
                            @endcan
                        @endhasrole

                        @hasrole('super-admin')
                            <li>
                                <a class="navbar-brand" href="{{ url('/users') }}">
                                    Usuarios
                                </a>
                            </li>
                        @else
                            @can('ver usuario')
                            <li>
                                <a class="navbar-brand" href="{{ url('/users') }}">
                                    Usuarios
                                </a>
                            </li>
                            @endcan
                        @endhasrole

                        @hasrole('super-admin')
                            <li>
                                <a class="navbar-brand" href="{{ url('/instalaciones') }}">
                                    Instalaciones
                                </a>
                            </li>
                        @else
                            @can('ver instalacion')
                            <li>
                                <a class="navbar-brand" href="{{ url('/instalaciones') }}">
                                    Instalaciones
                                </a>
                            </li>
                            @endcan
                        @endhasrole

                        @hasrole('super-admin')
                            <li>
                                <a class="navbar-brand" href="{{ url('/vehiculos') }}">
                                    Vehiculos
                                </a>
                            </li>
                        @else
                            @can('ver vehiculo')
                            <li>
                                <a class="navbar-brand" href="{{ url('/vehiculos') }}">
                                    Vehiculos
                                </a>
                            </li>
                            @endcan
                        @endhasrole

                        @hasrole('super-admin')
                            <li>
                                <a class="navbar-brand" href="{{ url('/transportistas') }}">
                                    Transportistas
                                </a>
                            </li>
                        @else
                            @can('ver transportista')
                            <li>
                                <a class="navbar-brand" href="{{ url('/transportistas') }}">
                                    Transportistas
                                </a>
                            </li>
                            @endcan
                        @endhasrole

                        @hasrole('super-admin')
                            <li>
                                <a class="navbar-brand" href="{{ url('/permissions') }}">
                                    Permisos
                                </a>
                            </li>
                        @else
                            @can('ver permisos')
                            <li>
                                <a class="navbar-brand" href="{{ url('/permissions') }}">
                                    Permisos
                                </a>
                            </li>
                            @endcan
                        @endhasrole

                        @hasrole('super-admin')
                            <li>
                                <a class="navbar-brand" href="{{ url('/transportistas') }}">
                                    Roles
                                </a>
                            </li>
                        @else
                            @can('ver transportista')
                            <li>
                                <a class="navbar-brand" href="{{ url('/transportistas') }}">
                                    Roles
                                </a>
                            </li>
                            @endcan
                        @endhasrole
                    </ul>
                @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

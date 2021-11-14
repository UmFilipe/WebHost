<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('/css/css.css') }}" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{@asset('vendor/larapex-charts/apexcharts.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>WebHost</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{' WebHost '}}
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav" style="margin-left: 15%">
                        <li class="nav-item">
                            <a class="nav-link" href="/domain">Domínios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/hosts">Hospedagem</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/servers">Servidores</a>
                        </li>
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar-se') }}</a>
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
        <div>@include('layouts.flash-message')</div>
        <main class="py-4">
            @yield('content')
        </main>
        <div class="container"> 
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @yield('grafico')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    &copy; 2021 WebHost. Criado por <a target="_blank" href="https://github.com/oduardu" title="Eduardo Pazzini Zancanaro">Eduardo</a> & <a target="_blank" href="https://github.com/umfilipe" title="Filipe Medeiros de Almeida">Filipe</a>
                </div>
                <div class="col-lg-3">
                    <ul class="social-icons" >
                        <li><a href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="https://youtube.com"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="https://github.com"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/78376bc006.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" ></script>
    @yield('script')
</body>
</html>

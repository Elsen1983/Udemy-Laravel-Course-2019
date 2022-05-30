<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div id="app">
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary shadow-sm">
            <!-- Navbar content -->
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @guest
                        @else
                            <li class="nav-item dropdown" id="todoDropDown">
                                <a href='#' class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('ToDo Application') }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="todoDropDown">
                                    <a class="dropdown-item" href='{{route("todo.index")}}'>
                                        {{ __('ToDo - Home') }}
                                    </a>
                                    <a class="dropdown-item" href='{{route("todo.view")}}'>
                                        {{ __('ToDo - View') }}
                                    </a>
                                    <a class="dropdown-item" href='{{route("todo.create")}}'>
                                        {{ __('ToDo - Create') }}
                                    </a>


                                </div>
                            </li>
                            <li class="nav-item dropdown" id="cmsDropDown">
                                <a href='#' class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('CMS Application') }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="cmsDropDown">
                                <a class="dropdown-item" href='{{route("cms.index")}}'>
                                        {{ __('CMS - Home') }}
                                    </a>
                                    <a class="dropdown-item" href='{{ route("cms.index")}}'>
                                        {{ __('CMS - Posts') }}
                                    </a>
                                    <a class="dropdown-item" href='{{route("categories.index")}}'>
                                        {{ __('CMS - Categories') }}
                                    </a>


                                </div>
                            </li>

                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarUserDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUserDropdown">
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
                        @else
                            @if (Route::has('login'))
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <u class="list-group">
                                    @foreach($errors->all() as $error)
                                        <li class="list-group-item">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </u>
                            </div>
                        @elseif(session()->has('success'))
                            <div class="alert alert-success">
                                    {{ session()->get('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @yield('content')
        </main>
    </div>
    <script></script>
    {{-- include custom scripts --}}
    @include('panels/scripts')
</body>
</html>


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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://bootswatch.com/4/darkly/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand title" href="/">Lynx Buisness</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav mr-auto">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="/profil">My posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/post">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/post/create">Create a post</a>
                        </li>
                    </ul>
                    @guest
                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                    @else
                    <a href='/profil' id="navbarDropdown" class="nav-link text-white"  role="button">
                        {{ Auth::user()->name }}
                    </a>
                    <a class="mr-2" href="/user/update">
                            <button class="btn btn-primary btn-sm" >Update profil</button>
                        </a>
                    @if( isset(Auth::user()->roles) and in_array('ADMIN',Auth::user()->roles))
                        <a class="mr-2" href="/admin">
                            <button class="btn btn-primary btn-sm" >Admin panel</button>
                        </a>
                        
                    @endif
                    <button class="btn btn-primary btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </button>
                    @endguest
                </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    
        <div class="footer fixed-bottom footer-bg ">
                <div class="d-flex justify-content-between p-2 text-white">
                    <div>
                        Recrutez moi je suis cool
                    </div>
                    <div>
                        ©Copyright Nordine 2020
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
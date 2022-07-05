<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name', 'Plaza') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    @yield('customcss')
</head>
<body>
    <div id="app"  class="d-flex flex-column min-vh-100">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-cyan text-uppercase" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="/img/logo.png" alt="Plaza"></a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="/a/latest">
                                <i class="bi bi-three-dots"></i> Browse
                            </a>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/home"><i class="bi bi-person-fill"></i> My account</a></li>
                        @else
                            <li class="nav-item mx-0 mx-lg-1 dropdown">
                                <a id="navbarDropdown" class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                        
                        <li class="nav-item mx-0 mx-lg-1 mt-2">
                          <button type="button" class="btn btn-light createAdBtn rounded" onclick="location.href='/ads/post'"><i class="bi bi-pin-fill"></i> Post an Ad</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 mt-8">
            @yield('content')
        </main>

        <footer class="mt-auto">
            <!-- Copyright Section-->
            <div class="copyright py-4 text-center text-white">
                <div class="container"><small>Copyright &copy; {{ config('app.name', 'Plaza') }} 2022</small></div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('customjs')
</body>
</html>

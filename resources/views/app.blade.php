<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Makeup webpage</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Main</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Arc
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Arc</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Alapozó</a></li>
                            <li><a class="dropdown-item" href="#">Korrektor</a></li>
                            <li><a class="dropdown-item" href="#">Púder</a></li>
                            <li><a class="dropdown-item" href="#">Pirosító</a></li>
                            <li><a class="dropdown-item" href="#">Kontúr</a></li>
                            <li><a class="dropdown-item" href="#">Bronzer</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Száj
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Száj</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Rúzs</a></li>
                            <li><a class="dropdown-item" href="#">Ajak ceruza</a></li>
                            <li><a class="dropdown-item" href="#">Szájfény</a></li>
                            <li><a class="dropdown-item" href="#">Ajak olaj</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Szem
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Szem</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Szemceruza</a></li>
                            <li><a class="dropdown-item" href="#">Szemhéj paletta</a></li>
                            <li><a class="dropdown-item" href="#">Szempilla spirál</a></li>
                            <li><a class="dropdown-item" href="#">Szemöldök ceruza</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <div class="d-flex ms-auto align-items-center">
                    <form class="d-flex me-2" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
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
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Profil</a></li>
                                    <li><a class="dropdown-item" href="#">Kosár</a></li>
                                    <li><a class="dropdown-item" href="#">Rendelés</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-fill">
        @yield('content')
    </main>

    <footer class="bg-dark text-white mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Kapcsolat</h5>
                    <p>Telefonszám: +36 1 234 5678</p>
                    <p>Email: info@webmakeupstore.hu</p>
                </div>
                <div class="col-md-6">
                    <nav class="footer-nav">
                        <a href="#" class="text-white d-block">Térkép</a>
                        <a href="#" class="text-white d-block">Vezetőség</a>
                        <a href="#" class="text-white d-block">Rólunk</a>
                        <a href="#" class="text-white d-block">Kövess be minket</a>
                        <a href="#" class="text-white d-block">Töltsd le alkalmazásunkat</a>
                        <a href="#" class="text-white d-block">Csatlakozz hozzánk</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

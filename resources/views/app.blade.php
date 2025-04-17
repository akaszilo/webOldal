<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Main</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Arc
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Alapozó</a></li>
                <li><a class="dropdown-item" href="#">Korrektor</a></li>
                <li><a class="dropdown-item" href="#">Púder</a></li>
                <li><a class="dropdown-item" href="#">Pirosító</a></li>
                <li><a class="dropdown-item" href="#">Kontúr</a></li>
                <li><a class="dropdown-item" href="#">Bronzer</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Száj
              </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Rúzs</a></li>
                  <li><a class="dropdown-item" href="#">Ajak ceruza</a></li>
                  <li><a class="dropdown-item" href="#">Szájfény</a></li>
                  <li><a class="dropdown-item" href="#">Ajak olaj</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Szem
              </a>
              <ul class="dropdown-menu">
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
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                       role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false" v-pre>
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
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</body>

</html>

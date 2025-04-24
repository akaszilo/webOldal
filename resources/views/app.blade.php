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
            <a class="navbar-brand" href="{{ route('home') }}">
                Makeup store
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('face') }}" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Face
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('face') }}">Face</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 1]) }}">Foundation</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 2]) }}">Concealer</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 2]) }}">Powder</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 3]) }}">Blush</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 4]) }}">Bronzer</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 5]) }}">Contour</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('lips') }}" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Lips
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('lips') }}">Lips</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 6]) }}">Lipstick</a></li>
                            <li><a class="dropdown-item" href="{{ route('categories.show', ['category' => 7]) }}">Lip
                                    liner</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 8]) }}">Lipgloss</a></li>
                            <li><a class="dropdown-item" href="{{ route('categories.show', ['category' => 9]) }}">Lip
                                    oil</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('eyes') }}" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Eyes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('eyes') }}">Eyes</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 10]) }}">Eyeliner</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 11]) }}">Eyeshadow Palette</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 12]) }}">Mascara</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 13]) }}">Eyebrow Pencil</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <div class="d-flex ms-auto align-items-center">
                    <form class="d-flex me-2" role="search" action="{{ route('search') }}" method="GET">
                        <input class="form-control me-2" type="search" id="search" name="search"
                            placeholder="Search" aria-label="Search" autocomplete="off">
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
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Cart</a></li>
                                    <li><a class="dropdown-item" href="#">Order</a></li>
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

    <div id="searchResults" class="list-group"
        style="position: absolute; top: 100%; left: 0; z-index: 1000; width: 100%; display: none;">
    </div>

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('.dropdown');

            dropdowns.forEach(dropdown => {
                dropdown.addEventListener('mouseenter', () => {
                    dropdown.classList.add('show');
                    dropdown.querySelector('.dropdown-menu').classList.add('show');
                });

                dropdown.addEventListener('mouseleave', () => {
                    dropdown.classList.remove('show');
                    dropdown.querySelector('.dropdown-menu').classList.remove('show');
                });
            });
        });

         document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const searchResults = document.getElementById('searchResults');

            searchInput.addEventListener('input', function() {
                let query = this.value;

                if (query.length > 2) {
                    fetch('/search/autocomplete?query=' + query)
                        .then(response => response.json())
                        .then(data => {
                            searchResults.innerHTML = '';
                            if (data.length > 0) {
                                data.forEach(product => {
                                    let a = document.createElement('a');
                                    a.href = '/product/' + product.id;
                                    a.classList.add('list-group-item',
                                        'list-group-item-action');
                                    a.textContent = product.name;
                                    searchResults.appendChild(a);
                                });
                                searchResults.style.display = 'block';
                            } else {
                                let noResults = document.createElement('div');
                                noResults.classList.add('list-group-item');
                                noResults.textContent = 'Nincs találat.';
                                searchResults.appendChild(noResults);
                                searchResults.style.display = 'block';
                            }
                        });
                } else {
                    searchResults.style.display = 'none';
                }
            });

            document.addEventListener('click', function(event) {
                if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
                    searchResults.style.display = 'none';
                }
            });
        });
    </script>


</body>

</html>

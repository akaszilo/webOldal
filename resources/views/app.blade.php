<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Makeup webpage</title>
</head>

<body class="d-flex flex-column min-vh-100">

    {{-- navbar start --}}
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm h-20">
        <div class="container">

            {{-- link to main page --}}
            <a class="navbar-brand" href="{{ route('home') }}">
                Makeup store
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                {{-- categories and brands start --}}
                <ul class="navbar-nav me-auto">

                    {{-- all products --}}
                    <a class="nav-link" href="{{ route('all') }}" role="button">
                        All products
                    </a>

                    {{-- faceproducts start --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('face') }}" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Face
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('face') }}">Face</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 1]) }}">Foundation</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 2]) }}">Concealer</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 3]) }}">Powder</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 4]) }}">Blush</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 5]) }}">Bronzer</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 6]) }}">Contour</a>
                            </li>
                        </ul>
                    </li>
                    {{-- faceproducts end --}}

                    {{-- lips products start --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('lips') }}" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Lips
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('lips') }}">Lips</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 7]) }}">Lipstick</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('categories.show', ['category' => 8]) }}">Lip
                                    liner</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 9]) }}">Lipgloss</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('categories.show', ['category' => 10]) }}">Lip
                                    oil</a>
                            </li>
                        </ul>
                    </li>
                    {{-- lips products end --}}

                    {{-- eyes products start --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('eyes') }}" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Eyes
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('eyes') }}">Eyes</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 11]) }}">Eyeliner</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 12]) }}">Eyeshadow Palette</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 13]) }}">Mascara</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categories.show', ['category' => 14]) }}">Eyebrow Pencil</a>
                            </li>
                        </ul>
                    </li>
                    {{-- eyes products end --}}

                    {{-- to show brands start --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Brands
                        </a>
                        <ul class="dropdown-menu p-3" style="min-width: 700px; max-width: 1000px;">
                            <div class="row">
                                @php
                                    $columns = 3;
                                    $brandsPerCol = ceil($allBrands->count() / $columns);
                                @endphp
                                @foreach ($allBrands->chunk($brandsPerCol) as $brandChunk)
                                    <div class="col-4">
                                        @foreach ($brandChunk as $brand)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('brands.show', $brand->id) }}">{{ $brand->name }}</a>
                                            </li>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </ul>
                    </li>
                    {{-- to show brands end --}}
                </ul>
                {{-- categories and brands end --}}

                {{-- search bar start --}}
                <form class="d-flex mt-2" role="search" action="{{ route('search') }}" method="GET">
                    <input class="form-control me-2" type="search" id="search" name="search"
                        placeholder="Search" aria-label="Search" autocomplete="off">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                {{-- search bar end --}}

                {{-- cart icon to go to cart if you logged in start --}}
                <div class="mx-3">
                    @php
                        $cart = session('cart', []);
                        $cartCount = array_sum(array_column($cart, 'quantity'));
                    @endphp

                    @auth
                        <a href="{{ route('user.cart') }}" class="nav-link position-relative ms-3">
                            <i class="fa-solid fa-cart-shopping"></i>
                            @if ($cartCount > 0)
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $cartCount }}
                                    <span class="visually-hidden">Items in cart</span>
                                </span>
                            @endif
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link position-relative ms-3">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    @endauth
                </div>
                {{-- cart icon to go to cart if you logged in end --}}

                {{-- login and register button start --}}
                <ul class="navbar-nav">

                    {{-- show this if the user is not logged in --}}
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
                        {{-- show this if the user is logged in --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile') }}#tab-profile">Profile</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('profile') }}#tab-orders">Rendeléseim</a>
                                </li>
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
                {{-- login and register button end --}}
            </div>
        </div>
    </nav>
    {{-- navbar end --}}

    {{-- main page start --}}
    <main class="flex-fill">
        @yield('content')
    </main>
    {{-- main page end --}}

    {{-- footer start --}}
    <footer class="bg-dark text-white mt-5 py-4">
        <div class="container">
            <div class="row">
                <!-- Kapcsolat + térkép -->
                <div class="col-md-4 mb-3">
                    <h5>Contact</h5>
                    <p>Phone number: +36 1 234 5678</p>
                    <p>Email: projectmakeupstore2025@gmail.com</p>
                    <div class="mt-3">
                        <iframe width="100%" height="150" frameborder="0" style="border:0" allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10722.82433437299!2d19.0402352!3d47.4979122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dc1e3e2b9b0f%3A0x400c4290c1e1c50!2sBudapest!5e0!3m2!1sen!2shu!4v1715447740000!5m2!1sen!2shu">
                        </iframe>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="col-md-4 mb-3">
                    <h5>Pages</h5>
                    <nav class="footer-nav">
                        <a href="#" class="text-white d-block">Management</a>
                        <a href="#" class="text-white d-block">About us</a>
                        <a href="#" class="text-white d-block">Follow us</a>
                    </nav>
                </div>

                <!-- Social media -->
                <div class="col-md-4 mb-3">
                    <h5>Follow us</h5>
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-instagram fa-2x"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-twitter fa-2x"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-youtube fa-2x"></i></a>
                    <p class="mt-3">© {{ date('Y') }} Project Makeup Store</p>
                </div>
            </div>
        </div>
    </footer>
    {{-- footer end --}}

    {{-- js code start --}}
    <script>
        /* handle the dropdowm menu */
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
    </script>
    {{-- js code end --}}
</body>

</html>

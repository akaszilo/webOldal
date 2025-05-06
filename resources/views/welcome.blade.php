@extends('app')
@vite('resources/css/app.css')
@section('content')

    @if(session('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
            <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="10000">
                <div class="toast-header">
                    <strong class="me-auto">Siker!</strong>
                    <small class="text-muted">most</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                var toastEl = document.getElementById('successToast');
                if (toastEl) {
                    var toast = new bootstrap.Toast(toastEl);
                    toast.show();
                }
            });
        </script>
    @endif

    <main class="container mt-4">
        <h1>Hello, {{ $user->name }}! :)</h1>
        <!-- Bestsellers -->
        <br>
        <section class="bestsellers mb-5">
            <h1 class="mb-4">Legnépszerűbb termékek</h1>
            <div class="row">
                @foreach ($bestsellers as $product)
                    <div class="col-md-3 mb-4">
                        <a href="{{ route('product.show', $product->id) }}" class="card-link">
                            <div class="card product-card h-100">
                                <img src="{{ asset($product->image_link) }}" class="card-img-top img-fluid"
                                    alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $product->name }}</h3>
                                </a>
                                    <h5>{{ $product->brand->name }}</h5>
                                    <p class="card-text">Price: {{ $product->price }} $</p>
                                    <p class="card-text">Sold: {{ $product->sold_quantity }} db</p>
                                    <p class="card-text">In stock: {{ $product->instock }} db</p>
                                </div>
                            </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Legfrissebb termékek -->
        <section class="latest-products">
            <h2>Newest products</h2>
            <div class="row">
                @foreach ($latestProducts as $product)
                    <div class="col-md-3 mb-4">
                        <a href="{{ route('product.show', $product->id) }}" class="card-link">
                            <div class="card product-card h-100">
                                <img src="{{ asset($product->image_link) }}" class="card-img-top img-fluid"
                                    alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $product->name }}</h3>
                                </a>
                                    <h5>{{ $product->brand->name }}</h5>
                                    <p class="card-text">Price: {{ $product->price }} $</p>
                                    <p class="card-text">Sold: {{ $product->sold_quantity }} db</p>
                                    <p class="card-text">In stock: {{ $product->instock }} db</p>
                                </div>
                            </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Kiemelt márkák -->
        <section class="brands">
            <h2>Highlighted brands</h2>
            <div class="row">
                @foreach ($featuredBrands as $brand)
                    <div class="col-md-3 mb-4">
                        <a href="{{ route('brands.show', $brand->id) }}">
                            <button class="bg-gradient-to-r from-pink-500 to-red-500 text-black text-lg font-semibold py-3 px-6 rounded-full">{{$brand->name}}</button>
                        </a>
                        
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Elégedettségi kérdőív -->
        <section class="survey">
            <h2>Elégedettségi kérdőív</h2>
            <button>😊</button>
            <button>😐</button>
            <button>☹️</button>
        </section>
    </main>
@endsection

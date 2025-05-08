@extends('app')
@vite('resources/css/app.css')
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3"
            role="alert" style="z-index:9999; min-width:300px;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            setTimeout(function() {
                var alert = document.querySelector('.alert');
                if (alert) alert.classList.remove('show');
            }, 2500);
        </script>
    @endif


    <main class="container mt-4">
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
                                    <h5>{{ $product->brand->name }}</h5>
                                    <p class="card-text">Price: {{ $product->price }} $</p>
                                    <p class="card-text">Sold: {{ $product->sold_quantity }} db</p>
                                    <p class="card-text">In stock: {{ $product->instock }} db</p>
                                </div>
                        </a>
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
                                    <h5>{{ $product->brand->name }}</h5>
                                    <p class="card-text">Price: {{ $product->price }} $</p>
                                    <p class="card-text">Sold: {{ $product->sold_quantity }} db</p>
                                    <p class="card-text">In stock: {{ $product->instock }} db</p>
                        </a>
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
                            <button
                                class="bg-gradient-to-r from-pink-500 to-red-500 text-black text-lg font-semibold py-3 px-6 rounded-full">{{ $brand->name }}</button>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection

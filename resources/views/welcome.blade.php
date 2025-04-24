@extends('app')

@section('content')
    <main class="container mt-4">
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="registrationToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Hello {{ $userName }}</strong>
                    <small class="text-muted">most</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Sikeresen regisztráltál!
                </div>
            </div>
        </div>
        <!-- Bestsellerek -->
        <section class="bestsellers mb-5">
            <h2 class="mb-4">Legnépszerűbb termékek</h2>
            <div class="row">
                @foreach ($bestsellers as $product)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('product.show', $product->id) }}" class="card-link">
                            <div class="card product-card">
                                <img src="{{ asset($product->image_link) }}" class="card-img-top img-fluid"
                                    alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $product->name }}</h3>
                                    <h5>{{ $product->brand->name }}</h5>
                                    <p class="card-text">Price: {{ $product->price }} $</p>
                                    <p class="card-text">Sold: {{ $product->sold_quantity }} db</p>
                                    <p class="card-text">In stock: {{ $product->instock }} db</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Legfrissebb termékek -->
        <section class="latest-products">
            <h2>Newest products</h2>
            <div class="row">
                @foreach ($latestProducts as $product)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('product.show', $product->id) }}" class="card-link">
                            <div class="card product-card">
                                <img src="{{ asset($product->image_link) }}" class="card-img-top img-fluid"
                                    alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $product->name }}</h3>
                                    <h5>{{ $product->brand->name }}</h5>
                                    <p class="card-text">Price: {{ $product->price }} $</p>
                                    <p class="card-text">Sold: {{ $product->sold_quantity }} db</p>
                                    <p class="card-text">In stock: {{ $product->instock }} db</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            </div>
        </section>

        <!-- Kiemelt márkák -->
        <section class="brands">
            <h2>Highlighted brands</h2>
            <div class="row">
                @foreach ($featuredBrands as $brand)
                    <div class="col-md-3 mb-4">
                        <a href="{{ route('brand.show', $brand->id) }}">
                            <button>{{ $brand->name }}</button>
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

    <script>
        window.addEventListener('load', () => {
            @if (Session::has('success'))
                const toast = new bootstrap.Toast(document.getElementById('registrationToast'));
                toast.show();
                setTimeout(() => {
                    toast.hide();
                }, 10000);
            @endif
        });
    </script>
@endsection

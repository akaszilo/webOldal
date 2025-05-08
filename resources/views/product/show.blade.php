@extends('app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3"
            role="alert" style="z-index:9999; min-width:300px;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Bezár"></button>
        </div>
        <script>
            setTimeout(function() {
                var alert = document.querySelector('.alert');
                if (alert) alert.classList.remove('show');
            }, 2500);
        </script>
    @endif
    <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <div class="container py-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset($product->image_link) }}" class="img-fluid" alt="{{ $product->name }}"
                                style="max-width: 150px;">
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <h1 class="card-title">{{ $product->name }}</h1>
                            </div>
                            <h5 class="card-subtitle mb-2 text-muted">
                                <a href="{{ route('brands.show', $product->brand->id) }}">
                                    {{ $product->brand->name }}
                                </a>
                            </h5>
                            <p class="card-text">In stock: {{ $product->instock }} db</p>
                            <p class="card-text">Sold: {{ $product->sold_quantity }} db</p>
                            <p style="font-weight: bolder">Ingredients</p>
                            <p class="card-text">{{ $product->ingredients }}</p>
                            <p style="font-weight: bolder">How to use</p>
                            <p class="card-text">{{ $product->howtouse }}</p>
                        </div>
                        <div class="col-md-3 d-flex flex-column align-items-center">
                            <h1 class="card-text mt-5 mb-5" style="font-weight: bold;">
                                {{ $product->price }} $
                            </h1>
                            <div class="d-flex align-items-center mb-2">
                                <input type="number" name="quantity" class="form-control me-2" value="1"
                                    min="1" style="width: 60px;">
                                <i class="bi bi-cart-fill me-2" style="font-size: 1.5rem;"></i>
                                <button class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-4">
        <div class="col-md-12">
            <h3>Recommended</h3>
        </div>
        @foreach ($randomProducts as $randomProduct)
            <div class="col-md-3 mb-4">
                <a href="{{ route('product.show', $randomProduct->id) }}" class="card-link">
                    <div class="card product-card">
                        <img src="{{ asset($randomProduct->image_link) }}" class="card-img-top img-fluid"
                            alt="{{ $randomProduct->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $randomProduct->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $randomProduct->brand->name }}</h6>
                            <p class="card-text">Price: {{ $randomProduct->price }} $</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    </div>

    <script>
        window.onload = function() {
            var popup = document.getElementById('successPopup');
            if (popup) {
                popup.style.display = 'block';
                setTimeout(function() {
                    popup.style.display = 'none';
                }, 10000); 
            }
        };
    </script>
@endsection

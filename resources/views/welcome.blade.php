@extends('app')

@section('content')
    <style>
        .popup {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #5cb85c;
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
            z-index: 1000;
            display: none;
        }
    </style>

    @if(session('success'))
        <div id="successPopup" class="popup">
            {{ session('success') }}
        </div>
    @endif
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
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('product.show', $product->id) }}" class="card-link">
                            <div class="card product-card">
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
        window.onload = function() {
            var popup = document.getElementById('successPopup');
            if (popup) {
                popup.style.display = 'block';
                setTimeout(function() {
                    popup.style.display = 'none';
                }, 10000); // 10 másodperc
            }
        };
    </script>
@endsection

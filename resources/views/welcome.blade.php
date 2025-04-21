@extends('app')

@section('content')

<main class="container mt-4">
    <!-- Bestsellerek -->
    <section class="bestsellers mb-5">
        <h2 class="mb-4">Legnépszerűbb termékek</h2>
        <div class="row">
            @foreach($bestsellers as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ $product->image_link }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">
                            {{ number_format($product->price,0,',',' ') }} Ft
                        </p>
                        <p class="text-muted">Eladott darab: {{ $product->sold_quantity }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Legfrissebb termékek -->
    <section class="latest-products">
        <h2>Legfrissebb termékek</h2>
        <div class="row">
            @foreach($latestProducts as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ $product->image_link }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">
                            {{ number_format($product->price,0,',',' ') }} Ft
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Kiemelt márkák -->
    <section class="brands">
        <h2>Kiemelt márkák</h2>
        <div class="row">
            @foreach($featuredBrands as $brand)
            <div class="col-md-3 mb-4">
                <h3>{{ $brand->name }}</h3>
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

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
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <a href="{{ route('product.show', $product->id) }}">
                            <img src="{{ $product->image_link }}" class="card-img-top w-[154px] h-[154px]" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                            </a>
                                <p class="card-text">
                                    {{ number_format($product->price, 0, ',', ' ') }} $
                                </p>
                                <p>{{ $product->brand->name }}</p>
                                <p class="text-muted">Eladott darab: {{ $product->sold_quantity }}</p>
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
                        <div class="card h-100">
                            <a href="{{ route('product.show', $product->id) }}">
                             <img src="{{ $product->image_link }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p>{{ $product->brand->name }}</p>
                                <p class="card-text">
                                    {{ number_format($product->price, 0, ',', ' ') }} $
                                </p>
                            </div>
                            </a>
                           
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
                        <a href=""></a>
                        <button>{{$brand->name}}</button>
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

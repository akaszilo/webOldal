@extends('layouts.app');

    <main class="container mt-4">
        <!-- Legnépszerűbb termékek -->
        <!-- 
        {{-- 
        <section class="bestsellers mb-5">
            <h2 class="mb-4">Legnépszerűbb termékek</h2>
            <div class="row">
                @foreach($bestsellers as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">
                                @if($product->is_in_sale)
                                    <del>{{ number_format($product->price, 0, ',', ' ') }} Ft</del>
                                    {{ number_format($product->price * (1 - $product->sale_percent/100), 0, ',', ' ') }} Ft
                                    <span class="badge bg-danger">{{ $product->sale_percent }}%</span>
                                @else
                                    {{ number_format($product->price, 0, ',', ' ') }} Ft
                                @endif
                            </p>
                            <p class="text-muted">Eladott darab: {{ $product->sold_quantity }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
         --}}
      -->

        <!-- Kedvezményes termékek -->
        {{-- 
        <section class="discounted-products mb-5">
            <h2 class="mb-4">Akciós termékek</h2>
            <div class="row">
                @foreach($discountedProducts as $product)
                <div class="col-md-3 mb-4">
                    <!-- Hasonló kártya struktúra -->
                </div>
                @endforeach
            </div>
        </section>
 --}}
        <!-- Legfrissebb termékek -->
        <section class="latest-products">
            <h2>Legfrissebb termékek</h2>
            <!-- Új termékek listája -->
        </section>

        <!-- Kiemelt márkák -->
        <section class="brands">
            <h2>Kiemelt márkák</h2>
            <!-- Márkák logói -->
        </section>

        <!-- Elégedettségi kérdőív -->
        <section class="survey">
            <h2>Elégedettségi kérdőív</h2>
            <button>😊</button>
            <button>😐</button>
            <button>☹️</button>
        </section>
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
</body>
</html>

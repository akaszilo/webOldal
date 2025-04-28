@extends('app')

@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var hash = window.location.hash;
            if (hash) {
                var tabTrigger = document.querySelector('a[href="' + hash + '"]');
                if (tabTrigger) {
                    var tab = new bootstrap.Tab(tabTrigger);
                    tab.show();
                }
            }
        });
    </script>

    <!-- Alert message if action was successful -->
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

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group" id="profile-tabs" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="orders-tab" data-bs-toggle="list"
                        href="#tab-orders" role="tab" aria-controls="orders">
                        Rendeléseim
                    </a>
                    <a class="list-group-item list-group-item-action" id="cards-tab" data-bs-toggle="list" href="#tab-cards"
                        role="tab" aria-controls="cards">
                        Bankkártyáim
                    </a>
                    <a class="list-group-item list-group-item-action" id="addresses-tab" data-bs-toggle="list"
                        href="#tab-addresses" role="tab" aria-controls="addresses">
                        Címeim
                    </a>
                    <a class="list-group-item list-group-item-action" id="cart-tab" data-bs-toggle="list" href="#tab-cart"
                        role="tab" aria-controls="cart">
                        Kosár
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <h1 class="mt-3 mb-3">Hello, {{ $user->name }}!</h1>
                <div class="tab-content" id="nav-tabContent">
                    <!-- RENDELÉSEK -->
                    <div class="tab-pane fade show active" id="tab-orders" role="tabpanel" aria-labelledby="orders-tab">
                        <h2>Rendeléseim</h2>

                        <!-- Rendelés státusz szűrő linkek -->
                        <div class="mb-3">
                            <a href="{{ route('profile') }}?orders=all" class="btn btn-outline-primary btn-sm">Összes</a>
                            <a href="{{ route('profile') }}?orders=pending"
                                class="btn btn-outline-primary btn-sm">Függőben</a>
                            <a href="{{ route('profile') }}?orders=shipped"
                                class="btn btn-outline-primary btn-sm">Feladva</a>
                            <a href="{{ route('profile') }}?orders=delivered"
                                class="btn btn-outline-primary btn-sm">Kézbesítve</a>
                        </div>

                        @if (count($orders) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Rendelés Azonosító</th>
                                        <th>Dátum</th>
                                        <th>Összeg</th>
                                        <th>Státusz</th>
                                        <th>Műveletek</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                                <a href="{{ route('order.details', $order) }}"
                                                    class="btn btn-sm btn-info">Részletek</a>

                                                @if ($order->status === 'pending')
                                                    <form action="{{ route('order.destroy', $order) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Biztosan törlöd a rendelést?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Törlés</button>
                                                    </form>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Nincs rendelésed.</p>
                        @endif
                    </div>

                    <!-- BANKKÁRTYÁK -->
                    <div class="tab-pane fade" id="tab-cards" role="tabpanel" aria-labelledby="cards-tab">
                        <h2>Bankkártyáim</h2>
                        @if ($creditCards->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kártyaszám</th>
                                        <th>Név</th>
                                        <th>Lejárati dátum</th>
                                        <th>Műveletek</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($creditCards as $card)
                                        <tr>
                                            <td>{{ $card->card_number }}</td>
                                            <td>{{ $card->name }}</td>
                                            <td>{{ $card->expiry_month }}/{{ $card->expiry_year }}</td>
                                            <td>
                                                <a href="{{ route('credit_cards.edit', $card) }}"
                                                    class="btn btn-sm btn-warning">Szerkesztés</a>
                                                <form action="{{ route('credit_cards.destroy', $card) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Biztosan törlöd?')">Törlés</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Nincsenek mentett bankkártyáid.</p>
                        @endif
                        <a href="{{ route('credit_cards.create') }}" class="btn btn-primary mt-2">Bankkártya
                            hozzáadása</a>
                    </div>

                    <!-- CÍMEK -->
                    <div class="tab-pane fade" id="tab-addresses" role="tabpanel" aria-labelledby="addresses-tab">
                        <h2>Címeim</h2>
                        @if ($addresses->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Irányítószám</th>
                                        <th>Város</th>
                                        <th>Utca</th>
                                        <th>Házszám</th>
                                        <th>Megjegyzés</th>
                                        <th>Műveletek</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($addresses as $address)
                                        <tr>
                                            <td>{{ $address->postCode }}</td>
                                            <td>{{ $address->city }}</td>
                                            <td>{{ $address->street }}</td>
                                            <td>{{ $address->houseNumber }}</td>
                                            <td>{{ $address->note }}</td>
                                            <td>
                                                <a href="{{ route('addresses.edit', $address->id) }}"
                                                    class="btn btn-sm btn-warning">Szerkesztés</a>

                                                <form action="{{ route('addresses.destroy', $address->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Biztosan törlöd?')">Törlés</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Nincs mentett címed.</p>
                        @endif
                        <a href="{{ route('addresses.create') }}" class="btn btn-primary">Cím hozzáadása</a>
                    </div>

                    <!-- KOSÁR -->
                    <div class="tab-pane fade" id="tab-cart" role="tabpanel" aria-labelledby="cart-tab">
                        <h2>Kosár</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Termék</th>
                                    <th>Kép</th>
                                    <th>Ár</th>
                                    <th>Mennyiség</th>
                                    <th>Részösszeg</th>
                                    <th>Művelet</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach ($cart as $productId => $product)
                                    @php
                                        $subtotal = $product['price'] * $product['quantity'];
                                        $total += $subtotal;
                                    @endphp
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="selected_products[]" value="{{ $productId }}"
                                                checked>
                                        </td>
                                        <td>{{ $product['name'] }}</td>
                                        <td><img src="{{ $product['image'] }}" width="50"
                                                alt="{{ $product['name'] }}"></td>
                                        <td>${{ number_format($product['price'], 2) }}</td>
                                        <td>
                                            <form action="{{ route('cart.update', $productId) }}" method="POST"
                                                class="quantity-form me-2">
                                                @csrf
                                                <input type="number" name="quantity" value="{{ $product['quantity'] }}"
                                                    min="1" class="form-control form-control-sm quantity-input">
                                                <button type="submit" class="btn btn-primary btn-sm">Frissítés</button>
                                            </form>

                                        </td>
                                        <td>${{ number_format($subtotal, 2) }}</td>
                                        <td>
                                            <form action="{{ route('cart.destroy', $productId) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Törlés</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="text-end"><strong>Végösszeg:</strong></td>
                                    <td><strong>${{ number_format($total, 2) }}</strong></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <form action="{{ route('order.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

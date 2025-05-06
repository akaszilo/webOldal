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
                    <a class="list-group-item list-group-item-action" id="profile-tab" data-bs-toggle="list"
                        href="#tab-profile" role="tab" aria-controls="profile">
                        Profil
                    </a>
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
                    <!-- PROFIL -->
                    <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h2>Profil adatok módosítása</h2>
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Név</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email cím</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Új jelszó</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    autocomplete="new-password">
                                <small class="form-text text-muted">Hagyd üresen, ha nem szeretnéd módosítani.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Mentés</button>
                        </form>
                    </div>

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
                                        <th>Termék neve</th>
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
                                            <td>
                                                @foreach ($order->items as $item)
                                                    {{ $item->product->name }}@if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                            <td>{{ number_format($order->total, 2) }} $</td>
                                            <td>{{ ucfirst($order->status) }}</td>
                                            <td>
                                                <a href="{{ route('order.details', $order) }}"
                                                    class="btn btn-sm btn-info">Részletek</a>
                                                @if ($order->status === 'pending')
                                                    <form action="{{ route('order.destroy', $order) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Biztosan törlöd a rendelést?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Törlés</button>
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
    @if ($cart && count($cart) > 0)
        <table class="table" id="cart-table">
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
                            <!-- Ez a checkbox a checkout formba is kell majd! -->
                            <input type="checkbox" class="cart-checkbox"
                                name="selected_products[]" value="{{ $productId }}" checked
                                data-subtotal="{{ $subtotal }}" form="checkout-form">
                        </td>
                        <td>{{ $product['name'] }}</td>
                        <td><img src="{{ $product['image'] }}" width="50" alt="{{ $product['name'] }}"></td>
                        <td>${{ number_format($product['price'], 2) }}</td>
                        <td>
                            <!-- MENNYISÉG FRISSÍTÉSE: külön form! -->
                            <form action="{{ route('cart.update', $productId) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="number" name="quantity"
                                    value="{{ $product['quantity'] }}" min="1"
                                    class="form-control form-control-sm quantity-input"
                                    style="width: 80px; display: inline-block;">
                                <button type="submit" class="btn btn-primary btn-sm">Frissítés</button>
                            </form>
                        </td>
                        <td class="subtotal-cell">${{ number_format($subtotal, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.destroy', $productId) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Törlés</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-end"><strong>Végösszeg:</strong></td>
                    <td id="cart-total"><strong>${{ number_format($total, 2) }}</strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <!-- CHECKOUT FORM: csak a gomb és a checkboxok! -->
        <form action="{{ route('order.checkout') }}" method="POST" id="checkout-form" class="mt-3">
            @csrf
            @foreach ($cart as $productId => $product)
                <!-- A checkboxokat a checkout formban is el kell helyezni, vagy a fenti inputoknak legyen form="checkout-form" attribútuma! -->
                <!-- <input type="checkbox" name="selected_products[]" value="{{ $productId }}" checked style="display:none;"> -->
            @endforeach
            <button type="submit" class="btn btn-success btn-lg">Checkout</button>
        </form>
    @else
        <p>A kosarad üres.</p>
    @endif
</div>


                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateCartTotal() {
                let total = 0;
                document.querySelectorAll('.cart-checkbox').forEach(function(checkbox) {
                    if (checkbox.checked) {
                        total += parseFloat(checkbox.getAttribute('data-subtotal'));
                    }
                });
                document.getElementById('cart-total').innerHTML = '<strong>$' + total.toFixed(2) + '</strong>';
            }
            document.querySelectorAll('.cart-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', updateCartTotal);
            });
            updateCartTotal();
        });
    </script>

@endsection

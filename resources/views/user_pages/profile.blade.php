@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group" id="profile-tabs">
                    <a href="#" class="list-group-item list-group-item-action" data-tab="orders">
                        Rendeléseim
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" data-tab="cards">
                        Bankkártyáim
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" data-tab="addresses">
                        Címeim
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" data-tab="cart">
                        Kosár
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <h1 class="mt-3 mb-3">Hello, {{ $user->name }}!</h1>

                <!-- RENDELÉSEK -->
                <div id="tab-orders" class="profile-tab-content" style="display: none;">
                    <h2>Rendeléseim</h2>
                    @if (count($orders) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Rendelés Azonosító</th>
                                    <th>Dátum</th>
                                    <th>Összeg</th>
                                    <th>Státusz</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->total }}</td>
                                        <td>{{ $order->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Nincs rendelésed.</p>
                    @endif
                </div>

                <!-- BANKKÁRTYÁK -->
                <div id="tab-cards" class="profile-tab-content" style="display: none;">
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
                    <a href="{{ route('credit_cards.create') }}" class="btn btn-primary mt-2">Bankkártya hozzáadása</a>
                </div>

                <!-- CÍMEK -->
                <div id="tab-addresses" class="profile-tab-content" style="display: none;">
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
                                            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST"
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
                        <p>Nincs mentett címed.</p>
                    @endif
                    <a href="{{ route('addresses.create') }}" class="btn btn-primary">Cím hozzáadása</a>
                </div>

                <!-- KOSÁR -->
                <div id="tab-cart" class="profile-tab-content" style="display: none;">
                    <h2>Kosár</h2>
                    @if ($cart && count($cart) > 0)
                        <table class="table">
                            <thead>
                                <tr>
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
                                        <td>{{ $product['name'] }}</td>
                                        <td><img src="{{ $product['image'] }}" width="50"
                                                alt="{{ $product['name'] }}">
                                        </td>
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
                                            <form action="{{ route('cart.remove', $productId) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Törlés</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Végösszeg:</strong></td>
                                    <td><strong>${{ number_format($total, 2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <form action="{{ route('order.checkout') }}" method="GET" class="text-center">
                            <button type="submit" class="btn btn-success btn-lg">Checkout</button>
                        </form>
                    @else
                        <p>A kosarad üres.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('#profile-tabs a');
            const contents = document.querySelectorAll('.profile-tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();

                    tabs.forEach(t => t.classList.remove('active'));
                    contents.forEach(c => c.style.display = 'none');

                    this.classList.add('active');
                    document.getElementById('tab-' + this.dataset.tab).style.display = 'block';
                });
            });

            // Show default tab
            const defaultTab = document.querySelector('#profile-tabs a[data-tab="orders"]');
            if (defaultTab) {
                defaultTab.click();
            }
        });
    </script>
@endsection

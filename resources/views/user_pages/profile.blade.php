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
                    <a href="#" class="list-group-item list-group-item-action active" data-tab="addresses">
                        Címeim
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" data-tab="cart">
                        Kosár
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <h1 class="mt-3 mb-3">Hello, {{ Auth::user()->name }}!</h1>

                <!-- CÍMEK -->
                <div id="tab-addresses" class="profile-tab-content">
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
                                                class="btn btn-sm btn-warning">Módosít</a>
                                            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Biztosan törlöd?')">Töröl</button>
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

                <!-- RENDELÉSEK -->
                <div id="tab-orders" class="profile-tab-content" style="display:none;">
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
                <div id="tab-cards" class="profile-tab-content" style="display:none;">
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

                <!-- KOSÁR -->
                <div id="tab-cart" class="profile-tab-content" style="display:none;">
                    <h2>Kosár</h2>
                    <p>A kosár tartalma itt jelenhet meg.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('#profile-tabs a').forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                // Tab aktiválása
                document.querySelectorAll('#profile-tabs a').forEach(function(t) {
                    t.classList.remove('active');
                });
                tab.classList.add('active');
                // Tartalom váltása
                document.querySelectorAll('.profile-tab-content').forEach(function(content) {
                    content.style.display = 'none';
                });
                document.getElementById('tab-' + tab.dataset.tab).style.display = 'block';
            });
        });
    </script>
@endsection

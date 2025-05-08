@extends('app')

@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var hash = window.location.hash;
            if (hash) {
                var tabTrigger = document.querySelector('button[data-bs-target="' + hash + '"]');
                if (tabTrigger) {
                    var tab = new bootstrap.Tab(tabTrigger);
                    tab.show();
                }
            }
        });
    </script>








    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3"
            role="alert" style="z-index:9999; min-width:300px;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
            <!-- Tab navigation -->
            <div class="col-md-3">
                <ul class="nav nav-tabs flex-column" id="profile-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="cart-tab" data-bs-toggle="tab" data-bs-target="#tab-profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="true">
                            Profile
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#tab-orders"
                            type="button" role="tab" aria-controls="orders" aria-selected="false">
                            My Orders
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="cards-tab" data-bs-toggle="tab" data-bs-target="#tab-cards"
                            type="button" role="tab" aria-controls="cards" aria-selected="false">
                            My Cards
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="addresses-tab" data-bs-toggle="tab" data-bs-target="#tab-addresses"
                            type="button" role="tab" aria-controls="addresses" aria-selected="false">
                            My Addresses
                        </button>
                    </li>

                </ul>
            </div>

            <!-- Tab content -->
            <div class="col-md-9">
                <h1 class="mt-3 mb-3">Hello, {{ $user->name }}!</h1>

                <div class="tab-content" id="nav-tabContent">
                    <!-- PROFIL -->
                    <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h2>Change your datas</h2>
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">New password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    autocomplete="new-password">
                                <small class="form-text text-muted">You can leave it empty if you don't want to change
                                    it</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Mentés</button>
                        </form>
                    </div>

                    <!-- My Orders tab -->
                    <div class="tab-pane fade show" id="tab-orders" role="tabpanel" aria-labelledby="orders-tab">
                        <h2>My Orders</h2>

                        <!-- Rendelés státusz szűrő linkek -->
                        <div class="mb-3">
                            <a href="{{ route('profile') }}?orders=all" class="btn btn-outline-primary btn-sm">All</a>
                            <a href="{{ route('profile') }}?orders=pending"
                                class="btn btn-outline-primary btn-sm">Pending</a>
                            <a href="{{ route('profile') }}?orders=shipped"
                                class="btn btn-outline-primary btn-sm">Shipped</a>
                            <a href="{{ route('profile') }}?orders=delivered"
                                class="btn btn-outline-primary btn-sm">Delivered</a>
                        </div>

                        @if (count($orders) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Actions</th>
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
                                                    class="btn btn-sm btn-info">Details</a>

                                                @if ($order->status === 'pending')
                                                    <form action="{{ route('order.destroy', $order) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to cancel this order?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Cancel</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>You have no orders yet.</p>
                        @endif
                    </div>

                    <!-- My Cards tab -->
                    <div class="tab-pane fade" id="tab-cards" role="tabpanel" aria-labelledby="cards-tab">
                        <h2>My Cards</h2>
                        @if ($creditCards->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Card Number</th>
                                        <th>Name on Card</th>
                                        <th>Expiry Date</th>
                                        <th>Actions</th>
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
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('credit_cards.destroy', $card) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this card?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>You have no saved credit cards.</p>
                        @endif
                        <a href="{{ route('credit_cards.create') }}" class="btn btn-primary mt-2">Add New Card</a>
                    </div>

                    <!-- My Addresses tab -->
                    <div class="tab-pane fade" id="tab-addresses" role="tabpanel" aria-labelledby="addresses-tab">
                        <h2>My Addresses</h2>
                        @if ($addresses->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Postal Code</th>
                                        <th>City</th>
                                        <th>Street</th>
                                        <th>House Number</th>
                                        <th>Note</th>
                                        <th>Actions</th>
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
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('addresses.destroy', $address->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this address?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>You have no saved addresses.</p>
                        @endif
                        <a href="{{ route('addresses.create') }}" class="btn btn-primary">Add New Address</a>
                    </div>
            </div>
        </div>
    </div>

@endsection

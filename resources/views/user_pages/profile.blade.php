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
                    <button class="nav-link" id="cart-tab" data-bs-toggle="tab" data-bs-target="#tab-cart"
                        type="button" role="tab" aria-controls="cart" aria-selected="true">
                        Cart
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
                <!-- My Orders tab -->
                <div class="tab-pane fade show" id="tab-orders" role="tabpanel" aria-labelledby="orders-tab">
                    <h2>My Orders</h2>

                    <div class="mb-3">
                        <a href="{{ route('profile') }}?orders=all" class="btn btn-outline-primary btn-sm">All</a>
                        <a href="{{ route('profile') }}?orders=pending" class="btn btn-outline-primary btn-sm">Pending</a>
                        <a href="{{ route('profile') }}?orders=shipped" class="btn btn-outline-primary btn-sm">Shipped</a>
                        <a href="{{ route('profile') }}?orders=delivered" class="btn btn-outline-primary btn-sm">Delivered</a>
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
                                            <a href="{{ route('order.details', $order) }}" class="btn btn-sm btn-info">Details</a>

                                            @if ($order->status === 'pending')
                                                <form action="{{ route('order.destroy', $order) }}" method="POST" class="d-inline"
                                                    onsubmit="return confirm('Are you sure you want to cancel this order?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
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
                                            <a href="{{ route('credit_cards.edit', $card) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('credit_cards.destroy', $card) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this card?')">Delete</button>
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
                                            <a href="{{ route('addresses.edit', $address->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this address?')">Delete</button>
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

                <!-- Cart tab -->
                <div class="tab-pane fade" id="tab-cart" role="tabpanel" aria-labelledby="cart-tab">
                    <h2>Cart</h2>

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('apply.coupon') }}" method="POST" class="mb-3">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="coupon" placeholder="Coupon Code">
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </div>
                    </form>

                    @if ($cart && count($cart) > 0)

                        <table class="table" id="cart-table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Picture</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
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
                                        <td><img src="{{ $product['image'] }}" width="50" alt="{{ $product['name'] }}"></td>
                                        <td>${{ number_format($product['price'], 2) }}</td>
                                        <td>
                                            <form action="{{ route('cart.update', $productId) }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="number" name="quantity" value="{{ $product['quantity'] }}" min="1" class="form-control form-control-sm quantity-input" style="width: 80px; display: inline-block;">
                                                <button type="submit" class="btn btn-primary btn-sm">Refresh</button>
                                            </form>
                                        </td>
                                        <td class="subtotal-cell">${{ number_format($subtotal, 2) }}</td>

                                        <td>
                                            <form action="{{ route('cart.destroy', $productId) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end"><strong>Total:</strong></td>
                                    <td colspan="2">
                                        @php
                                            $discount = session('discount', 1); // ha nincs kupon, 1
                                            $discountedTotal = $total * $discount;
                                        @endphp
                                        @if(session('discount') && session('discount') < 1)
                                            <span style="text-decoration: line-through;">${{ number_format($total, 2) }}</span>
                                            <strong class="text-success ms-2">${{ number_format($discountedTotal, 2) }}</strong>
                                        @else
                                            <strong>${{ number_format($total, 2) }}</strong>
                                        @endif
                                    </td>
                                </tr>
                            </tfoot>
                            
                        </table>
                        <form id="checkout-form" action="{{ route('order.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Checkout</button>
                        </form>
                    @else
                        <p>Your cart is empty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

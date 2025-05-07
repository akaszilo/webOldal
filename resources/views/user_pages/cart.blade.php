@extends('app')

@section('content')
    <div class="container my-3">
        <h2>Cart</h2>

        <form action="{{ route('apply.coupon') }}" method="POST" class="mb-3">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="coupon" placeholder="Coupon Code">
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
        </form>

        @if ($cart && count($cart) > 0)
            <form action="{{ route('order.checkout') }}" method="POST" id="checkout-form">
                @csrf
                <table class="table" id="cart-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Item</th>
                            <th>Picture</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $productId => $product)
                            @php
                                $subtotal = $product['price'] * $product['quantity'];
                            @endphp
                            <tr>
                                <td>
                                    <input type="checkbox" class="cart-checkbox" name="selected_products[]"
                                        value="{{ $productId }}" checked data-subtotal="{{ $subtotal }}">
                                </td>
                                <td>{{ $product['name'] }}</td>
                                <td><img src="{{ $product['image'] }}" width="50" alt="{{ $product['name'] }}"></td>
                                <td>${{ number_format($product['price'], 2) }}</td>
                                <td>
                                    <form action="{{ route('cart.update', $productId) }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $product['quantity'] }}"
                                            min="1" class="form-control form-control-sm quantity-input"
                                            style="width: 80px; display: inline-block;">
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
                            <td id="cart-total"><strong>$0.00</strong></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                <button type="submit" class="btn btn-success btn-lg">Checkout</button>
            </form>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateTotal() {
                let total = 0;
                document.querySelectorAll('.cart-checkbox').forEach(function(checkbox) {
                    if (checkbox.checked) {
                        total += parseFloat(checkbox.dataset.subtotal);
                    }
                });
                document.getElementById('cart-total').innerHTML = '<strong>$' + total.toFixed(2) + '</strong>';
            }
            updateTotal();
            document.querySelectorAll('.cart-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', updateTotal);
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateTotal() {
                let total = 0;
                document.querySelectorAll('.cart-checkbox').forEach(function(checkbox) {
                    if (checkbox.checked) {
                        total += parseFloat(checkbox.dataset.subtotal);
                    }
                });
                document.getElementById('cart-total').innerHTML = '<strong>$' + total.toFixed(2) + '</strong>';
            }
            updateTotal();
            document.querySelectorAll('.cart-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', updateTotal);
            });
        });
    </script>

@endsection

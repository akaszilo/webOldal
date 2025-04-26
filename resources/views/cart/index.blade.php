@extends('app')

@section('content')
    <div class="container">
        <h1>Your Cart</h1>
        @if (session('cart') && count(session('cart')) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach (session('cart') as $productId => $product)
                        @php
                            $subtotal = $product['price'] * $product['quantity'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>{{ $product['name'] }}</td>
                            <td><img src="{{ $product['image'] }}" width="50" alt="{{ $product['name'] }}"></td>
                            <td>${{ number_format($product['price'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.update', $productId) }}" method="POST" class="quantity-form me-2">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $product['quantity'] }}" min="1" class="form-control form-control-sm quantity-input">
                                    <button type="submit" class="btn btn-primary btn-sm">Frissítés</button>
                                </form>
                            </td>
                            <td>${{ number_format($subtotal, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $productId) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-danger btn-sm">Törlés</button>
                                </form>
                            </td>
                        </tr>
                        
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total:</strong></td>
                        <td><strong>${{ number_format($total, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>

            <form action="{{ route('order.checkout') }}" method="GET" class="text-center">
                <button type="submit" class="btn btn-success btn-lg">Checkout</button>
            </form>
            
        @else
            <p>Your cart is empty.</p>
        @endif


    </div>
    <script>
        const quantityInputs = document.querySelectorAll('.quantity-input');
        quantityInputs.forEach(input => {
            input.addEventListener('change', function() {
                this.closest('form').submit();
            });
        });
    </script>

@endsection

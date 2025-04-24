@extends('app')

@section('content')
<div class="container">
    <h1>Your Cart</h1>
    @if(session('cart') && count(session('cart')) > 0)

        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $product)
                    @php
                        $subtotal = $product['price'] * $product['quantity'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $product['name'] }}</td>
                        <td><img src="{{ $product['image'] }}" width="50" alt="{{ $product['name'] }}"></td>
                        <td>${{ number_format($product['price'], 2) }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
                    <form action="{{ route('cart.remove', ) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Törlés</button>
                    </form>
                @endforeach
                <tr>
                    <td colspan="4" class="text-end"><strong>Total:</strong></td>
                    <td><strong>${{ number_format($total, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection

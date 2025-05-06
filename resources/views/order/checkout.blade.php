@extends('app')

@section('content')
<div class="container">
    <h2>Checkout</h2>

    @if(empty($cartItems))
        <p>Your cart is empty</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Total: ${{ number_format($total, 2) }}</h4>
        
 
        <form action="{{ route('apply.coupon') }}" method="POST">
            @csrf
            <input type="text" name="coupon" placeholder="Add coupon code">
            <button type="submit" class="btn btn-primary">Apply</button>
        </form>
        <form action="{{ route('order.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary" >Continue to checkout</button>
        </form>
       
    @endif
</div>
@endsection

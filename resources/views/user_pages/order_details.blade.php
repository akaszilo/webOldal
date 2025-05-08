@extends('app')

@section('content')
<div class="container">
    <h2>Order #{{ $order->id }} details</h2>
    <p><strong>Order date:</strong> {{ $order->created_at }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>

    <h3>Products ordered:</h3>
    @if ($order->items->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Image from</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                @php
                    $product = $item->product; 
                @endphp
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>
                        @if($product->image_link)
                            <img src="{{ $product->image_link }}" alt="{{ $product->name }}" width="50">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No products in the order.</p>
    @endif
    <a href="{{ route('profile') }}#tab-orders" class="btn btn-primary">Go back to your profile</a>
</div>
@endsection

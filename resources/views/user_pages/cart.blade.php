@extends('app')

@section('content')
    <div class="container my-3">
        <h1>Cart</h1>
        {{-- apply cupon form start --}}
        <form action="{{ route('apply.coupon') }}" method="POST" class="mb-3">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="coupon" placeholder="Coupon Code">
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
        </form>
        {{-- apply cupon form end --}}

        @if ($cart && count($cart) > 0)
            {{-- order table start --}}
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
                    {{-- total counter --}}
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cart as $productId => $product)
                        @php
                            $subtotal = $product['price'] * $product['quantity'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            {{-- columns with datas --}}
                            <td>{{ $product['name'] }}</td>
                            <td><img src="{{ $product['image'] }}" width="50" alt="{{ $product['name'] }}"></td>
                            <td>${{ number_format($product['price'], 2) }}</td>
                            <td>
                                {{-- change quantity form start --}}
                                <form action="{{ route('cart.update', $productId) }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $product['quantity'] }}" min="1"
                                        class="form-control form-control-sm quantity-input"
                                        style="width: 80px; display: inline-block;">
                                    <button type="submit" class="btn btn-primary btn-sm">Refresh</button>
                                </form>
                                {{-- change quantity form end --}}
                            </td>
                            <td>${{ number_format($subtotal, 2) }}</td>
                            <td>
                                {{-- delete form start --}}
                                <form action="{{ route('cart.destroy', $productId) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                {{-- delete form end --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{-- show total start --}}
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total:</strong></td>
                        <td><strong>${{ number_format($total, 2) }}</strong></td>
                        <td></td>
                    </tr>
                </tfoot>
                {{-- show total end --}}
            </table>
            {{-- order table end --}}

            {{-- go to checkout button --}}
            <a href="{{ route('order.checkout') }}" class="btn btn-success btn-lg">Checkout</a>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection

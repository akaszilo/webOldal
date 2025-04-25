
@extends('app')

@section('content')
<div class="container">
    <h2>Checkout</h2>

    @if($cartItems->isEmpty())
        <p>A kosarad üres.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Termék</th>
                    <th>Ár</th>
                    <th>Mennyiség</th>
                    <th>Részösszeg</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Végösszeg: ${{ number_format($total, 2) }}</h4>

        <form action="{{ route('cart.placeOrder') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Megrendelés leadása</button>
        </form>
    @endif
</div>
@endsection

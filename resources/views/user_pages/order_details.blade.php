@extends('app')

@section('content')
<div class="container">
    <h2>Rendelés #{{ $order->id }} részletei</h2>
    <p><strong>Rendelés dátuma:</strong> {{ $order->created_at }}</p>
    <p><strong>Státusz:</strong> {{ $order->status }}</p>
    <p><strong>Összeg:</strong> ${{ number_format($order->total, 2) }}</p>

    <h3>Rendelt termékek:</h3>
    @if ($order->items->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Termék</th>
                    <th>Kép</th>
                    <th>Mennyiség</th>
                    <th>Ár</th>
                    <th>Részösszeg</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                @php
                    $product = $item->product; // Access the product relationship
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
        <p>Nincsenek termékek a rendelésben.</p>
    @endif
    <a href="{{ route('profile') }}" class="btn btn-primary">Vissza a profilhoz</a>
</div>
@endsection

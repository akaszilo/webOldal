@extends('app')

@section('content')
<div class="container">
    <h1>Hello, {{ Auth::user()->name }}!</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    Rendeléseim
                </a>
                <a href="#" class="list-group-item list-group-item-action">Bankkártyáim</a>
                <a href="#" class="list-group-item list-group-item-action">Címeim</a>
                <a href="#" class="list-group-item list-group-item-action">Kosár</a>
            </div>
        </div>

        <div class="col-md-9">
            <h2>Rendeléseim</h2>
            @if(count($orders) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Rendelés Azonosító</th>
                            <th>Dátum</th>
                            <th>Összeg</th>
                            <th>Státusz</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Nincs rendelésed.</p>
            @endif
        </div>
    </div>
</div>
@endsection

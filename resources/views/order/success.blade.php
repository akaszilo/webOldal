@extends('app')

@section('content')
    <div class="container">
        <h1>Sikeres vásárlás!</h1>
        <p>Köszönjük a rendelést!</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Vissza a weboldalra</a>
    </div>
@endsection

@extends('app')

@section('content')
<div class="container">
    <h2>CVV Kód megerősítése</h2>
    <form action="{{ route('cart.confirm_order') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cvv">CVV kód</label>
            <input type="text" name="cvv" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Rendelés megerősítése</button>
    </form>
</div>
@endsection

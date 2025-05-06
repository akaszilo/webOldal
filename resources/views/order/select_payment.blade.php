@extends('app')

@section('content')
<div class="container">
    <h2>Rendelés leadása</h2>
    <form action="{{ route('order.process_order') }}" method="POST"> <!-- EZT MÓDOSÍTSD -->
        @csrf
        <div class="mb-3">
            <label for="address_id">Szállítási cím kiválasztása</label>
            <select name="address_id" class="form-control" required>
                @foreach($addresses as $address)
                    <option value="{{ $address->id }}">{{ $address->street }}, {{ $address->city }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="credit_card_id">Bankkártya kiválasztása</label>
            <select name="credit_card_id" class="form-control" required>
                @foreach($creditCards as $card)
                    <option value="{{ $card->id }}">**** **** **** {{ substr($card->card_number, -4) }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Rendelés leadása</button>
    </form>
</div>
@endsection

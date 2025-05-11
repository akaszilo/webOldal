@extends('app')

@section('content')
    <div class="container mt-3">
        <h2>Place an order</h2>
        {{-- select address and card from start --}}
        <form action="{{ route('order.process_order') }}" method="POST"> <!-- EZT MÓDOSÍTSD -->
            @csrf
            {{-- select address form start --}}
            <div class="mb-3">
                <label for="address_id">Select delivery address</label>
                <select name="address_id" class="form-control" required>
                    @foreach ($addresses as $address)
                        <option value="{{ $address->id }}">{{ $address->street }}, {{ $address->city }}</option>
                    @endforeach
                </select>
            </div>
            {{-- select address form end --}}

            {{-- select card form start --}}
            <div class="mb-3">
                <label for="credit_card_id">Choose your credit card</label>
                <select name="credit_card_id" class="form-control" required>
                    @foreach ($creditCards as $card)
                        <option value="{{ $card->id }}">**** **** **** {{ substr($card->card_number, -4) }}</option>
                    @endforeach
                </select>
            </div>
            {{-- select card from end --}}

            <button type="submit" class="btn btn-primary">Place an order</button>
        </form>
        {{-- select address and card from end --}}
    </div>
@endsection

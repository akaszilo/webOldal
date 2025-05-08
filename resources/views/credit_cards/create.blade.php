@extends('app')

@section('content')
    @if (session('success'))
        <div id="successPopup" class="popup">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <h2>Add credit cards</h2>
        <form method="POST" action="{{ route('credit_cards.store') }}">
            @csrf
            <div class="mb-3">
                <label for="card_number">Card number</label>
                <input type="text" name="card_number" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="name">Name in the card</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Expiry date</label>
                <div class="row">
                    <div class="col">
                        <select name="expiry_month" class="form-control" required>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col">
                        <select name="expiry_year" class="form-control" required>
                            @for ($year = date('Y'); $year <= date('Y') + 10; $year++)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="cvv">CVV code</label>
                <input type="password" name="cvv" class="form-control" required>
            </div>
            <button class="btn btn-success" type="submit">Save</button>
            <a href="{{ route('profile') }}#tab-cards" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

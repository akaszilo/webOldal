@extends('app')

@section('content')
    <div class="container">
        <h2>Bankkártya szerkesztése</h2>
        <form method="POST" action="{{ route('credit-cards.update', $creditCard) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="card_number">Kártyaszám</label>
                <input type="text" name="card_number" class="form-control" value="{{ $creditCard->card_number }}" required>
            </div>
            <div class="mb-3">
                <label for="name">Név a kártyán</label>
                <input type="text" name="name" class="form-control" value="{{ $creditCard->name }}" required>
            </div>
            <div class="mb-3">
                <label>Lejárati dátum</label>
                <div class="row">
                    <div class="col">
                        <select name="expiry_month" class="form-control" required>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ $creditCard->expiry_month == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col">
                        <select name="expiry_year" class="form-control" required>
                            @for ($year = date('Y'); $year <= date('Y') + 10; $year++)
                                <option value="{{ $year }}" {{ $creditCard->expiry_year == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">Mentés</button>
            <a href="{{ route('profile') }}" class="btn btn-secondary">Mégsem</a>
        </form>
    </div>
@endsection

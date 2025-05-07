@extends('app')

@section('content')
<style>
    .popup {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #5cb85c;
        color: white;
        padding: 15px 20px;
        border-radius: 5px;
        z-index: 1000;
        display: none;
    }
</style>

@if(session('success'))
    <div id="successPopup" class="popup">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <h2>Bankkártya hozzáadása</h2>
        <form method="POST" action="{{ route('credit_cards.store') }}">
            @csrf
            <div class="mb-3">
                <label for="card_number">Kártyaszám</label>
                <input type="text" name="card_number" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="name">Név a kártyán</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Lejárati dátum</label>
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
                <label for="cvv">CVV kód</label>
                <input type="text" name="cvv" class="form-control" required>
            </div>            
            <button class="btn btn-success" type="submit">Mentés</button>
            <a href="{{ route('profile') }}#tab-cards" class="btn btn-secondary">Mégsem</a>
        </form>
    </div>
@endsection

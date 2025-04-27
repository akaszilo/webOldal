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
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        font-weight: bold;
    }
</style>

@if(session('success'))
    <div id="successPopup" class="popup">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h2>Bankkártya szerkesztése</h2>
    <form method="POST" action="{{ route('credit_cards.update', $creditCard) }}">
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
        <div class="mb-3">
            <label for="cvv">CVV kód</label>
            <input type="text" name="cvv" class="form-control" value="{{ $creditCard->cvv }}" required>
        </div>            
        <button class="btn btn-success" type="submit">Mentés</button>
        <a href="{{ route('profile') }}" class="btn btn-secondary">Mégsem</a>
    </form>
</div>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const popup = document.getElementById('successPopup');
        if (popup) {
            popup.style.display = 'block';
            setTimeout(() => {
                popup.style.opacity = '1';
            }, 100); // kis késleltetés az animációhoz

            // 3 másodperc után eltűnik
            setTimeout(() => {
                popup.style.transition = 'opacity 0.5s ease';
                popup.style.opacity = '0';
                setTimeout(() => {
                    popup.style.display = 'none';
                }, 500);
            }, 3000);
        }
    });
</script>
@endif

@endsection

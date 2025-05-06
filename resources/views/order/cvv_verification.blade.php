@extends('app')

@section('content')
<div class="container">
    <h2>Bankkártya hitelesítés</h2>
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Bezár"></button>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var cvvInput = document.getElementById('cvv');
                if (cvvInput) cvvInput.value = '';
            });
        </script>
    @endif
    <form action="{{ route('cart.confirmOrder') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cvv" class="form-label">CVV kód</label>
            <input type="password" class="form-control" id="cvv" name="cvv" maxlength="3" required>
            <small class="form-text text-muted">A kártya hátoldalán található 3 számjegyű kód.</small>
        </div>
        <button type="submit" class="btn btn-primary">Fizetés megerősítése</button>
    </form>
</div>
@endsection

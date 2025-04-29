@extends('app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3"
            role="alert" style="z-index:9999; min-width:300px;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Bezár"></button>
        </div>
        <script>
            setTimeout(function() {
                var alert = document.querySelector('.alert');
                if (alert) alert.classList.remove('show');
            }, 2500);
        </script>
    @endif
    <div class="container">
        <h2>Új cím hozzáadása</h2>
        <form action="{{ route('addresses.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="postCode" class="form-label">Irányítószám</label>
                <input type="text" class="form-control" id="postCode" name="postCode" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Város</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="mb-3">
                <label for="street" class="form-label">Utca</label>
                <input type="text" class="form-control" id="street" name="street" required>
            </div>
            <div class="mb-3">
                <label for="houseNumber" class="form-label">Házszám</label>
                <input type="text" class="form-control" id="houseNumber" name="houseNumber" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Ország</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Megjegyzés</label>
                <textarea class="form-control" id="note" name="note" rows="3"></textarea>
            </div>

                <button type="submit" class="btn btn-primary">Mentés</button>
            <a href="{{ route('profile') }}#tab-addresses" class="btn btn-secondary">Mégsem</a>
        </form>
    </div>
@endsection

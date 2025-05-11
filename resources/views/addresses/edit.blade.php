@extends('app')

@section('content')
    {{-- message handler start --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3"
            role="alert" style="z-index:9999; min-width:300px;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            setTimeout(function() {
                var alert = document.querySelector('.alert');
                if (alert) alert.classList.remove('show');
            }, 2500);
        </script>
    @endif
    {{-- message handler end --}}

    {{-- edit address form start --}}
    <div class="container">
        <h2>Edit address</h2>
        <form action="{{ route('addresses.update', $address->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ $address->country }}" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $address->city }}" required>
            </div>
            <div class="mb-3">
                <label for="postCode" class="form-label">Postcode</label>
                <input type="text" class="form-control" id="postCode" name="postCode" value="{{ $address->postCode }}" required>
            </div>
            <div class="mb-3">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" id="street" name="street" value="{{ $address->street }}" required>
            </div>
            <div class="mb-3">
                <label for="houseNumber" class="form-label">House number</label>
                <input type="text" class="form-control" id="houseNumber" name="houseNumber" value="{{ $address->houseNumber }}" required>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <textarea class="form-control" id="note" name="note" rows="3">{{ $address->note }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('profile') }}#tab-addresses" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    {{-- edit address form end --}}
@endsection

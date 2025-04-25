@extends('app')
@section('content')
    <div class="container">
        <h2>{{ isset($address) ? 'Cím módosítása' : 'Cím hozzáadása' }}</h2>
        <form method="POST"
            action="{{ isset($address) ? route('profile.address.update', $address) : route('profile.address.store') }}">
            @csrf
            @if (isset($address))
                @method('POST')
            @endif
            <div class="mb-3">
                <label>Irányítószám</label>
                <input type="text" name="postCode" class="form-control"
                    value="{{ old('postCode', $address->postCode ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Város</label>
                <input type="text" name="city" class="form-control" value="{{ old('city', $address->city ?? '') }}"
                    required>
            </div>
            <div class="mb-3">
                <label>Utca</label>
                <input type="text" name="street" class="form-control"
                    value="{{ old('street', $address->street ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Házszám</label>
                <input type="text" name="houseNumber" class="form-control"
                    value="{{ old('houseNumber', $address->houseNumber ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Megjegyzés</label>
                <input type="text" name="note" class="form-control" value="{{ old('note', $address->note ?? '') }}">
            </div>
            <button class="btn btn-success" type="submit">Mentés</button>
            <a href="{{ route('profile') }}" class="btn btn-secondary">Mégsem</a>
        </form>
    </div>
@endsection

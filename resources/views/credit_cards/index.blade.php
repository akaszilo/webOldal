@extends('app')

@section('content')
    <div class="container">
        <h2>Bankkártyáim</h2>
        @if ($creditCards->count() > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>Kártyaszám</th>
                    <th>Név</th>
                    <th>Lejárati dátum</th>
                    <th>Műveletek</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($creditCards as $card)
                    <tr>
                        <td>{{ $card->card_number }}</td>
                        <td>{{ $card->name }}</td>
                        <td>{{ $card->expiry_month }}/{{ $card->expiry_year }}</td>
                        <td>
                            <a href="{{ route('credit-cards.edit', $card) }}" class="btn btn-sm btn-warning">Szerkesztés</a>
                            <form action="{{ route('credit-cards.destroy', $card) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Biztosan törlöd?')">Törlés</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Nincsenek mentett bankkártyáid.</p>
        @endif
        <a href="{{ route('credit-cards.create') }}" class="btn btn-primary">Bankkártya hozzáadása</a>
    </div>
@endsection

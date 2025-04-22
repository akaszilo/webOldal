@extends('app')

@section('title', $brand->name)

@section('content')
<div class="max-w-6xl mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Termékek a(z) {{ $brand->name }} márkától</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($products as $product)
            <div class="bg-white rounded-2xl shadow p-4">
                <img src="{{ $product->image_link }}" class=" object-cover rounded-xl mb-4 w-[154px] h-[154px]">
                <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                <p class="text-sm text-gray-600">{{ number_format($product->price, 0, ',', ' ') }} Ft</p>
                <a href="{{ route('product.show', $product->id) }}" class="text-pink-600 hover:underline text-sm mt-2 inline-block">Részletek</a>
            </div>
        @empty
            <p>Nincsenek termékek ehhez a márkához.</p>
        @endforelse
    </div>
</div>
@endsection

@extends('app')

<<<<<<< HEAD
@section('content')
<div class="container py-4">
    <div class="brand-details">
        <h1>{{ $brand->name }}</h1>
        <h3>Products:</h3>
        <div class="row">
            @if($products->isEmpty())
            <p>No products available for this brand.</p>
            @else
            @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <a href="{{ route('product.show', $product->id) }}" class="card-link">
                    <div class="card product-card h-100">
                        <img src="{{ asset($product->image_link) }}" class="card-img-top img-fluid"
                            alt="{{ $product->name }}">
                        <div class="card-body">
                            <h3 class="card-title">{{ $product->name }}</h3>
                        </a>
                            <h5>{{ $product->brand->name }}</h5>
                            <p class="card-text">Price: {{ $product->price }} $</p>
                            <p class="card-text">Sold: {{ $product->sold_quantity }} db</p>
                            <p class="card-text">In stock: {{ $product->instock }} db</p>
                        </div>
                    </div>
            </div>
            @endforeach
            @endif
        </div>
=======
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
>>>>>>> web
    </div>
</div>
@endsection

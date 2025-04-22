@extends('app')
@vite('resources/css/app.css')
@section('title', $product->name)

@section('content')
<div class="max-w-4xl mx-auto p-4">
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
            <div class="flex justify-center">
                <img src="{{($product->image_link) }}" alt="{{ $product->name }}" class="w-[300px] h-[300px] object-cover rounded-xl shadow">
            </div>
            <div>
                <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
                <p class="text-gray-600 text-sm mb-4">{{ $product->brand->name }}</p>
                <p class="text-lg text-gray-800 mb-4">{{ $product->description }}</p>
                <div class="text-2xl font-semibold text-pink-600 mb-6">{{ number_format($product->price, 0, ',', ' ') }} Ft</div>
            </div>
        </div>
    </div>
</div>
@endsection

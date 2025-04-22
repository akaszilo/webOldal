@extends('app')

@section('content')
    <div class="brand-details">
        <h1>{{ $brand->name }}</h1>
        <h3>Products:</h3>
        
        @if($products->isEmpty())
            <p>No products available for this brand.</p>
        @else
            <ul>
                @foreach($products as $product)
                    <li>
                        <img src="{{ $product->image_link }}" alt="{{ $product->name }}" class="product-image w-[154px] h-[154px]">
                        <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

@extends('app')

@section('content')
    <div class="container mb-5">
        <h3 class="mb-4 mt-4">Search Results for "{{ $query }}"</h3>
        {{-- show search reasults start --}}
        <div class="row">
            @if (count($products) > 0)
                @foreach ($products as $product)
                    <div class="col-md-3 mb-4">
                        <a href="{{ route('product.show', $product->id) }}" class="card-link">
                            <div class="card product-card h-100">
                                <img src="{{ asset($product->image_link) }}" class="card-img-top img-fluid"
                                    alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $product->name }}</h3>
                                    <h5>{{ $product->brand->name }}</h5>
                                    <p class="card-text">Price: {{ $product->price }} $</p>
                                    <p class="card-text">Sold: {{ $product->sold_quantity }} db</p>
                                    <p class="card-text">In stock: {{ $product->instock }} db</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p>No hits.</p>
            @endif
        </div>
        {{-- show search results end --}}
    </div>
@endsection

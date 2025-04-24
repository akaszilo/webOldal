@extends('app')

@section('content')
    <div class="container my-3">
        <h3>Search Results for "{{ $query }}"</h3>
        <div class="row my-4">
            @if(count($products) > 0)
                @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('product.show', $product->id) }}" class="card-link">
                            <div class="card product-card">
                                <img src="{{ asset($product->image_link) }}" class="card-img-top img-fluid" alt="{{ $product->name }}">
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
                <p>Nincs találat.</p>
            @endif
        </div>
    </div>
@endsection

@extends('app')

@section('content')
    <div class="container py-4">
        <div class="brand-details">
            <h1>{{ $brand->name }}</h1>
            <form method="GET" action="{{ url()->current() }}">
                <label for="sort">Sort:</label>
                <select name="sort" id="sort" onchange="this.form.submit()" class="form-select w-auto d-inline-block">
                    <option value="newest" {{ ($sort ?? request('sort', 'newest')) == 'newest' ? 'selected' : '' }}>Newest
                        first</option>
                    <option value="oldest" {{ ($sort ?? request('sort')) == 'oldest' ? 'selected' : '' }}>Oldest first
                    </option>
                    <option value="cheapest" {{ ($sort ?? request('sort')) == 'cheapest' ? 'selected' : '' }}>Least
                        expensive first</option>
                    <option value="most_expensive" {{ ($sort ?? request('sort')) == 'most_expensive' ? 'selected' : '' }}>
                        Most expensive first</option>
                    <option value="popular" {{ ($sort ?? request('sort')) == 'popular' ? 'selected' : '' }}>Most popular
                        first</option>
                    <option value="abc" {{ ($sort ?? request('sort')) == 'abc' ? 'selected' : '' }}>ABC</option>
                </select>
            </form>
            <h3>Products:</h3>
            <div class="row">
                @if ($products->isEmpty())
                    <p>No products available for this brand.</p>
                @else
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
                                        <p class="card-text">Sold: {{ $product->sold_quantity }}</p>
                                        <p class="card-text">In stock: {{ $product->instock }}</p>
                                    </div>
                            </a>
                        </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    </div>
@endsection

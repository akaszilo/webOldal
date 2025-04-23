@extends('app')

@section('content')
<div class="container my-3">
    <h3>Search Results for {{ $query }}</h3>
    <div class="row my-4">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

{{-- resources/views/categories/show.blade.php --}}
@extends('app') {{-- vagy amit használsz layoutként --}}

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Smink kategória: {{ $category->name }}</h1>

    
        <div class="row">
            @foreach($category->products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                            <img src="{{  $product->image_link }}" class="card-img-top" alt="{{ $product->name }}">
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted">{{ $product->description }}</p>
                            <p class="card-text fw-bold">{{ number_format($product->price, 0, ',', ' ') }} $</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    
</div>
@endsection

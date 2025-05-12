@extends('app')

@section('content')
    <div class="container mt-3">
        <h1>Successful shopping!</h1>
        <p>Thank your for your order!</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Back to the website</a>
    </div>
@endsection

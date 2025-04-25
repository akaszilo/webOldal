@extends('app')

    @section('content')
    <div class="container">
        <h1>Order Successful!</h1>
        <p>Thank you for your order.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
    </div>
    @endsection
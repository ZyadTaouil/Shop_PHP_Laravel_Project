@extends('layouts.app')

@section('content')
    @if (!$cartItems->isEmpty())
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cartItems as $cart_item) <!-- Update variable name -->
            @php
                $product = \App\Models\Product::find($cart_item->product_id);
            @endphp
            <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $cart_item->quantity }}</td>
                    <td>{{ $product->price * $cart_item->quantity }}</td>
                    <td>
                        <form action="{{ route('cart.remove', ['id' => $cart_item->product_id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove product</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h3>Total price: {{ $totalPrice }}</h3>
        <a href="{{ url('checkout') }}" class="btn btn-success">Checkout</a>
    @else
        <p>Your cart is empty.</p>
    @endif
    <style>
        h3 {
            text-align: center;
            margin: 20px;
        }
        a {
            display: block;
            width: 200px;
            margin: auto;
        }
    </style>
@endsection
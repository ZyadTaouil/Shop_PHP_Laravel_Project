@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ $product->image }}" id="card-img-top" alt="{{ $product->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <span class="price">${{ $product->price }}</span>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input type="number" name="quantity"
                                           value="1" min="1"
                                           class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary"
                                                type="submit">Add to cart
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

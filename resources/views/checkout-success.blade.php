@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Checkout Success</div>

                    <div class="card-body">
                        <p>Your order has been placed successfully!</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Return to Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
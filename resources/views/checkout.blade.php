@extends('layouts.app')

@section('content')
<h2>Checkout</h2>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('checkout.submit') }}">
    @csrf
    <div>
        <label>Name</label>
        <label>
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
    </div>
    <div>
        <label>Email</label>
        <label>
            <input type="email" name="email" value="{{ old('email') }}">
        </label>
    </div>
    <div>
        <label>Phone</label>
        <label>
            <input type="text" name="phone" value="{{ old('phone') }}">
        </label>
    </div>
    <div>
        <label>Address</label>
        <label>
            <textarea name="address">{{ old('address') }}</textarea>
        </label>
    </div>
    <div>
        <label>Notes</label>
        <label>
            <textarea name="notes">{{ old('notes') }}</textarea>
        </label>
    </div>
    <button type="submit">Submit</button>
</form>
<script src="{{ asset('static/JS/checkout.js') }}"></script>
@endsection
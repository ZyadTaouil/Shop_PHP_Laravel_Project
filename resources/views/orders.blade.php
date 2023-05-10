@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Your Orders</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Notes</th>
            </tr>
            </thead>
            <tbody>
            @if($orders)
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->adress }}</td>
                        <td>{{ $order->notes }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">
                        <p>You have no orders yet.</p>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <a href="/" class="btn btn-primary">Go shopping</a>
    </div>
@endsection
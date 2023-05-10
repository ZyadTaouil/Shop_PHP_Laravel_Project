<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Shop') }}</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('cart') }}">Cart</a>
            </li>
            @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link"
                   href="{{ url('orders') }}">Orders</a>
            </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-white p-0"
                                style=" margin-left: 17%; margin-top: 14% ;">Logout</button>
                    </form>
                </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @endif
        </ul>
    </div>
</nav>
<div class="container py-5">
    @if ($messages = session()->get('messages', []))
    <div class="alert alert-dismissible fade show" role="alert">
        @foreach($messages as $category => $message)
        <div class="alert alert-{{ $category }}" role="alert">
            {{ $message }}
        </div>
        @endforeach
        <button type="button" class="close" data-dismiss="alert"
                aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
<div id="app">
    @yield('content')
</div>
</div>
<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-X6FyU6KmlQFvM8m7mZKcJLNTzgEYucG8P7jK9XnDlk7x0izJzHlVlAVTkQLjK7Wu"
        crossorigin="anonymous"></script>
</body>
</html>

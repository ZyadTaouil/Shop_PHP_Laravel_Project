@extends('layouts.app')
@section('content')
    <form action="{{ url('login') }}" method="POST" id="login-form">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2>Login</h2>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username"
                               class="form-control @error('username') is-invalid @enderror" required>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"
                               class="@error('password') is-invalid @enderror form-control" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login"
                               class="btn btn-primary">
                    </div>
                    <div class="form-group">
                        <p>Not registered yet? <a
                                    href="{{ url('signup') }}">Sign up
                                here</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <style>
        h2 {
            text-align: center;
            margin: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type=submit] {
            width: 100%;
        }
    </style>
@endsection
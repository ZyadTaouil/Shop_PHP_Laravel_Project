@extends('layouts.app')

@section('content')
    <form action="{{ url('signup') }}" method="POST" id="signup-form">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2>Signup</h2>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username"
                               class="form-control" required>
                        <span id="username-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                        <span id="email-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"
                               class="form-control" required>
                        <span id="password-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm password</label>
                        <input type="password" name="password_confirmation"
                               id="confirm_password" class="form-control" required>
                        <span id="confirm-password-error"
                              class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Signup"
                               class="btn btn-primary">
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
    <script src="{{ asset('static/JS/signup.js') }}"></script>
@endsection
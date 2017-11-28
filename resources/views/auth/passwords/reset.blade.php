@extends('layouts.auth')

@section('headline')
    <div class="col-md-8 col-md-push-2 text-center">
        <h1>Set a New Password</h1>
    </div>
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-md-6 col-md-push-3 personal-details well">
        <form action="{{ route('password.request') }}" method="post">
            <div class="form-group">
                <label for="input-email">Email</label>
                <input type="email" data-validate="email" class="form-control" value="{{ old('email', request()->get('email')) }}" name="email" placeholder="Your email" id="input-email" required>
            </div>

            <div class="form-group">
                <label for="input-password">Password</label>
                <input class="form-control" type="password" name="password" autofocus required minlength="3">
            </div>

            <div class="form-group">
                <label for="input-password-confirmation">Password Confirmation</label>
                <input class="form-control" type="password" name="password_confirmation" required minlength="3">
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center cta"><button type="submit" class="btn btn-primary">Save New Password</button></div>
                </div>
            </div>
            <input type="hidden" name="token" value="{{ $token }}">
            {!! csrf_field() !!}
        </form>
        <div class="text-center login-signup-link">
            <a href="{{ route('login') }}">Log In</a> |
            <a href="{{ route('register') }}">Sign Up</a>
        </div>
    </div>
</div>

@endsection

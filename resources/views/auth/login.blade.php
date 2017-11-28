@extends('layouts.auth')

@section('headline')
    @if(config('ico.started'))
        <div class="col-md-8 col-md-push-2 text-center">
            <h1>Join Crowdsale and Receive Tokens Immediately</h1>
        </div>
    @else
        <div class="col-md-8 col-md-push-2 text-center">
            <h1>Log In To BitDegree</h1>
        </div>
    @endif
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-md-6 col-md-push-3 personal-details well">
        <form action="{{ route('login') }}" method="post">
            <div class="form-group">
                <label for="input-email">Email</label>
                <input type="email" data-validate="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Your email" id="input-email" autofocus required>
            </div>
            <div class="form-group">
                <label for="input-password">Password</label>
                <input class="form-control" type="password" name="password" required>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center login-cta cta"><button type="submit" class="btn btn-primary">Log In</button></div>
                </div>
            </div>
            {!! csrf_field() !!}
        </form>
        <div class="text-center login-signup-link">
            <a href="{{ e(route('register')) }}">Sign Up</a> |
            <a href="{{ e(route('password.request')) }}">Forgot password?</a>
        </div>
    </div>
</div>

@endsection


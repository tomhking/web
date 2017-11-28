@extends('layouts.auth')

@section('headline')
    <div class="col-md-8 col-md-push-2 text-center">
        <h1>Reset Your Password</h1>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-push-3 personal-details well">
            <form action="{{ route('password.email') }}" method="post">
                <div class="form-group">
                    <label for="input-email">Email</label>
                    <input type="email" data-validate="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Your email" id="input-email" autofocus required>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center cta"><button type="submit" class="btn btn-primary">Request Password Reset</button></div>
                    </div>
                </div>
                {!! csrf_field() !!}
            </form>
            <div class="text-center login-signup-link">
                <a href="{{ route('login') }}">Log In</a> |
                <a href="{{ route('register') }}">Sign Up</a>
            </div>
        </div>
    </div>

@endsection

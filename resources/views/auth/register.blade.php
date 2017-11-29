@extends('layouts.auth')

@section('headline')
    @if(config('ico.started'))
        <div class="col-md-8 col-md-push-2 text-center">
            <h1>Join Crowdsale and Receive Tokens Immediately</h1>
        </div>
    @else
        <div class="col-md-8 col-md-push-2 text-center">
            <h1>Sign Up To BitDegree</h1>
        </div>
    @endif
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-md-6 col-md-push-3 personal-details well">
        <form action="{{ route('register') }}" method="post">
            <div class="form-group">
                <label for="input-email">Email</label>
                <input tabindex="1" type="email" data-validate="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Your email" id="input-email" autofocus required>
            </div>
            <div class="form-group">
                <label for="input-password">Password</label>
                <input tabindex="2" class="form-control" type="password" name="password" required minlength="3">
            </div>

            <div class="row">
                <div class="agreement col-md-12 ">
                    <input tabindex="3" type="checkbox" id="agreeToTerms" name="agreement" {{ old('agreement', false) ? 'checked' : '' }} value="1">
                    <label for="agreeToTerms">I hereby agree to Bitdegree Token Sale <a href="{{ asset_rev('files/terms-of-service.pdf') }}" target="_blank">Terms of Service</a> and <a href="{{ asset_rev('files/privacy-policy.pdf') }}" target="_blank">Privacy Policy</a>.</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center login-cta cta"><button tabindex="4" type="submit" class="btn btn-primary">{{ config('ico.started') ? "Join Crowdsale" : "Sign Up" }}</button></div>
                </div>
            </div>
            {!! csrf_field() !!}
        </form>
        <div class="text-center login-signup-link">
            <a href="{{ route('login') }}">Log In</a> |
            <a href="{{ route('password.request') }}">Forgot password?</a>
        </div>
    </div>
</div>

@endsection
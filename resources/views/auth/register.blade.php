@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens login-signup', 'hideFooter' => true])

@section('content')


    <div class="main">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="col-md-3">
                    <div class="dashboard-logo">
                        <a href="{{ route('home') }}" class="login-logo">
                            <img class="logo" src="{{ asset_rev('bitdegree-logo.png') }}" alt="BitDegree">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="container main">
                <div class="content">
                    <div class="row">
                        <div class="col-md-8 col-md-push-2 text-center">
                            <h1>Join Crowdsale and Receive Tokens Immediately</h1>
                        </div>
                    </div>

                    @include('partials.status')

                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-md-push-3 personal-details well">
                            <form action="{{ route('register') }}" method="post">
                                <div class="form-group">
                                    <label for="input-email">Email</label>
                                    <input type="email" data-validate="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Your email" id="input-email" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label for="input-password">Password</label>
                                    <input class="form-control" type="password" name="password" required minlength="3">
                                </div>

                                <div class="row">
                                    <div class="agreement col-md-12 ">
                                        <input type="checkbox" id="agreeToTerms" name="agreement" {{ old('agreement', false) ? 'checked' : '' }} value="1">
                                        <label for="agreeToTerms">I hereby agree to Bitdegree Token Sale <a href="{{ asset_rev('files/terms-of-service.pdf') }}" target="_blank">Terms of Service</a></label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center login-cta cta"><button type="submit" class="btn btn-primary">Join Crowdsale</button></div>
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
                </div>
            </div>
        </div>
    </div>


@endsection


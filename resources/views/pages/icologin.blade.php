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

            <div class="row">
                <div class="col-xs-12 col-md-6 col-md-push-3 personal-details well">
                    <form action="{{ route('participant-profile') }}" method="post">

                    <div class="form-group">
                        <label for="input-email">Email</label>
                        <input type="email" data-validate="email" class="form-control" value="" name="email" placeholder="Your email" id="input-email" required>
                        <div class="text-danger validation">Email is not valid.</div>
                    </div>
                    <div class="form-group">
                        <label for="input-password">Password</label>
                        <input class="form-control" type="password" name="psw">
                    </div>

                    <div class="row">
                        <div class="agreement col-md-12 ">
                            <input type="checkbox" id="agreeToTerms" name="subscribe" value="newsletter">
                            <label for="agreeToTerms">I hereby agree to Bitdegree Token Sale <a href="#">Terms of Service</a></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center cta"><button type="submit" class="btn btn-primary"><a href="{{ route('crowdsaleaddress') }}">Join Crowdsale</a></button></div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


@endsection


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
                            <h1>Email Verification</h1>
                        </div>
                    </div>

                    @include('partials.status')

                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-md-push-3 personal-details well">
                            @if($success)
                                <div class="alert alert-success">Your email has been successfully verified.</div>
                            @else
                                <div class="alert alert-warning">The confirmation link is either incorrect or it had already expired. Please request a new one.</div>
                            @endif
                            @auth
                                <div class="text-center login-signup-link">
                                    <a href="{{ route('address') }}">User Area</a> |
                                    <a href="{{ route('home') }}">Homepage</a>
                                </div>
                            @endauth
                            @guest
                                <div class="text-center login-signup-link">
                                    <a href="{{ route('password.request') }}">Log In</a> |
                                    <a href="{{ route('register') }}">Sign Up</a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection


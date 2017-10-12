@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list login-page', 'hideFooter' => true])

@section('content')
<div class="main">
    <div class="container">
        <div class="login-wrap">
            <a href="{{ route_lang('home') }}" class="login-logo">
                <img class="logo" src="{{ asset('bitdegree-logo.png') }}" alt="BitDegree">
            </a>

            <div id="signup-success" style="display: none">
                <h1>Almost done...</h1>
                <div class="alert alert-success">@lang('user.check_email')</div>
                <a href="{{ route_lang('home') }}" class="back-to-homepage btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> @lang('user.back_home')</a>
            </div>
            <form class="async-validated" action="{{ route_lang('signup-post') }}" method="post" data-show="#signup-success">
                <h1>Register</h1>
                <p class="subtitle">@lang('user.please_provide')</p>
                <div class="alert alert-danger other-error" style="display: none;">@lang('user.unknown_error')</div>
                <div class="form-group validation-email">
                    <label for="input-email">@lang('user.email_address')</label>
                    <input type="email" id="input-email" name="email" class="form-control" placeholder="@lang('user.sample_email')" value="{{ $email }}">
                    <span class="validation-error"></span>
                </div>
                <div class="form-group validation-first-name">
                    <label for="input-name">@lang('user.name') <span class="text-muted">(@lang('user.optional'))</span></label>
                    <input type="text" id="input-name" name="name" class="form-control" value="">
                    <span class="validation-error"></span>
                </div>

                @include('partials.recaptcha')

                <button class="btn btn-default" type="submit">@lang('user.signup')</button>
                <a class="link" href="{{ route_lang('login') }}">@lang('user.or_login')</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('body-scripts')
    @include('partials.async-forms')
@endpush
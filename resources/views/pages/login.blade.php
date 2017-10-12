@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list login-page', 'hideFooter' => true])

@section('content')
<div class="main">
    <div class="container">
        <div class="login-wrap">
            <a href="{{ route_lang('home') }}" class="login-logo">
                <img class="logo" src="{{ asset('bitdegree-logo.png') }}" alt="BitDegree">
            </a>
            <h1>@lang('user.login')</h1>
            <div id="login-success" style="display: none">
                <div class="alert alert-success">@lang('user.link_sent')</div>
                <a href="{{ route_lang('home') }}" class="back-to-homepage btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> @lang('user.back_home')</a>
            </div>
            <form action="{{ route_lang('login-post') }}" method="post" class="async-validated" data-show="#login-success">
                <div class="alert alert-danger other-error" style="display: none;">@lang('user.unknown_error')</div>
                @if(!empty($email))
                    <div class="well-sm well">@lang('user.already_member')</div>
                    <input type="hidden" name="email" value="{{ $email }}">
                @else
                    <div class="form-group validation-email">
                        <label for="input-email">@lang('user.email_address')</label>
                        <input type="email" name="email" class="form-control" placeholder="@lang('user.sample_email')" value="{{ $email }}">
                        <span class="validation-error"></span>
                    </div>
                @endif

                @include('partials.recaptcha')

                <button class="btn btn-default">@lang('user.login')</button>
                <a class="link" href="{{ route_lang('signup') }}">@lang('user.or_signup')</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('body-scripts')
    @include('partials.async-forms')
@endpush
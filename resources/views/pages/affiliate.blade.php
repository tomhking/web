@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list login-page token-secured', 'hideFooter' => true])

@section('content')
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="dashboard-logo">
                        <a href="{{ route('home') }}" class="login-logo">
                            <img class="logo" src="{{ asset_rev('bitdegree-logo.png') }}" alt="BitDegree">
                        </a>
                    </div>
                </div>
                <div class="col-md-2">
                    <p style="text-align:right;"><a style="margin:0;" class="back-to-homepage btn btn-default" href="{{ route('user') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i> @lang('user.back')</a></p>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Affiliate Program</h2>
                    <p>These are some rules regarding affiliate program</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="well well-important">
                       https://www.bitdegree.org/a/{{ auth()->user()->id }}
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="well well-important">
                        {{ auth()->user()->referrals()->count() }} referrals
                    </div>
                </div>
            </div>        <div class="row">
                <div class="col-md-12 text-center">
                        <h2>Banners to use</h2>
                        <p class="subtitle">Use these banners and get tokens for bringing traffic to Bitdegree</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           <h4>Animated banner <span class="label label-default pull-left">728x90</span></h4>
                        </div>
                        <div class="panel-body">
                            <div class="banner-image">
                                <img src="{{ asset_rev('files/728x90-animated.gif') }}" alt="BitDegree - Revolutionizing education with blockchain">
                            </div>
                            <textarea readonly class="form-control select-all"><a href="https://bitdegree.org" target="_blank"><img src="{{ asset_rev('files/728x90-animated.gif') }}" width="728" height="90" alt="BitDegree - Revolutionizing education with blockchain"></a></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('body-scripts')
@include('partials.async-forms')
@endpush
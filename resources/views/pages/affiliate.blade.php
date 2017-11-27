@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')
    <div class="col-sm-3 col-md-2 hidden-xs-down sidebar">
        <h4>What's next?</h4>
        <ul class="sidebar-nav">
            <li class="step-done"><a href="#">Step 1</a></li>
            <li class="step-active"><a href="#">Step 2</a></li>
            <li class="step-other"><a href="#"><span>Other</span></a></li>
        </ul>
    </div>



    <div class="col-sm-12 col-md-10 col-md-offset-2 pt-3 ">

        <div class="main container-main">
            <div class="container">

                <div class="row">
                    <div class="col-xs-12 col-md-12 text-center">
                            <h1>Referral Program</h1>
                            <p class="subtitle">These are some rules regarding affiliate program</p>
                    </div>
                 </div>

                <div class="row">
                    <div class="col-xs-12 col-md-12">
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
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <h1 class="text-center">Banners to use</h1>
                        <p class="text-center subtitle">Use these banners and get tokens for bringing traffic to Bitdegree</p>

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
    </div>

@endsection

@push('body-scripts')
@include('partials.async-forms')
@endpush
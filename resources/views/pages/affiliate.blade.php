@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')

    <div class="col-sm-12 col-md-12 pt-3 ">

        <div class="main container-main">
            <div class="container">

                <div class="row">
                    <div class="col-xs-12 col-md-12 text-center">
                        <h1>BitDegree Referral Program</h1>
                        <h3>Get Your Share of the 200 000 BDG Token Pool!</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="referral-description">
                            <h4>How it works?</h4>
                            <ul>
                                <li>Sign up for the referral program with your email.</li>
                                <li>Get your personal link and use it to refer people to BitDegree.</li>
                                <li>Select from a variety of banners to place on your website to refer people to BitDegree.</li>
                                <li>Once a person that you referred signs up on BitDegree website with his email you will earn one stake.</li>
                                <li>At the end of the crowdsale the total amount of stakes will be transformed into tokens and will be distributed among all participants based on the number of people they have referred.</li>
                                <li>You will be receive the instructions on how to claim your BitDegree tokens via the email that you provided during registration.</li>
                            </ul>
                            <h4>Restrictions</h4>
                            <ul>
                                <li>No multiple signups</li>
                                <li>No self-referrals</li>
                                <li>No spam</li>
                            </ul>
                            <p>Breaking any of these rules will immediately ban you from the BitDegree affiliate program.</p>
                        </div>
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
                        <h2 class="text-center">Banners to use</h2>
                        <p class="text-center subtitle">Use these banners and get tokens for bringing traffic to Bitdegree</p>

                        @foreach($banners as $banner)
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4>Banner <span class="label label-default pull-left">{{ $banner['width'].'x'.$banner['height'] }}</span></h4>
                                </div>
                                <div class="panel-body">
                                    <div class="banner-image">
                                        <img src="{{ asset_rev($banner['url']) }}" alt="BitDegree:From EA co-founder, former COURSERA Lead &amp; 29,000,000 users. Limited 15% discount - Get Tokens!">
                                    </div>
                                    <textarea readonly onclick="this.setSelectionRange(0, this.value.length)" class="form-control select-all">{{ '<a href="'.route('affiliate-cookie', auth()->id()).'" target="_blank"><img src="'.asset_rev($banner['url']).'" width="'.$banner['width'].'" height="'.$banner['height'].'" alt="BitDegree:From EA co-founder, former COURSERA Lead & 29,000,000 users. Limited 15% discount - Get Tokens!"></a>'}}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

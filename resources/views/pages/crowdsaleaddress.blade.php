@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')


    <div class="header container-fluid">
        <div class="row-fluid">
            <div class="col-md-3">
                <div class="dashboard-logo">
                    <a href="{{ route('home') }}" class="login-logo">
                        <img class="logo" src="{{ asset_rev('bitdegree-logo.png') }}" alt="BitDegree">
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-md-push-7 align-right">
                <div class="user-menu">
                    <ul>
                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Change pasword</a></li>
                        <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-sm-3 col-md-2 hidden-xs-down sidebar">
            <h4>What's next?</h4>
            <ul class="sidebar-nav">
                <li class="step-done"><a href="#">Step 1</a></li>
                <li class="step-active"><a href="#">Step 2</a></li>
                <li class="step-other"><a href="#">Other</a></li>
            </ul>
        </div>

        <div class="col-sm-9 offset-sm-3 col-md-10 col-md-offset-2 pt-3 ">
            <div class="dashboard-navigation">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#">Crowdsale</a></li>
                    <li><a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> How to participate</a></li>
                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> Earn more </a></li>
                    <li><a href="#"><img class="token" src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token"> My Airdrops</a></li>
                </ul>
            </div>
            <div class="main container-main">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1 eth-address">
                            <h1 class="text-center">Send ETH to this address and receive BDG tokens <b>NOW!</b></h1>
                            <div class="form-group">
                                <input type="text" class="form-control" readonly value="" onclick="" id="ico-address">
                                <p class="text-right" id="copy-address">
                                    <a class="btn">Copy Address</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                            <div class="crowdsale-info-table">

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <h4>Exchange rate</h4>
                                    <p>1 ETH = 10,000 BDG*</p>

                                    <h4>Gas Limit</h4>
                                    <p>200,000</p>

                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <h4>Week 1 Bonus</h4>
                                    <p>15%</p>

                                    <h4>Week 1 Bonus ends in:</h4>
                                    <p>24:15:20</p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <div class="well">
                                <p>Please make sure to have a valid ERC20 compatible Ethereum address to receive your tokens. <b><span class="red">Do not use any exchange address!</span></b> <strong>Do NOT send ETH from an exchange.</strong> Use MyEtherWallet, MetaMask, Mist, Parity or other compatible wallets.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1 buttons">
                            <div class="content dashboard-buttons">
                                <div class="left text-left">
                                    <a class="how-to-participate" href="">How to participate?</a>
                                </div>
                                <div class="right text-right">
                                    <div class="cta">
                                        <button type="submit" class="btn btn-primary button-done">DONE</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


@endsection


@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')


    <div class="header container-fluid">
        <div class="row-fluid">
            <div class="col-md-3">
                <div class="dashboard-logo">
                    <a href="{{ route_lang('home') }}" class="login-logo">
                        <img class="logo" src="{{ asset('bitdegree-logo.png') }}" alt="BitDegree">
                    </a>
                </div>
            </div>
            <div class="col-md-5 col-md-push-4 align-right">
                <div class="user-menu">
                    <ul>
                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> Referral</a></li>
                        <li><a href="#"> <img class="token" src="{{ asset('token-img.png') }}" alt="BitDegree Token"> Aidrop: <b>1BDG</b></a></li>
                        <li><a href="#"><img class="ethereum" src="{{ asset('ethereum-icon.png') }}" alt="Ethereum"> Add your Wallet address</a></li>
                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Account</a></li>
                        <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-sm-3 col-md-2 hidden-xs-down sidebar">
            <div class="main">
                <h4>What's next?</h4>
                <ul class="sidebar-nav">
                    <li class="step-done"><a href="#">Step 1</a></li>
                    <li class="step-active"><a href="#">Step 2</a></li>
                    <li class="step-other"><a href="#">Other</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9 offset-sm-3 col-md-10 col-md-offset-2 pt-3 container-main">
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Send ETH to this address and receive BDG tokens <b>NOW!</b></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1 eth-address">
                            <div class="form-group">
                                <input type="text" class="form-control" readonly value="" onclick="" id="ico-address">
                                <p class="text-right" id="copy-address" style="display: none">
                                    <span class="text-success copied" style="display: none">Copied!</span>
                                    <a class="btn">Copy Address</a>
                                </p>
                            </div>
                            <div class="well">
                                <p>Please make sure to have a valid ERC20 compatible Ethereum address to receive your tokens. <b><span class="red">Do not use any exchange address!</span></b></p>
                                <p><b>Recommended Gas Limit: 200 000.</b> Payments without data or gas limit fields are rejeced.</p>
                                <p><strong>Do NOT send ETH from an exchange.</strong> Use MyEtherWallet, MetaMask, Mist, Parity or other compatible wallets.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


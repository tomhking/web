@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
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
                            <div class="crowdsale-info-table text-center">

                                <div class="col-xs-6 col-sm-6 col-md-4">
                                    <h4>Exchange rate</h4>
                                    <p>1 ETH = 10,000 BDG*</p>

                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4">

                                    <h4>Gas Limit</h4>
                                    <p>200,000</p>

                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-4 last">
                                    <h4>Week 1 Bonus</h4>
                                    <p>15%</p>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 bonus-countdown">
                                <h2>Week 1 Bonus ends in:</h2>
                                    @include('partials.countdown', ['timeLeft' => 25115])
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <div class="well">
                                <p>Please make sure to have a valid ERC20 compatible Ethereum address to receive your tokens. <b><span class="red">Do not use any exchange address!</span></b> Use MyEtherWallet, MetaMask, Mist, Parity or other compatible wallets.</p>
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
                                        <a href="{{ route('userdetails') }}" type="submit" class="btn btn-primary button-done">DONE</a></div>
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


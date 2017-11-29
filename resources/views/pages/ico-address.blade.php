@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        <div class="col-sm-3 col-md-2 hidden-xs-down sidebar">
            <h4>What's next?</h4>
            <ul class="sidebar-nav">
                <li class="step-done"><a href="#">Step 1</a></li>
                <li class="step-active"><a href="{{ route('address') }}">Step 2</a></li>
                <li class="step-other"><a href="#"><span>Other</span></a></li>
            </ul>
        </div>

        <div class="col-sm-12 col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">
                    @if($ico['end']->isPast())
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1 text-center">
                                <img src="{{ asset_rev('token.png') }}" alt="BDG Token">
                                <h1>Crowdsale ended!</h1>
                                <h4>Thank you for participating!</h4>
                            </div>
                        </div>
                    @else
                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1 eth-address">
                            <h1 class="text-center">Send ETH to this address and receive BDG tokens <b>NOW!</b></h1>
                            <div class="form-group">
                                <input type="text" class="form-control" readonly value="{{ $ico['address'] }}" onclick="this.setSelectionRange(0, this.value.length)" id="ico-address">
                                <p class="text-right" id="copy-address">
                                    <span class="text-success copied" style="display: none">Copied!</span>
                                    <a class="btn">Copy Address</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                            @if($currentBonus)
                                <div class="crowdsale-info-table text-center">
                                    <div class="col-xs-4 col-sm-4 col-md-4">

                                            <div class="bonuses-modal">

                                                <div class="week-bonus" data-toggle="modal" data-target="#BonusModal">
                                                    <h4>{{ $currentBonus['name'] }}</h4>
                                                    <p>{{ ($currentBonus['bonus']-1) * 100 }}%</p>
                                                </div>

                                                <div class="modal fade" role="dialog" id="BonusModal" tabindex="-1" aria-labelledby="gridModalLabel" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="bonuses-table">
                                                                    <h4 class="text-center">Send ETH and receive BitDegree Tokens immediately!</h4>
                                                                    <table>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                            </td>
                                                                            <td>
                                                                                15% BONUS
                                                                            </td>
                                                                            <td>
                                                                                WEEK 1
                                                                            </td>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                            </td>
                                                                            <td>
                                                                                10% BONUS
                                                                            </td>
                                                                            <td>
                                                                               WEEK 2
                                                                            </td>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                            </td>
                                                                            <td>
                                                                                5% BONUS
                                                                            </td>
                                                                            <td>
                                                                                WEEk 3
                                                                            </td>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                            </td>
                                                                            <td>
                                                                                0% BONUS
                                                                            </td>
                                                                            <td>
                                                                                WEEK 4
                                                                            </td>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <h4>Exchange rate with bonus</h4>
                                        <p>1 ETH = {{ number_format($rate) }} BDG</p>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 last">
                                        <h4>Gas Limit</h4>
                                        <p>200,000</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 bonus-countdown">
                                        <h2>{{ $currentBonus['name'] }} ends in:</h2>
                                        @include('partials.countdown', ['timeLeft' => $currentBonus['to']->timestamp - time()])
                                    </div>
                                </div>
                            @else
                                <div class="crowdsale-info-table text-center">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <h4>Exchange rate</h4>
                                        <p>1 ETH = {{ number_format($rate) }} BDG</p>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <h4>Gas Limit</h4>
                                        <p>200,000</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 bonus-countdown">
                                    <h2>Crowdsale ends in:</h2>
                                        @include('partials.countdown', ['timeLeft' => $ico['end']->timestamp - time()])
                                    </div>
                                </div>
                            @endif
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
                                        <a href="{{ route('details') }}" type="submit" class="btn btn-primary button-done">DONE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection

@push('body-scripts')
    <script>
        jqWait(function () {
            var copyContainer = $('#copy-address'), button = $('.btn', copyContainer), address = $('#ico-address'), message = $('.copied', copyContainer), handle;

            if(typeof document.execCommand === 'function') {
                copyContainer.show();
            }

            button.click(function () {
                address.select();
                document.execCommand('Copy');
                message.fadeIn();
                if(handle) clearTimeout(handle);
                handle = setTimeout(function () {
                    message.fadeOut();
                }, 2500);
            });
        })
    </script>
@endpush
@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        <div class="col-sm-3 col-md-2 hidden-xs-down sidebar steps">
            <h4>@lang('ico.whats-next')</h4>
            <ul class="sidebar-nav">
                <li class="step-done"><a href="#">@lang('ico.step', ['number' => 1])</a></li>
                <li class="step-active"><a href="{{ route('address') }}">@lang('ico.step', ['number' => 2])</a></li>
                <li class="step-other"><a href="{{ route('details') }}"><span>@lang('ico.other')</span></a></li>
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">
                    @if($ico['end']->isPast())
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1 text-center">
                                <img src="{{ asset_rev('token.png') }}" alt="@lang('ico.bdg')">
                                <h1>@lang('ico.ico-ended')</h1>
                                <h4>@lang('ico.ico-thanks')</h4>
                            </div>
                        </div>
                    @else
                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1 eth-address">
                            <h1 class="text-center">@lang('ico.headline')</h1>
                            <div class="bonuses-modal">
                                <div class="" data-toggle="modal" data-target="#Gas1Modal">
                                    <p><span class="text-center announcement">Want a smooth & fast transaction without rejection? Set GAS LIMIT to <b>200,000</b> it's the MUST!</span></p>
                                </div>

                                <div class="modal fade" role="dialog" id="Gas1Modal" tabindex="-1" aria-labelledby="gridModalLabel" style="display: none;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <div class="modal-title">
                                                    <h2>GAS LIMIT</h2>
                                                </div>
                                            </div>

                                            <div class="modal-body">
                                                <img src="{{ asset_rev('gas-limit2.png') }}" alt="Gas Lmit">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" readonly value="{{ $ico['address'] }}" onclick="this.setSelectionRange(0, this.value.length)" id="ico-address" style="text-transform: none !important;">
                                <div class="text-right">
                                    <div class="copy-address text-right" id="copy-address">
                                        <span class="text-success copied" style="display: none">@lang('ico.copied')</span>
                                        <a class="btn">@lang('ico.copy')</a>
                                    </div>

                                    <div class="token-calc-modal">
                                        <div class="token-calculator" data-toggle="modal" data-target="#CalcModal">
                                            <div class="token-calculator-btn">
                                                <a class="btn" data-toggle="modal" href="#token-calc-modal">@lang('ico.calculator')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                    <h4>@lang($currentBonus['name'])</h4>
                                                    <p>{{ ($currentBonus['bonus']-1) * 100 }}%</p>
                                                </div>

                                                <div class="modal fade" role="dialog" id="BonusModal" tabindex="-1" aria-labelledby="gridModalLabel" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                <div class="modal-title">
                                                                    <h2>@lang('ico.receive')</h2>
                                                                </div>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="bonuses-table">
                                                                    <table>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                            </td>
                                                                            <td>@lang('ico.week-num', ['number' => 1])</td>
                                                                            <td>@lang('ico.bonus-percent', ['amount' => 15])</td>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                            </td>
                                                                            <td>@lang('ico.week-num', ['number' => 2])</td>
                                                                            <td>@lang('ico.bonus-percent', ['amount' => 10])</td>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                            </td>
                                                                            <td>@lang('ico.week-num', ['number' => 3])</td>
                                                                            <td>@lang('ico.bonus-percent', ['amount' => 5])</td>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                                            </td>
                                                                            <td>@lang('ico.week-num', ['number' => 4])</td>
                                                                            <td>@lang('ico.bonus-percent', ['amount' => 0])</td>
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
                                        <h4>@lang('ico.rate-with-bonus')</h4>
                                        <p>1 ETH = {{ number_format($rate) }} BDG</p>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 last">
                                        <h4 style="display: inline-block;">@lang('ico.gas-limit')</h4>
                                        <div style="display: inline-block;" class="bonuses-modal">
                                            <div class="" data-toggle="modal" data-target="#Gas1Modal">
                                                <p style="text-decoration:underline; color: #ffbcbc; font-size:16px; cursor:pointer;">(SEE HOW)</p>
                                            </div>

                                            <div class="modal fade" role="dialog" id="Gas1Modal" tabindex="-1" aria-labelledby="gridModalLabel" style="display: none;">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            <div class="modal-title">
                                                                <h2>GAS LIMIT</h2>
                                                            </div>
                                                        </div>

                                                        <div class="modal-body">
                                                            <img src="{{ asset_rev('gas-limit2.png') }}" alt="Gas Lmit">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <p>200,000</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 bonus-countdown">
                                        <h2>@lang('ico.bonus-ends-in', ['bonusName' => __($currentBonus['name'])])</h2>
                                        @include('partials.countdown', ['timeLeft' => $currentBonus['to']->timestamp - time()])
                                    </div>
                                </div>
                            @else
                                <div class="crowdsale-info-table text-center">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <h4>@lang('ico.exchange-rate')</h4>
                                        <p>1 ETH = {{ number_format($rate) }} BDG</p>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <h4>@lang('ico.gas-limit')</h4>
                                        <p>200,000</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 bonus-countdown">
                                    <h2>@lang('ico.ends-in')</h2>
                                        @include('partials.countdown', ['timeLeft' => $ico['end']->timestamp - time()])
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <div class="well">
                                <p>@lang('ico.notice', ['commaSeparatedWalletList' => '<a href="'.route('participate').'" style="color:#fff; text-decoration: underline;">MyEtherWallet, MetaMask, Mist, Tokenlot</a>'])</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1 buttons">
                            <div class="content dashboard-buttons">
                                <div class="left text-left">
                                    <a class="how-to-participate" href="{{ route('participate') }}">@lang('ico.how-to')</a>
                                </div>
                                <div class="right text-right">
                                    <div class="cta">
                                        <a href="{{ route('details') }}" type="submit" class="btn btn-primary button-done">@lang('ico.done')</a>
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

    @include('partials.token-calculator')
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
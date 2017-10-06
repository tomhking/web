<div class="ico-progress">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($icoStart->isFuture())
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-center">Crowdsale starts in:</h1>
                            </div>
                        </div>
                    </div>
                    @include('partials.countdown', ['timeLeft' => $icoStart->diffInSeconds(\Carbon\Carbon::now())])
                @elseif($icoEnd->isFuture() && $raisedEth < $hardCapEth)
                    <!-- ICO is in progress -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-center">ICO started!</h1>
                            </div>
                        </div>
                    </div>
                    @include('partials.countdown', ['timeLeft' => $icoEnd->diffInSeconds(\Carbon\Carbon::now())])
                @else
                    <!-- ICO is over -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-center">Thank you for participating!</h1>
                            </div>
                        </div>
                    </div>
                    @if($raisedEth < $softCapEth)
                        <!-- soft cap not reached -->
                    @elseif($raisedEth < $hardCapEth)
                        <!-- soft cap reached -->
                    @else
                        <!-- hard cap reached -->
                    @endif
                @endif

                <h2 class="current-amount">{{ $icoEnd->isFuture() ? "Currently raised" : "Raised" }}: <b> {{ number_format($raisedEth, $raisedDecimals, ".", "") }} ETH </b></h2>

                <div class="row">
                    <div class="col-md-12 text-center crowdsale-info">
                        @if($icoDataAvailable and $icoEnd->isFuture())
                            @if($showAddress)
                                <h3>Send Ether (only) to this contract address</h3>
                                <code>{{ $icoAddress }}</code>
                                <p>Recommended Gas Limit: 200000</p>
                            @else
                                <p><a href="#agreement-popup" class="btn btn-primary" data-toggle="modal" data-target="#signup-modal">Get Crowdsale Address</a></p>
                            @endif
                        @elseif($icoEnd->isPast())
                            <h2>Crowdsale is over</h2>
                        @else
                            <div class="communicate contact">
                                <form action="https://xyz.us16.list-manage.com/subscribe/post?u=528cc9372b916077746636344&amp;id=f79db67249" method="post">
                                    <input class="suscribe-input" name="EMAIL" type="email" placeholder="@lang('subscribe.email_placeholder')" required>
                                    <input type="submit" class="submit" value="@lang('subscribe.button')" name="subscribe">
                                </form>
                                @include('partials.contact-icons')
                            </div>
                        @endif
                    </div>
                </div>

                @if($icoDataAvailable)
                    <h3>Progress: {{ number_format($progress, 1) }}%</h3>

                    <div class="progress-bar-wrapper">
                        <div style="position: relative; margin-bottom: 2em; background: rgba(177, 177, 177, 0.52); box-shadow: inset 0 1px 0 0 rgba(249, 249, 249, 0.11);">
                            <!-- progress bar -->
                            <div style="width: {{ $progress }}%; height: 30px; background-image: linear-gradient(-180deg, #F93800 4%, #c02b3f 99%); box-shadow: inset 0 2px 0 0 #ff6868; position: relative;"></div>
                        </div>
                        <!-- soft cap marker -->
                        <div class="soft-cap-marker" style="z-index: 20; position: absolute; top: 0; bottom:0; width: 1px; height: 30px; left: {{ $softCapEth / $hardCapEth * 100 }}%; background: #fff;"> <h3 class="soft-cap-text">Soft Cap: {{ number_format($softCapEth, 0, ".", "") }} ETH</h3></div>


                        <!-- hard cap marker -->
                        <div class="hard-cap-marker"  style="z-index: 20; position: absolute; top: 0; bottom:0; width: 1px; height: 30px; right: 0; background: #fff;"> <h3 class="hard-cap-text">Hard Cap: {{ number_format($hardCapEth, 0, ".", "") }} ETH</h3></div>

                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
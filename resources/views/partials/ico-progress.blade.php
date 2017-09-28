<div class="ico-progress">
    <div class="container">
        <div class="row">
            <div class="col-md-12" data-time-left="{{ $timeLeft }}">
                <div class="countdown">
                    <div class="time-amount">
                        <span class="time-left-days">0</span>
                        <span class="time-value">days</span>
                    </div>
                    <div class="time-amount">
                        <span class="time-left-hours">00</span>
                        <span class="time-value">hours</span>
                    </div>:<div class="time-amount"><span class="time-left-minutes">00</span><span class="time-value">minutes</span></div>:<div class="time-amount"><span class="time-left-seconds">00</span><span class="time-value">seconds</span></div>
                </div>

                <h2 class="current-amount">Currently raised: <b> {{ number_format($raisedEth, $raisedDecimals, ".", "") }} ETH </b></h2>

                        <div class="row">
                            <div class="col-md-12 text-center crowdsale-info">
                                @if($icoDataAvailable)
                                    @if($showAddress)
                                        <h3>Send Ether (only) to this contract address</h3>
                                        <code>{{ $icoAddress }}</code>
                                        <p>Recommended Gas Limit: 200000</p>
                                    @else
                                        <p><a href="#agreement-popup" class="btn btn-primary" data-toggle="modal" data-target="#signup-modal">Get Crowdsale Address</a></p>
                                    @endif
                                @else
                                    <h2>Crowdsale information will be announced soon.</h2>
                                @endif
                            </div>
                        </div>

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
            </div>
        </div>
    </div>
</div>
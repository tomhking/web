<div class="trust collaboration-with">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-push-2 text-center">
                <h2 class="title">
                    @if(isset($sponsor))
                        Course developed in collaboration with
                    @else
                        In Collaboration With
                    @endif
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="row row-logos sponsor-{{ $sponsor or 'default' }}">
                    @if(isset($sponsor) && $sponsor == 'nexchange')
                        <div class="col-xs-12 text-center">
                            <a href="https://nexchange.io/" target="_blank"><img src="{{ asset_rev('partners/nexchange.png') }}" alt="NEXCHANGE"></a>
                            <h4 class="title text-muted">
                                <div>Exchange Cryptocurrencies</div>
                                Simple. Secure. Transparent.
                            </h4>
                        </div>
                    @else
                        <div class="col-xs-6 col-sm-6 text-center">
                            <a href="https://www.000webhost.com" target="_blank"><img src="{{ asset_rev('000webhost-2.png') }}" alt="@lang('home.starting_point_logo_000webhost')"></a>
                        </div>
                        <div class="col-xs-6 col-sm-6 text-center">
                            <a href="https://www.hostinger.com" target="_blank"><img src="{{ asset_rev('hostinger.png') }}"  alt="@lang('home.starting_point_logo_hostinger')"></a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
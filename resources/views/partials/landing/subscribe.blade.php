@if(!($hardCapReached ?? false))
    <div class="main container-fluid communicate light-violet-bkg cta-block">
        <div class="container text-center">
            <div class="row">
                @if($currentBonus)
                    <h1>JOIN CROWDSALE <b>NOW!</b> BONUS ENDS IN:</h1>
                    @include('partials.countdown', ['timeLeft' => $currentBonus['to']->diffInSeconds()])
                @else
                    <h1>@lang('ico.ends-in')</h1>
                    @include('partials.countdown', ['timeLeft' => config('ico.end')->isPast() ? 0 : config('ico.end')->diffInSeconds()])
                @endif
            </div>

            <div class="row find-out-more">
                <div class="col-xs-12 text-center">
                    <div class="contact">
                            @auth
                            <a class="cta-btn" href="{{ route('address') }}">@lang(config('ico.start')->isFuture() ? 'ico.join-now-c2a' : 'ico.get-tokens-now')</a>
                            @endauth
                            @guest
                            <a class="cta-btn" href="{{ route('register') }}">@lang(config('ico.start')->isFuture() ? 'ico.join-now-c2a' : 'ico.get-tokens-now')</a>
                            @endguest

                            @include('partials.contact-icons')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
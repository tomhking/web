
<header class="{{ $navBarOnly ?? false ? 'container-fluid' : '' }}">
    @if(!($navBarOnly ?? false))

        @push('body-scripts')
            <script>
                jqWait(function(){
                    $(window).on("load", function() {
                        var bg = $('#bgvid'), src = $('source', bg);
                        src.attr('src', src.attr('data-src'));
                        if(bg.length > 0) {
                            bg[0].loop = true;
                            bg[0].load();
                            bg[0].play();
                        }
                    });
                });
            </script>
        @endpush

        <nav id="sidebar" class="sidebar side-nav">
            <ul class="nav nav-list affix">
                <li><a href="#top">@lang('navigation.top')</a></li>
                <li><a href="#what-are-we">01. <span>@lang('navigation.what-it-is')</span></a></li>
                <li><a href="#starting-point">02. <span>@lang('navigation.users')</span></a></li>
                <li><a href="#why-us">03. <span>@lang('navigation.problems')</span></a></li>
                <li><a href="#statistics">04. <span>@lang('navigation.moocs')</span></a></li>
                <li><a href="#mvp">05. <span>@lang('navigation.perspective')</span></a></li>
                <li><a href="#demand-forecast">06. <span>@lang('navigation.demand')</span></a></li>
                <li><a href="#token-economy">07. <span>@lang('navigation.economy')</span></a></li>
                <li><a href="#token-distribution">08. <span>@lang('navigation.distribution')</span></a></li>
                <li><a href="#team">09. <span>@lang('navigation.team')</span></a></li>
                <li><a href="#roadmap">10. <span>@lang('navigation.roadmap')</span></a></li>
            </ul>
        </nav>
    @endif

    <div class="container header-content">
        <div class="navbar" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="{{ route('home') }}" class="navbar-logo navbar-brand">
                        <img class="logo" src="{{ asset_rev('bitdegree-logo.png') }}" alt="BitDegree">
                    </a>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>

                </div>

                @auth
                    <a class="login-link hidden-xs" href="{{ route('user') }}">• @lang('user.my_account')</a>
                @endauth
                @guest
                    <a class="login-link hidden-xs" href="{{ route('login') }}">• @lang('user.login')</a>
                @endguest

                <div id="navbar" class="collapse navbar-collapse navbar-container">
                    <div class="mobile-language-dropdown visible-xs-block">
                        <a class="active" href="#language-toggle" data-toggle="collapse">
                            <img src="{{asset_rev('flags/'.$languages[$currentLanguage].'.png')}}"> {{ $languages[$currentLanguage] }}
                        </a>
                        <div class="collapse list" id="language-toggle">
                            @foreach($languages as $code => $name)
                                <div class="language {{ $name }} {{ $code == $currentLanguage ? "current" : "" }}">
                                    <a href="{{ url('/'.$code.'/token') }}" class="{{ $code == $currentLanguage }}">
                                        <img src="{{asset_rev('flags/'.$name.'.png')}}"> {{ $name }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('home') }}#what-are-we" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.what-is')</a></li>
                        <li class="narrow"><a href="{{ route('home') }}#team" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.people')</a></li>
                        <li class="narrow middle"><a href="{{ route('home') }}#mvp" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.mvp')</a></li>
                        <li class="narrow middle"><a href="{{ route('faq') }}#faqs">@lang('navigation.faq')</a></li>
                        <li class="narrow"><a href="{{ route('home') }}#token-distribution" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.token')</a></li>
                        @if($currentLanguage == "cn")
                            <li class="narrow"><a href="{{ asset_rev('files/onepager-cn.pdf') }}" target="_blank">@lang('navigation.one-pager')</a></li>
                        @elseif($currentLanguage == "ru")
                            <li class="narrow middle"><a href="{{ asset_rev('files/onepager-ru.pdf') }}" target="_blank">@lang('navigation.one-pager')</a></li>
                        @else
                            <li class="narrow"><a href="/bitdegree-ico-one-pager.pdf" target="_blank">@lang('navigation.one-pager')</a></li>
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right no-padding visible-xs-block">
                        @if($currentLanguage == "cn")
                            <li><a href="https://www.bitdegree.org/white-paper-cn.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @elseif($currentLanguage == "ru")
                            <li><a href="https://www.bitdegree.org/white-paper-ru.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @else
                            <li><a href="https://www.bitdegree.org/white-paper.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @endif
                        @guest
                            <li><a href="{{ route('login') }}">@lang('user.login')</a></li>
                        @endguest
                        @auth
                            <li><a href="{{ route('address') }}">@lang('user.my_account')</a></li>
                        @endauth
                    </ul>
                    <ul class="cta-menu hidden-xs">
                        @if($currentLanguage == "cn")
                            <li><a href="https://www.bitdegree.org/white-paper-cn.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @elseif($currentLanguage == "ru")
                            <li><a href="https://www.bitdegree.org/white-paper-ru.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @else
                            <li><a href="https://www.bitdegree.org/white-paper.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @endif
                    </ul>
                    <ul class="cta-menu visible-xs-block">
                        <li><a href="{{ route(auth()->check() ? 'address' : 'register') }}" class="navbar-cta navbar-cta-red">@lang('ico.get-tokens-now')</a></li>
                    </ul>

                    <div class="dropdown lang-menu hidden-xs">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown"><img src="{{asset_rev('flags/'.$languages[$currentLanguage].'.png')}}"> <span class="caret"></span></button>
                        <ul class="dropdown-menu ">
                            @foreach($languages as $code => $name)
                                <li class="{{ $name }} {{ $code == $currentLanguage ? "current" : "" }}"><a href="{{ url('/'.$code.'/token') }}" class="{{ $code == $currentLanguage }}">
                                        <img src="{{asset_rev('flags/'.$name.'.png')}}"> {{ $name }}
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        @if(!($navBarOnly ?? false))
            <div class="row">
                <div class="col-xs-12 text-center">
                    @if(config('ico.start')->isFuture())
                        <h2 class="title">@lang('home.header_title')</h2>
                        <div class="description">
                            <p>@lang('home.header_subtitle')</p>
                        </div>
                    @endif

                    <div class="ico-progress">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-md-offset-2">
                                    @if(config('ico.start')->isFuture())
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 class="text-center">@lang('ico.home-countdown')</h1>
                                            </div>
                                        </div>
                                        @include('partials.countdown', ['timeLeft' => config('ico.start')->diffInSeconds()])
                                    @else

                                        @include('partials.ico-countdown')

                                        <h4 class="ico-progress-percentage text-left">@lang('ico.progress', ['number' => number_format($progress, 1) ]) {{ number_format($tokensSold, 0, ".", ",") }} BDG</h4>

                                        <div class="progress-bar-wrapper">
                                            <div style="position: relative; margin-bottom: 2em; background: rgba(177, 177, 177, 0.52); box-shadow: inset 0 1px 0 0 rgba(249, 249, 249, 0.11);">
                                                <!-- progress bar -->
                                                <div style="width: {{ $softCapReached ? $progress : $progressSoftCap}}%; height: 30px; background-image: linear-gradient(-180deg, #F93800 4%, #c02b3f 99%); box-shadow: inset 0 2px 0 0 #ff6868; position: relative;"></div>
                                            </div>

                                            @if(!$softCapReached)
                                                <!-- soft cap marker -->
                                                <div class="hard-cap-marker"  style="z-index: 20; position: absolute; top: 0; bottom:0; width: 1px; height: 30px; right: 0; background: #fff;"> <h5 class="hard-cap-text">@lang('ico.soft-cap'): {{ number_format($softCap, 0, ".", ",") }} BDG</h5></div>
                                            @else
                                                <!-- soft cap marker -->
                                                <div class="soft-cap-marker" style="z-index: 20; position: absolute; top: 0; bottom:0; width: 1px; height: 30px; left: {{ $softCapPart }}%; background: #fff;"> <h5 class="soft-cap-text">@lang('ico.soft-cap')</h5></div>

                                                <!-- hard cap marker -->
                                                <div class="hard-cap-marker"  style="z-index: 20; position: absolute; top: 0; bottom:0; width: 1px; height: 30px; right: 0; background: #fff;"> <h5 class="hard-cap-text">@lang('ico.hard-cap'): {{ number_format($hardCap, 0, ".", ",") }} BDG</h5></div>
                                            @endif
                                        </div>

                                        <div class="communicate">
                                            <div class="contact">
                                                @auth
                                                    <a class="cta-btn visible-xs-block" href="{{ route('address') }}">@lang(config('ico.start')->isFuture() ? 'ico.join-now-c2a' : 'ico.get-tokens-now')</a>
                                                @endauth
                                                @guest
                                                    <a class="cta-btn visible-xs-block" href="{{ route('register') }}">@lang(config('ico.start')->isFuture() ? 'ico.join-now-c2a' : 'ico.get-tokens-now')</a>
                                                @endguest
                                            </div>
                                        </div>

                                        <div class="bonuses-table">
                                            <h4 class="text-center">@lang('ico.receive')</h4>
                                            <table>
                                                <tbody>
                                                @foreach(config('ico.bonuses') as $bonus)
                                                    @php($amount = ($bonus['bonus']-1)*100)
                                                    @php($iconCount = bcdiv($amount, 5))
                                                    @php($weekNum = ($weekNum ?? 0) + 1)
                                                    @php($hasEnded = $bonus['to']->isPast())
                                                    @php($bonusActive = \Carbon\Carbon::now()->between($bonus['from'], $bonus['to']))
                                                    @php($hasActiveBonuses = ($hasActiveBonuses ?? false) || $bonusActive)
                                                    <tr class="{{ $hasEnded ? "ended" : "" }}">
                                                        <td class="text-left" style="width:175px;">
                                                            @for($i = $iconCount; $i >= 0; $i--)
                                                                <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                            @endfor
                                                        </td>
                                                        <td>
                                                            @lang('ico.bonus-percent', ['amount' => $amount])
                                                            <div class="visible-xs-block">
                                                                @lang('ico.week-num', ['number' => $weekNum])
                                                            </div>
                                                            <div class="visible-xs-block">
                                                                @if($hasEnded)
                                                                    <span class="tokens-left">@lang('ico.bonus-ended')</span>
                                                                @elseif($bonusActive)
                                                                    <span class="tokens-left">@lang('ico.available-now')</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="hidden-xs">@lang('ico.week-num', ['number' => $weekNum])</td>
                                                        <td class="hidden-xs">
                                                            @if($hasEnded)
                                                                <span class="tokens-left">@lang('ico.bonus-ended')</span>
                                                            @elseif($bonusActive)
                                                                <span class="tokens-left">@lang('ico.available-now')</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="text-left">
                                                        <img src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token">
                                                    </td>
                                                    <td>
                                                        @lang('ico.bonus-percent', ['amount' => 0])
                                                        <div class="visible-xs-block">
                                                            @lang('ico.week-num', ['number' => 4])
                                                        </div>
                                                        <div class="visible-xs-block">
                                                            @if(config('ico.end')->isPast())
                                                                <span class="tokens-left">@lang('ico.bonus-ended')</span>
                                                            @elseif(!$hasActiveBonuses)
                                                                <span class="tokens-left">@lang('ico.available-now')</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="hidden-xs">@lang('ico.week-num', ['number' => 4])</td>
                                                    <td class="hidden-xs">
                                                        @if(config('ico.end')->isPast())
                                                            <span class="tokens-left">@lang('ico.bonus-ended')</span>
                                                        @elseif(!$hasActiveBonuses)
                                                            <span class="tokens-left">@lang('ico.available-now')</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="communicate">
                        <div class="contact">
                            @auth
                                <a class="cta-btn" href="{{ route('address') }}">@lang(config('ico.start')->isFuture() ? 'ico.join-now-c2a' : 'ico.get-tokens-now')</a>
                            @endauth
                            @guest
                                <a class="cta-btn" href="{{ route('register') }}">@lang(config('ico.start')->isFuture() ? 'ico.join-now-c2a' : 'ico.get-tokens-now')</a>
                            @endguest
                            <div class="contact-icons buttons">
                                <a class="contact-icon" href="https://t.me/bitdegree" rel="nofollow" target="_blank"><img src="{{ asset_rev('telegram-logo.png') }}" alt="Telegram"></a>
                                <a class="contact-icon" href="https://twitter.com/bitdegree_org" rel="nofollow" target="_blank"><img src="{{ asset_rev('twitter-logo.png') }}" alt="Twitter"></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>

</header>
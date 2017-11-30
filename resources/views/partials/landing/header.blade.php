
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
                <div id="navbar" class="collapse navbar-collapse navbar-container">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('home') }}#what-are-we" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.what-is')</a></li>
                        <li class="narrow"><a href="{{ route('home') }}#team" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.people')</a></li>
                        <li class="narrow middle"><a href="{{ route('home') }}#mvp" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.mvp')</a></li>
                        <li class="narrow middle"><a href="{{ route('faq') }}">@lang('navigation.faq')</a></li>
                        <li class="narrow"><a href="{{ route('home') }}#token-distribution" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.token')</a></li>
                        @if($currentLanguage == "cn")
                            <li class="narrow"><a href="{{ asset_rev('files/onepager-cn.pdf') }}" target="_blank">@lang('navigation.one-pager')</a></li>
                        @elseif($currentLanguage == "ru")
                            <li class="narrow middle"><a href="{{ asset_rev('files/onepager-ru.pdf') }}" target="_blank">@lang('navigation.one-pager')</a></li>
                        @else
                            <li class="narrow"><a href="/bitdegree-ico-one-pager.pdf" target="_blank">@lang('navigation.one-pager')</a></li>
                        @endif
                    </ul>
                    <ul class="cta-menu">
                        @if($currentLanguage == "cn")
                            <li><a href="https://www.bitdegree.org/white-paper-cn.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @elseif($currentLanguage == "ru")
                            <li><a href="https://www.bitdegree.org/white-paper-ru.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @else
                            <li><a href="https://www.bitdegree.org/white-paper.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @endif

                    </ul>

                    <div class="dropdown lang-menu">
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
                    <h2 class="title">@lang('home.header_title')</h2>
                    <div class="description">
                        <p>@lang('home.header_subtitle')</p>
                    </div>

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
                                        @include('partials.countdown', ['timeLeft' => config('ico.start')->timestamp - time()])
                                    @else
                                        <h3 class="ico-progress-percentage">Progress: {{ number_format($progress, 1) }}% ({{ number_format($tokensSold, $raisedDecimals, ".", "") }} BDG)</h3>

                                        <div class="progress-bar-wrapper">
                                            <div style="position: relative; margin-bottom: 2em; background: rgba(177, 177, 177, 0.52); box-shadow: inset 0 1px 0 0 rgba(249, 249, 249, 0.11);">
                                                <!-- progress bar -->
                                                <div style="width: {{ $progress }}%; height: 30px; background-image: linear-gradient(-180deg, #F93800 4%, #c02b3f 99%); box-shadow: inset 0 2px 0 0 #ff6868; position: relative;"></div>
                                            </div>

                                            <!-- soft cap marker -->
                                            <div class="soft-cap-marker" style="z-index: 20; position: absolute; top: 0; bottom:0; width: 1px; height: 30px; left: {{ $softCap / $hardCap * 100 }}%; background: #fff;"> <h3 class="soft-cap-text">Soft Cap: {{ number_format($softCap, 0, ".", ",") }} BDG</h3></div>

                                            <!-- hard cap marker -->
                                            <div class="hard-cap-marker"  style="z-index: 20; position: absolute; top: 0; bottom:0; width: 1px; height: 30px; right: 0; background: #fff;"> <h3 class="hard-cap-text">Hard Cap: {{ number_format($hardCap, 0, ".", ",") }} BDG</h3></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="communicate">
                        <div class="contact">
                            @auth
                                <p><strong>@lang('user.welcome_back', ['name' => auth()->user()->first_name ?: auth()->user()->email])</strong></p>
                                <p><a class="btn btn-account" href="{{ route('user') }}">@lang('user.my_account')</a></p>
                            @endauth
                            @guest
                                <a class="cta-btn" href="{{ route('register') }}">@lang('ico.join-now-c2a')</a>
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
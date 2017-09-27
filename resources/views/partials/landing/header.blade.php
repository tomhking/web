
<header class="{{ $navBarOnly ?? false ? 'container-fluid' : '' }}">
    @if(!($navBarOnly ?? false))
        <div class="medusae-overlay"></div>
        <video  id="bgvid" poster="{{ asset('landing-bg.jpg') }}" class="hidden-xs hidden-sm" autoplay="" loop="" style="position: absolute; height: 1006px; top:-105px;">
            <source src="{{ asset('bg.mp4') }}" type="video/mp4">
            @lang('misc.video-unsupported')
        </video>

        <nav id="sidebar" class="sidebar side-nav">
            <ul class="nav nav-list affix">
                <li><a href="#top">@lang('navigation.top')</a></li>
                <li><a href="#what-are-we">01. <span>@lang('navigation.what-it-is')</span></a></li>
                <li><a href="#section-two">02. <span>@lang('navigation.users')</span></a></li>
                <li><a href="#why-us">03. <span>@lang('navigation.problems')</span></a></li>
                <li><a href="#statistics">04. <span>@lang('navigation.moocs')</span></a></li>
                <li><a href="#section-five">05. <span>@lang('navigation.perspective')</span></a></li>
                <li><a href="#statistics-2">06. <span>@lang('navigation.demand')</span></a></li>
                <li><a href="#section-seven">07. <span>@lang('navigation.economy')</span></a></li>
                <li><a href="#team">08. <span>@lang('navigation.team')</span></a></li>
                <li><a href="#roadmap">09. <span>@lang('navigation.roadmap')</span></a></li>
            </ul>
        </nav>
    @endif

    <div class="container header-content">
        <div class="navbar" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="{{ route_lang('home') }}" class="navbar-logo navbar-brand">
                        <img class="logo" src="{{ asset('bitdegree-logo.png') }}" alt="BitDegree">
                    </a>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>

                </div>
                <div id="navbar" class="collapse navbar-collapse navbar-container">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route_lang('home') }}#what-are-we" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.what-is')</a></li>
                        <li><a href="{{ route_lang('home') }}#team" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.people')</a></li>
                        <li><a href="/bitdegree-ico-one-pager.pdf" target="_blank">@lang('navigation.one-pager')</a></li>
                        <!--<li><a href="#token-sale-terms" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.ico')</a></li>-->
                        <!--<li><a href="#faqs" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.faq')</a></li>-->
                        <!--<li><a href="https://medium.com/@bitdegree" target="_blank">@lang('navigation.blog')</a></li>-->
                    </ul>
                    <ul class="cta-menu">
                        <li><a href="{{ asset('files/white-paper.pdf') }}" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                    </ul>

                    <div class="dropdown lang-menu">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown">{{ $languages[$currentLanguage] }}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu ">
                            @foreach($languages as $code => $name)
                                <li class="{{ $code == $currentLanguage ? "current" : "" }}"><a href="{{ route('home', ['lang' => $code]) }}" class="{{ $code == $currentLanguage }}">{{ $name }}</a></li>
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
                    <div class="communicate">
                        <div class="contact">
                            <form action="https://xyz.us16.list-manage.com/subscribe/post?u=528cc9372b916077746636344&amp;id=f79db67249" method="post">
                                <input class="suscribe-input" name="EMAIL" type="email" placeholder="@lang('subscribe.email_placeholder')" required>
                                <input type="submit" class="submit" value="@lang('subscribe.button')" name="subscribe">
                            </form>
                        </div>

                        <div class="bullet-points">
                            <p>
                                @lang('home.incentives')  &#8226;
                                @lang('home.moocs')  &#8226;
                                @lang('home.ethereum')  &#8226;
                                @lang('home.decentralized')
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>

</header>
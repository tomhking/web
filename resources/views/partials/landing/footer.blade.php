<footer class="container-fluid footer main">
    <div class="container">
        <div class="row footer-links">
            <div class="col-md-12">
                <a href="{{ route('home') }}" class="footer-logo">
                    <img class="logo" src="{{ asset_rev('bitdegree-logo.png') }}" alt="BitDegree">
                </a>
            </div>
            <div class="col-md-12">
                <div class="navbar" role="navigation">
                    <div id="navbar-2" class="navbar-container">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('home') }}#what-are-we" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.what-is')</a></li>
                            <li class="narrow"><a href="{{ route('home') }}#team" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.people')</a></li>
                            <li class="narrow"><a href="{{ route('home') }}#mvp" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.mvp')</a></li>
                            <li class="narrow"><a href="{{ route('faq') }}">@lang('navigation.faq')</a></li>
                            <li><a href="https://github.com/bitdegree/bitdegree-token-crowdsale/tree/master/contracts">@lang('home.ico_token_source')</a></li>



                            @if($currentLanguage == "cn")
                                <li class="narrow"><a href="{{ asset_rev('files/onepager-cn.pdf') }}" target="_blank">@lang('navigation.one-pager')</a></li>
                                <li><a href="https://www.bitdegree.org/white-paper-cn.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                            @elseif($currentLanguage == "ru")
                                <li class="narrow"><a href="{{ asset_rev('files/onepager-ru.pdf') }}" target="_blank">@lang('navigation.one-pager')</a></li>
                                <li><a href="https://www.bitdegree.org/white-paper-ru.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                            @else
                                <li class="narrow"><a href="/bitdegree-ico-one-pager.pdf" target="_blank">@lang('navigation.one-pager')</a></li>
                                <li><a href="https://www.bitdegree.org/white-paper.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                            @endif
                        </ul>

                        <div class="footer-login">
                            <a class="login-link" href="{{ route('user') }}">Login</a> | <a class="login-link" href="{{ route('register') }}">Referral Program</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="https://www.ethereum.org/" rel="nofollow" class="footer-logo">
            <img class="logo" src="{{ asset_rev('ethereum.png') }}" alt="@lang('misc.ethereum-foundation')">
        </a>

        <p class="copyright">@lang('misc.copyright') © {{ date("Y") }} BitDegree.org <br>  <a href="mailto:hello@bitdegree.org">hello@bitdegree.org</a></p>
    </div>
</footer>
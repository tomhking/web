@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list login-page token-secured', 'hideFooter' => true])

@section('content')
<div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="dashboard-logo">
                        <a href="{{ route('home') }}" class="login-logo">
                            <img class="logo" src="{{ asset_rev('bitdegree-logo.png') }}" alt="BitDegree">
                        </a>
                    </div>
                </div>
                <!--div class="col-md-2">
                    <ul class="nav user-nav">
                        <li><a href="{{ route('affiliate') }}">@lang('navigation.affiliate')</a></li>
                    </ul>
                </div-->
            </div>
        </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <img class="token-image" src="{{ asset_rev('token.png') }}" alt="BitDegree Token">
                <p>@lang('user.congratulations', ['name' => auth()->user()->first_name ? : auth()->user()->email])</p>
                <div class="amount-of-tokens">
                    @lang('user.tokens_secured', ['number' => 1])
                </div>
                <div class="col-md-6 col-md-offset-3 text-left">
                    <div class="well">
                        <p>To claim your <b>FREE BDG</b> is simple. All you have to do is the following:</p>
                        <ul>
                            <li> * Join our Telegram group: <a href="https://t.me/bitdegree" rel="nofollow" target="_blank">https://t.me/bitdegree</a></li>
                            <li>* Follow us on Twitter: <a href="https://twitter.com/bitdegree_org" rel="nofollow" target="_blank">https://twitter.com/bitdegree_org</a></li>
                            <li>* No cheating</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <div class="share">
                <h3>@lang('user.share')</h3>
                <div class="share-arrow"></div>
                        <div class="share-buttons large">
                            <a class="telegram-share" href="https://t.me/bitdegree" target="_blank">
                                <i></i>
                                <span>Telegram</span>
                            </a>
                            <a class="twitter-share" href="http://twitter.com/intent/tweet?url=https://www.bitdegree.org/en/token&text=World's%20first%20blockchain-powered%20education%20platform%20with%20scholarships&via=bitdegree_org&hashtags=education%2Cblockchain%2CICO" target="_blank" class="share-btn twitter">
                                <i class="fa fa-twitter"></i> Tweet
                            </a>

                        </div>
                <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_google_plus"></a>
                    <a class="a2a_button_linkedin"></a>
                    <a class="a2a_button_reddit"></a>
                    <a class="a2a_button_tumblr"></a>
                </div>
                <script>
                    var a2a_config = a2a_config || {};
                    a2a_config.linkname = "BitDegree";
                    a2a_config.linkurl = "https://www.bitdegree.org/en/token";
                    a2a_config.color_main = "D7E5ED";
                    a2a_config.color_border = "AECADB";
                    a2a_config.color_link_text = "333333";
                    a2a_config.color_link_text_hover = "333333";
                </script>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
                <!-- AddToAny END -->
            </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3 bounty-note">
                <p>To receive your Tokens for sharing, join the BitDegree Bounty campaign <a href="https://bitcointalk.org/index.php?topic=2225880.0" target="_blank" style="color:#ec7686;"><b>here</b></a>.</p>
                <p>The bounty campaign consists of many ways you can earn tokens, all you need is an account on bitcointalk forum.</p>
            </div>
            <div class="col-md-12">
                <form method="post" action="{{ route('logout') }}">
                    <p><button class="back-to-homepage btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> @lang('user.logout')</button></p>
                    {!! csrf_field() !!}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('body-scripts')
    @include('partials.async-forms')
@endpush
@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list login-page token-secured', 'hideFooter' => true])

@section('content')
<div class="main">
    <div class="container">
            <a href="{{ route_lang('home') }}" class="login-logo">
                <img class="logo" src="{{ asset('bitdegree-logo.png') }}" alt="BitDegree">
            </a>

                @if($authenticated)
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img class="token-image" src="{{ asset('token.png') }}" alt="BitDegree EDU Token">
                            <p>@lang('user.congratulations', ['name' => $participant->first_name ? : $participant->email])</p>
                            <div class="amount-of-tokens">
                                @lang('user.tokens_secured', ['number' => 1])
                            </div>

                            <div class="col-md-6 col-md-offset-3">
                                <div class="share">
                            <h3>@lang('user.share')</h3>
                            <div class="share-arrow"></div>
                            <!-- AddToAny BEGIN -->
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
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
                        <div class="col-md-12">
                            <p><a class="back-to-homepage btn btn-default" href="{{ route_lang('logout') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i> @lang('user.logout')</a></p>
                        </div>
                    </div>
                @endif


    </div>
</div>
@endsection

@push('body-scripts')
    @include('partials.async-forms')
@endpush
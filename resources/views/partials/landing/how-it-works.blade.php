<div id="token-economy" class="how-it-works main">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 text-center">
                <div class="economy">
                    @if($currentLanguage == "cn")
                        <img src="{{ asset_rev('token-economy-cn.jpg') }}" alt="@lang('home.economy_image_alt')">
                    @elseif($currentLanguage == "ru")
                        <img src="{{ asset_rev('token-economy-ru.jpg') }}" alt="@lang('home.economy_image_alt')">
                    @else
                        <img src="{{ asset_rev('token-economy.jpg') }}" alt="@lang('home.economy_image_alt')">
                    @endif
                </div>
                <h4 class="title">BITDEGREE TOKEN ECONOMY PROTOTYPE</h4>
                <a href="{{ asset_rev('prototype-token-economy.jpg') }}" target="_blank"><img style="height: 250px;" src="{{ asset_rev('token-economy-prototype-thumbnail2.jpg') }}" alt="@lang('home.economy_image_alt')"></a>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="title-container">
                    <h2 class="title">@lang('home.economy_title')</h2>
                    <h3 class="subtitle">@lang('home.economy_subtitle')</h3>
                </div>

                <div class="col-xs-12 grey-block">
                    <p>@lang('home.economy_point_1')</p>
                </div>

                <div class="col-xs-12 grey-block">
                    <p>@lang('home.economy_point_2')</p>
                </div>

                <div class="col-xs-12 grey-block">
                    <p>@lang('home.economy_point_3')</p>
                </div>
            </div>

        </div>
    </div>
</div>
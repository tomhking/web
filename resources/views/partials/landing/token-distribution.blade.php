<div id="token-distribution" class="ico-info-block main light-violet-bkg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-push-2 text-center">
                <div class="title-container">
                    <h1 class="title">@lang('home.ico_section_title')</h1>
                    <h3 class="subtitle">@lang('home.ico_section_subtitle')</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                <table>
                    <tbody>
                    <tr>
                        <td><b>@lang('home.ico_section_minimum')</b></td><td>16,000 ETH*</td>
                    </tr>
                    <tr>
                        <td><b>@lang('home.ico_section_maximum')</b></td><td>75,000 ETH*</td>
                    </tr>
                    <tr>
                        <td><b>@lang('home.ico_section_exchange')</b></td><td>1 ETH = 10,000 BDG Tokens*</td>
                    </tr>
                    </tbody>
                </table>
                <p class="note text-center">@lang('home.ico_section_note')</p>
                <div class="text-center">
                    <p>@lang('home.ico_section_cta_text')</p>
                    <a href="#top" class="cta-btn">@lang('home.ico_section_cta_btn')</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="token-graphs main white-bkg">
    <div class="container">
        <div class="token-distribution">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-push-2 text-center">
                    <div class="title-container">
                        <h2 class="title">@lang('home.token_distribution_title')</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 description">
                    <div class="image-container text-center">
                        @if($currentLanguage == "cn")
                            <img src="{{ asset('token-distribution-cn.png') }}" alt="@lang('home.token_distribution_title')">
                        @elseif($currentLanguage == "ru")
                            <img src="{{ asset('token-distribution-ru.png') }}" alt="@lang('home.token_distribution_title')">
                        @else
                            <img src="{{ asset('token-distribution2.png') }}" alt="@lang('home.token_distribution_title')">
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 description">
                    <div class="description-container">
                        <table>
                            <tbody>
                            <tr>@lang('home.token_distribution_text_1')</tr>
                            <tr>@lang('home.token_distribution_text_2')</tr>
                            <tr>@lang('home.token_distribution_text_3')</tr>
                            <tr>@lang('home.token_distribution_text_4')</tr>
                            <tr>@lang('home.token_distribution_text_5')</tr>
                            <tr>@lang('home.token_distribution_text_6')</tr>
                            </tbody>
                        </table>
                        <p class="note text-center">@lang('home.token_distribution_note')</p>
                    </div>
                </div>
            </div>
        </div>
<hr>
        <div class="budget-allocation">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-push-2 text-center">
                    <div class="title-container">
                        <h2 class="title">@lang('home.budget_allocation_title')</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 description">
                    <div class="image-container text-center">
                        @if($currentLanguage == "cn")
                            <img src="{{ asset('budget-allocation-cn.png') }}" alt="@lang('home.budget_allocation_title')">
                        @elseif($currentLanguage == "ru")
                            <img src="{{ asset('budget-allocation-ru.png') }}" alt="@lang('home.budget_allocation_title')">
                        @else
                            <img src="{{ asset('budget-allocation.png') }}" alt="@lang('home.budget_allocation_title')">
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
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

            <div class="col-md-10 col-md-offset-1 token-info-table">

                <div class="col-xs-6 col-sm-3 col-md-3">
                    <h4>@lang('home.ico_section_token_type')</h4>
                    <p>@lang('home.ico_section_token_type_2')</p>

                    <h4>@lang('home.ico_token_symbol')</h4>
                    <p>BDG</p>

                    <h4>@lang('home.ico_section_exchange')</h4>
                    <p>1 ETH = 10,000 BDG*</p>

                </div>

                <div class="col-xs-6 col-sm-3 col-md-3">
                    <h4>@lang('home.ico_section_minimum')</h4>
                    <p>16,000 ETH*</p>

                    <h4>@lang('home.ico_section_maximum')</h4>
                    <p>75,000 ETH*</p>

                    <h4>@lang('home.ico_tokens_total')</h4>
                    <p>@lang('home.ico_tokens_total_2')</p>
                </div>

                <div class="col-xs-6 col-sm-3 col-md-3">
                    <h4>@lang('home.ico_accepted_currencies')</h4>
                    <p>ETH</p>


                    <h4>@lang('home.ico_section_legal_form')</h4>
                    <p>@lang('home.ico_section_legal_form2')</p>

                    <h4>@lang('home.ico_section_jurisdiction')</h4>
                    <p>@lang('home.ico_section_jurisdiction2')</p>

                </div>


                <div class="col-xs-6 col-sm-3 col-md-3">

                    <h4>@lang('home.ico_section_kyc')</h4>
                    <p>@lang('home.ico_section_kyc2')</p>

                    <h4>@lang('home.ico_section_escrow')</h4>
                    <p>@lang('home.ico_section_escrow2')</p>

                    <h4>@lang('home.ico_token_source')</h4>
                    <div class="token-table-links">
                        <p><a href="https://github.com/bitdegree/bitdegree-token-crowdsale/tree/master/contracts" rel="nofollow" target="_blank"> <i class="fa fa-github" aria-hidden="true"></i> Github</a></p>
                        <p><a href="https://bitcointalk.org/index.php?topic=2225880.0;all" rel="nofollow" target="_blank"> <i class="fa fa-btc" aria-hidden="true"></i> @lang('home.ico_token_source_link')</a></p>
                    </div>



                </div>
            </div>
            <div class="col-md-12">
                <p class="note text-center">@lang('home.ico_section_note')</p>
            </div>
        </div>

        @include('partials.landing.token-facts')

        <div class="row">
            <div class="col-md-12">

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
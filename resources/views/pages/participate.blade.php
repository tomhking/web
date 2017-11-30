@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in instructions', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        @include('partials.instructions-menu')

        <div class="col-sm-12  col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                            <div class="col-xs-12 col-md-12">
                            <h1 class="text-center">@lang('ico-instructions.headline')</h1>
                            <p class="subtitle">@lang('ico-instructions.intro')</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="well">
                                <p>@lang('ico-instructions.exchange-notice')</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div id="accordion" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <div class="instructions-button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h3>@lang('ico-instructions.option-mew')</h3>
                                        </div>
                                    </div>

                                    <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <h4>@lang('ico-instructions.mew-step-1')</h4>
                                            <img src="{{ asset_rev('instructions/myetherwallet-1.png') }}" alt="MyEtherWallet">

                                            <h4>@lang('ico-instructions.mew-step-2')</h4>
                                            <img src="{{ asset_rev('instructions/myetherwallet-2.png') }}" alt="MyEtherWallet">

                                            <h4>@lang('ico-instructions.mew-step-3')</h4>
                                            <img src="{{ asset_rev('instructions/myetherwallet-3.png') }}" alt="MyEtherWallet">
                                            <p>@lang('ico-instructions.mew-note-1')</p>
                                            <p>@lang('ico-instructions.mew-note-2')</p>
                                            <p>@lang('ico-instructions.mew-note-3')</p>

                                            <h4>@lang('ico-instructions.mew-step-4')</h4>
                                            <img src="{{ asset_rev('instructions/myetherwallet-4.png') }}" alt="MyEtherWallet">
                                            <p>@lang('ico-instructions.mew-note-4')</p>
                                            <p class="instructions-note">@lang('ico-instructions.mew-note-10')</p>

                                            <h4>@lang('ico-instructions.mew-step-5')</h4>
                                            <img src="{{ asset_rev('instructions/myetherwallet-5.png') }}" alt="MyEtherWallet">
                                            <p>@lang('ico-instructions.mew-note-5')</p>
                                            <p class="instructions-note">@lang('ico-instructions.mew-note-11')</p>

                                            <h4>@lang('ico-instructions.mew-step-6')</h4>
                                            <img src="{{ asset_rev('instructions/myetherwallet-6.png') }}" alt="MyEtherWallet">
                                            <p>@lang('ico-instructions.mew-note-6')</p>
                                                <ul>
                                                    <li>@lang('ico-instructions.mew-note-7')</li>
                                                    <li>@lang('ico-instructions.mew-note-8')</li>
                                                </ul>

                                            <h4>@lang('ico-instructions.mew-step-7')</h4>
                                            <p>@lang('ico-instructions.mew-note-9')</p>
                                            <img src="{{ asset_rev('instructions/myetherwallet-7.png') }}" alt="MyEtherWallet">
                                            <p class="instructions-note"><span><b>@lang('ico-instructions.note-general')</b></span>
                                                @lang('ico-instructions.mew-note-12')<br>
                                                @lang('ico-instructions.mew-note-13')<br>
                                                @lang('ico-instructions.mew-note-14')</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <div class="instructions-button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <h3>@lang('ico-instructions.option-mm')</h3>
                                        </div>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>@lang('ico-instructions.mm-description')</p>

                                            <h4>@lang('ico-instructions.mm-step-1')</h4>
                                            <img src="{{ asset_rev('instructions/metamask-1.png') }}" alt="MetaMask">

                                            <h4>@lang('ico-instructions.mm-step-2')</h4>
                                            <img src="{{ asset_rev('instructions/metamask-2.png') }}" alt="MetaMask">

                                            <h4>@lang('ico-instructions.mm-step-3')</h4>
                                            <img src="{{ asset_rev('instructions/metamask-3.png') }}" alt="MetaMask">

                                            <h4>@lang('ico-instructions.mm-step-4')</h4>
                                            <img src="{{ asset_rev('instructions/metamask-4.png') }}" alt="MetaMask">

                                            <h4>@lang('ico-instructions.mm-step-5')</h4>
                                            <img src="{{ asset_rev('instructions/metamask-5.png') }}" alt="MetaMask">

                                            <h4>@lang('ico-instructions.mm-step-6')</h4>
                                            <img src="{{ asset_rev('instructions/metamask-6.png') }}" alt="MetaMask">

                                            <h4>@lang('ico-instructions.mm-step-7')</h4>
                                            <img src="{{ asset_rev('instructions/metamask-7.png') }}" alt="MetaMask">

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <div class="instructions-button" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                            <h3>@lang('ico-instructions.option-mist')</h3>
                                        </div>
                                    </div>
                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">

                                            <h4>@lang('ico-instructions.mist-step-1')</h4>
                                            <img src="{{ asset_rev('instructions/mist-1.png') }}" alt="Mist">

                                            <h4>@lang('ico-instructions.mist-step-2')</h4>
                                            <img src="{{ asset_rev('instructions/mist-2.png') }}" alt="Mist">

                                            <h4>@lang('ico-instructions.mist-step-3')</h4>
                                            <img src="{{ asset_rev('instructions/mist-3.png') }}" alt="Mist">

                                            <h4>@lang('ico-instructions.mist-step-4')</h4>
                                            <img src="{{ asset_rev('instructions/mist-4.png') }}" alt="Mist">

                                            <h4>@lang('ico-instructions.mist-step-5')</h4>
                                            <img src="{{ asset_rev('instructions/mist-5.png') }}" alt="Mist">

                                            <h4>@lang('ico-instructions.mist-step-6')</h4>

                                            <h4>@lang('ico-instructions.mist-step-7')</h4>
                                            <img src="{{ asset_rev('instructions/mist-6.png') }}" alt="Mist">

                                            <p class="instructions-note">
                                                @lang('ico-instructions.mist-note-1')<br>
                                                @lang('ico-instructions.mist-note-2')<br>
                                                @lang('ico-instructions.mist-note-3')</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection


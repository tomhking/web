@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in instructions', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        @include('partials.instructions-menu')

        <div class="col-sm-12  col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                            <div class="col-xs-12 col-md-12">
                            <h1 class="text-center">@lang('ico-instructions.eth-headline')</h1>
                            <p class="subtitle">
                                @lang('ico-instructions.list-headline')<br>
                                @lang('ico-instructions.option-bank')<br>
                                @lang('ico-instructions.option-cc')<br>
                                @lang('ico-instructions.option-crypto')<br>
                                @lang('ico-instructions.suggestion')<br>
                                @lang('ico-instructions.kraken-notice')</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div id="accordion" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <div class="instructions-button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h3>@lang('ico-instructions.option-kraken')</h3>
                                        </div>
                                    </div>

                                    <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <h3>@lang('ico-instructions.eth-part-1')</h3>

                                            <h4>@lang('ico-instructions.kraken-eth-buy-1')</h4>
                                            <img src="{{ asset_rev('instructions/kraken-1.png') }}" alt="Kraken">

                                            <h4>@lang('ico-instructions.kraken-eth-buy-2')</h4>
                                            <img src="{{ asset_rev('instructions/kraken-2.png') }}" alt="Kraken">

                                            <h4>@lang('ico-instructions.kraken-eth-buy-3')</h4>
                                            <img src="{{ asset_rev('instructions/kraken-3.png') }}" alt="Kraken">

                                            <h4>@lang('ico-instructions.kraken-eth-buy-4')</h4>
                                            <img src="{{ asset_rev('instructions/kraken-4.png') }}" alt="Kraken">

                                            <h4>@lang('ico-instructions.kraken-eth-buy-5')</h4>
                                            <img src="{{ asset_rev('instructions/kraken-5.png') }}" alt="Kraken">

                                            <h4>@lang('ico-instructions.kraken-eth-buy-6')</h4>
                                            <img src="{{ asset_rev('instructions/kraken-6.jpeg') }}" alt="Kraken">

                                            <h4>@lang('ico-instructions.kraken-eth-buy-7')</h4>

                                            <div class="row">
                                                <div class="col-xs-12 col-md-12">
                                                    <h3>@lang('ico-instructions.eth-part-2')</h3>
                                                    <div class="well">
                                                        <p>@lang('ico-instructions.kraken-note-1')</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4>@lang('ico-instructions.kraken-eth-transfer-1')</h4>
                                            <img src="{{ asset_rev('instructions/kraken-7.png') }}" alt="Kraken">

                                            <h4>@lang('ico-instructions.kraken-eth-transfer-2')</h4>
                                            <img src="{{ asset_rev('instructions/kraken-8.png') }}" alt="Kraken">

                                            <h4>@lang('ico-instructions.kraken-eth-transfer-3')</h4>
                                            <p>@lang('ico-instructions.kraken-note-2')</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <div class="instructions-button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <h3>@lang('ico-instructions.option-cex')</h3>
                                        </div>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>@lang('ico-instructions.cex-description')</p>

                                            <h3>@lang('ico-instructions.eth-part-1')</h3>

                                            <h4>@lang('ico-instructions.cex-eth-buy-1')</h4>
                                            <img src="{{ asset_rev('instructions/cex-1.png') }}" alt="Cex">

                                            <h4>@lang('ico-instructions.cex-eth-buy-2')</h4>
                                            <img src="{{ asset_rev('instructions/cex-2.png') }}" alt="Cex">

                                            <h4>@lang('ico-instructions.cex-eth-buy-3')</h4>
                                            <img src="{{ asset_rev('instructions/cex-3.png') }}" alt="Cex">

                                            <h4>@lang('ico-instructions.cex-eth-buy-4')</h4>

                                            <h4>@lang('ico-instructions.cex-eth-buy-5')</h4>
                                            <img src="{{ asset_rev('instructions/cex-4.png') }}" alt="Cex">

                                            <h4>@lang('ico-instructions.cex-eth-buy-6')</h4>
                                            <img src="{{ asset_rev('instructions/cex-5.png') }}" alt="Cex">

                                            <h4>@lang('ico-instructions.cex-eth-buy-7')</h4>

                                            <h4>@lang('ico-instructions.cex-eth-buy-8')</h4>
                                            <img src="{{ asset_rev('instructions/cex-6.png') }}" alt="Cex">
                                            <p class="instructions-note">@lang('ico-instructions.cex-note-1')</p>

                                            <h3>@lang('ico-instructions.eth-part-2')</h3>


                                            <h4>@lang('ico-instructions.cex-eth-transfer-1')</h4>
                                            <img src="{{ asset_rev('instructions/cex-7.png') }}" alt="Cex">


                                            <h4>@lang('ico-instructions.cex-eth-transfer-2')</h4>
                                            <img src="{{ asset_rev('instructions/cex-8.png') }}" alt="Cex">

                                            <h4>@lang('ico-instructions.cex-eth-transfer-3')</h4>
                                            <p>@lang('ico-instructions.cex-note-2')</p>

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


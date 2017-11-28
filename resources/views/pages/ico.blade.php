@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list'])

@section('content')

    <div class="ico-page white-bkg">
        <div class="ico-top">
            @include('partials.ico-progress')
        </div>

        <div class="main container-fluid ico-info">
            <div class="container">
                @if($icoEnd->isFuture() && $tokensSold < $hardCap)
                    @include('partials.participant-instructions')
                @endif
                <div class="row token-calculator-btn">
                    <p class="text-center">
                        <a class="btn btn-default" data-toggle="collapse" href="#token-calculator">Token Calculator</a>
                    </p>
                </div>
                <div class="row collapse" id="token-calculator">
                    <div class="col-sm-4">
                        <h3>Amount of Ether</h3>
                        <input type="number" id="amt-eth">
                    </div>
                    <div class="col-sm-4">
                        <h3>Tokens to Be Received</h3>
                        <input type="number" id="amt-tokens">
                    </div>
                    <div class="col-sm-4">
                        <h3>% of total supply</h3>
                        <input type="number" id="amt-supply">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.email-modal')

@endsection

@push('body-scripts')
    <script type="text/javascript" src="{{ asset_rev('big.min.js') }}" async></script>
    <script type="text/javascript">
        jqWait(function() {
            @if($displaySignUp)
                $(window).on('load', function () {
                    $('#signup-modal').modal('show');
                });
            @endif

            var amtEth = $("#amt-eth"), amtTokens = $("#amt-tokens"), amtSupply = $("#amt-supply"), totalSupply = new Big({{ $totalSupply }}), rate = new Big({{ $icoRate }});

            amtEth.val(150);
            ethChanged();

            amtEth.keyup(ethChanged).change(ethChanged);
            amtTokens.keyup(tokensChanged).change(tokensChanged);
            amtSupply.keyup(supplyChanged).change(supplyChanged);

            function ethChanged() {
                var amt = parseFloat(amtEth.val().replace(",", "."));

                amt = new Big(isNaN(amt) || amt <= 0 ? 0 : (amt > totalSupply / rate ? totalSupply / rate : amt));

                amtTokens.val(amt.times(rate));
                amtSupply.val(amt.times(rate).div(totalSupply).times(100).toFixed(4));
            }

            function tokensChanged() {
                var amt = parseFloat(amtTokens.val().replace(",", "."));

                amt = new Big(isNaN(amt) || amt <= 0 ? 0 : (amt > totalSupply ? totalSupply : amt));

                amtEth.val(amt.div(rate));
                amtSupply.val(amt.div(totalSupply).times(100).toFixed(4));
            }

            function supplyChanged() {
                var amt = parseFloat(amtSupply.val().replace(",", "."));

                amt = new Big(isNaN(amt) || amt <= 0 ? 0 : (amt > 100 ? 100 : amt));

                amtEth.val(totalSupply.times(amt).div(100).div(rate));
                amtTokens.val(totalSupply.times(amt));
            }
        });
    </script>
@endpush
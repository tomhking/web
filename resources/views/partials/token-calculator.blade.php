<div class="modal fade" role="dialog" id="token-calc-modal" tabindex="-1" aria-labelledby="gridModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="modal-title">
                    <h2>@lang('ico.calculator')</h2>
                </div>
            </div>

            <div class="modal-body text-left">
                <div class="content">
                    <div class="row" id="token-calculator">
                        <div class="col-md-4">
                            <h4>@lang('ico.amount-eth')</h4>
                            <input type="number" id="amt-eth">
                        </div>
                        <div class="col-md-4">
                            <h4>@lang('ico.amount-tokens')</h4>
                            <input type="number" id="amt-tokens">
                        </div>
                        <div class="col-md-4">
                            <h4>@lang('ico.percentage-supply')</h4>
                            <input type="number" id="amt-supply">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('body-scripts')
    <script src="{{ asset_rev('big.min.js') }}"></script>
    <script>
        jqWait(function () {
            var
                amtEth = $("#amt-eth"),
                amtTokens = $("#amt-tokens"),
                amtSupply = $("#amt-supply"),
                totalSupply = new Big({{ config('ico.hardCap') }}),
                rate = new Big({{ config('ico.rate') }});

            amtEth.val(150);
            ethChanged();

            amtEth.keyup(ethChanged).change(ethChanged);
            amtTokens.keyup(tokensChanged).change(tokensChanged);
            amtSupply.keyup(supplyChanged).change(supplyChanged);

            function ethChanged(e) {
                var amt = parseFloat(amtEth.val().replace(",", "."));

                amt = new Big(isNaN(amt) || amt <= 0 ? 0 : (amt > totalSupply / rate ? totalSupply / rate : amt));

                amtTokens.val(amt.times(rate));
                amtSupply.val(amt.times(rate).div(totalSupply).times(100).toFixed(4));
            }

            function tokensChanged(e) {
                var amt = parseFloat(amtTokens.val().replace(",", "."));

                amt = new Big(isNaN(amt) || amt <= 0 ? 0 : (amt > totalSupply ? totalSupply : amt));

                amtEth.val(amt.div(rate));
                amtSupply.val(amt.div(totalSupply).times(100).toFixed(4));
            }

            function supplyChanged(e) {
                var amt = parseFloat(amtSupply.val().replace(",", "."));

                amt = new Big(isNaN(amt) || amt <= 0 ? 0 : (amt > 100 ? 100 : amt));

                amtEth.val(totalSupply.times(amt).div(100).div(rate));
                amtTokens.val(totalSupply.times(amt));
            }
        });
    </script>
@endpush
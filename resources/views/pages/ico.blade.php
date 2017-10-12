@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list'])

@section('content')

    <div class="ico-page white-bkg">
        <div class="ico-top">
            @include('partials.ico-progress')

        </div>

        <div class="main container-fluid ico-info">
            <div class="container">
                @if($icoEnd->isFuture() && $raisedEth < $hardCapEth)
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

    <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Participate in BitDegree ICO</h4>
                </div>
                <div class="modal-body" id="modal-agreements">
                    <div class="checkbox">
                        <label><input class="check-required" type="checkbox" name="checkbox"> Confirm thar you are not a United States citizen, resident or green card holder, or have a primary residence or domicile in the united States, including Puerto Rico, the U.S. Virgin Islands or any other territories of the United States and are not purchasing BitDegree tokens or signing on behalf of a United States citizen, resident or entity.</label>
                    </div>
                    <div class="checkbox">
                        <label><input class="check-required" type="checkbox" name="checkbox"> Confirm that you have read and understand the Terms of Token Sale and expressly accept all terms, conditions, obligations, affirmations, representations and warranties described in these Terms and agree to be bound by them.</label>
                    </div>
                    <div class="checkbox">
                        <label><input class="check-required" type="checkbox" name="checkbox"> Confirm that you have read and understand the Terns and Conditions and Privacy Policy and expressly accept all terms, conditions, obligations, affirmations, representations and warranties described in these Terms and agree to be bound by them.</label>
                    </div>
                    <div class="checkbox">
                        <label><input class="check-required" type="checkbox" name="checkbox"> Confirm that you have read and understand the <a href="/white-paper.pdf" target="_blank">BitDegree White Paper</a>.</label>
                    </div>
                    <a id="confirm-agreements" class="btn btn-success disabled">You must agree with all points in order to continue</a>
                </div>
                <div class="modal-body" id="modal-sign-up" style="display: none">
                    <form action="{{ route_lang('ico') }}" method="post">
                        <div class="alert alert-danger other-error" style="display: none;">An unknown error occurred. Please make sure you entered correct data and try again.</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group validation-first-name">
                                    <label for="input-first-name">First Name</label>
                                    <input type="text" class="form-control" id="input-first-name" name="first-name">
                                    <span class="text-danger validation-error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group validation-last-name">
                                    <label for="input-last-name">Last Name</label>
                                    <input type="text" class="form-control" id="input-last-name" name="last-name">
                                    <span class="text-danger validation-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group validation-email">
                                    <label for="input-email">Email</label>
                                    <input type="email" class="form-control" id="input-email" name="email">
                                    <span class="text-danger validation-error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group validation-phone">
                                    <label for="input-phone">Phone Number</label>
                                    <input type="text" class="form-control" id="input-phone" name="phone">
                                    <span class="text-danger validation-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group validation-country">
                                    <label for="input-country">Country</label>
                                    <select name="country" id="input-country" class="form-control">
                                        <option value="">- please select -</option>
                                        @foreach($countries as $code => $country)
                                            <option value="{{ $code }}" {{ in_array($code, $blacklistedCountries) ? "disabled" : "" }} {{ $currentCountry == $code && !in_array($code, $blacklistedCountries) ? "selected" : "" }}>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger validation-error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group validation-birthday">
                                    <label for="input-birthday">Date of Birth</label>
                                    <input type="date" class="form-control" id="input-birthday" name="birthday" max="{{ \Carbon\Carbon::today()->subYears(16)->toDateString() }}" min="{{ \Carbon\Carbon::today()->subYears(100)->toDateString() }}">
                                    <span class="text-danger validation-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group validation-wallet">
                                    <label for="input-wallet">Ethereum Wallet Address</label>
                                    <input type="text" class="form-control" id="input-wallet" name="wallet">
                                    <span class="text-danger validation-error"></span>
                                </div>
                                <div class="well well-sm">Please make sure to enter a valid ERC20 compatible Ethereum address to receive your tokens. Do not use any exchange address!</div>
                            </div>
                        </div>
                        <button class="btn btn-primary">Participate in BitDegree ICO</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('body-scripts')
    <script type="text/javascript" src="{{ asset('big.min.js') }}" async></script>
    <script type="text/javascript">
        jqWait(function() {
            var confirmationButton = $('#confirm-agreements'), modalAgreement = $('#modal-agreements'), modalSignup = $('#modal-sign-up');

            confirmationButton.click(function () {
                modalAgreement.hide();
                modalSignup.show();
            });

            $('#modal-sign-up form').submit(function (e) {
                var form = $(this), inputs = $("input,select,button", form), formData = $(this).serialize();
                e.preventDefault();

                inputs.attr("disabled", "disabled");
                $('.has-error', form).removeClass('has-error');
                $('.validation-error', form).text('');
                $('.other-error').hide();

                $.post(form.attr('action'), formData).then(function (e) {
                    location.reload();
                }).catch(function (response) {
                    if(response.status === 422) {
                        Object.keys(response.responseJSON).forEach(function(key) {
                            var field = $('.validation-'+key, form);
                            field.addClass('has-error');
                            $('.validation-error', field).text(response.responseJSON[key].join(' '));
                        });
                    } else{
                        $('.other-error').show();
                    }

                    inputs.removeAttr('disabled');
                });
            });

            $('.check-required').change(function () {
                var total = $('.check-required').length, checked = $('.check-required:checked').length;

                if(total === checked){
                    confirmationButton.text('Continue').removeClass('disabled');
                }else{
                    confirmationButton.text('You must agree with all points in order to continue').addClass('disabled');
                }
            });

            $('[data-time-left]').each(function () {
                var timer = this;
                var secondsLeft = parseInt($(timer).attr('data-time-left'));
                var initializedAt = Math.floor(Date.now()/1000), remainingAtInit = secondsLeft;

                if(secondsLeft === 0) {
                    return;
                }

                var interval = setInterval(function () {
                    var currentTimestamp = Math.floor(Date.now() / 1000);
                    if(Math.abs(initializedAt + remainingAtInit - currentTimestamp - secondsLeft) > 5) {
                        secondsLeft = (initializedAt + remainingAtInit) - currentTimestamp;
                    }
                    updateTimer(--secondsLeft < 0 ? 0 : secondsLeft);

                    if(secondsLeft <= 0) {
                        clearInterval(interval);
                        location.reload();
                    }
                }, 1000);
            });

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

            function updateTimer(timeLeft, context) {
                var seconds = timeLeft%60,
                    minutes = Math.floor(timeLeft/60)%60,
                    hours = Math.floor(timeLeft/60/60)%24,
                    days = Math.floor(timeLeft/60/60/24);

                $('.time-left-seconds', context).text((seconds < 10 ? '0' : '') + seconds);
                $('.time-left-minutes', context).text((minutes < 10 ? '0' : '') + minutes);
                $('.time-left-hours', context).text((hours < 10 ? '0' : '') + hours);
                $('.time-left-days', context).text(days);
            }
        });
    </script>
@endpush
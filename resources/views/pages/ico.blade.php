@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list'])

@section('content')

    <div class="ico-page white-bkg">
        <div class="ico-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Welcome to<br> <b>BitDegree Crowdsale</b></h1>
                    </div>
                </div>
            </div>
            @include('partials.ico-progress')

        </div>

        <div class="main container-fluid ico-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center cwordsale-info">
                        @if($icoDataAvailable)
                            <h2>Crowdsale Address</h2>
                            @if($showAddress)
                                <code>{{ $icoAddress }}</code>
                            @else
                                <p><a href="#agreement-popup" class="btn btn-primary" data-toggle="modal" data-target="#signup-modal">View Crowdsale Address</a></p>
                            @endif
                        @else
                            <h2>Crowdsale information will be announced soon.</h2>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="grey-block">
                            <h2>Mist Ethereum Wallet</h2>
                            <p>You can <a href="https://github.com/ethereum/mist/releases" target="_blank" rel="nofollow noopener">download Mist here</a>.</p>
                            <ol>
                                <li>Open Mist and click on <strong>Send</strong> tab at the top</li>
                                <li>Select the account from which you want to transfer funds</li>
                                <li>Paste the crowdsale address @if($showAddress)<code>{{ $icoAddress }}</code> @endif as the destination</li>
                                <li>Enter the amount that you want to invest</li>
                                <li>Make sure Ether is selected as the currency</li>
                                <li>Scroll down and select the fee. The higher the fee, the less time it will take for the transaction to get mined.</li>
                                <li>Click on <strong>Send</strong></li>
                                <li>Under <strong>Provide maximum fee</strong> enter <strong>200000</strong></li>
                                <li>Review if everything is correct, type in your password and click on <strong>Send Transaction</strong></li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="grey-block">
                            <h2>MetaMask</h2>
                            <p>MetaMask is a plugin for <strong>Google Chrome</strong> browser. It can be downloaded an installed from <a href="https://metamask.io/" rel="nofollow noopener">metamask.io</a></p>
                            <ol>
                                <li>Open MetaMask by clicking on its logo that is located on the right of your address bar</li>
                                <li>Choose the account from which you want to make an investment</li>
                                <li>Click on <strong>Send</strong></li>
                                <li>Put BitDegree Crowdsale address @if($showAddress)<code>{{ $icoAddress }}</code> @endif as the <strong>Recipient</strong></li>
                                <li>Enter the amount of Ether that you would like to invest</li>
                                <li>Click on <strong>Next</strong></li>
                                <li>Enter <strong>200000</strong> for <strong>Gas Limit</strong></li>
                                <li>Review if everything is correct and click on <strong>Submit</strong></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="grey-block">
                            <h2>MyEtherWallet</h2>
                            <ol>
                                <li>Go to <a href="https://myetherwallet.com/" target="_blank" rel="nofollow noopener">myetherwallet.com</a></li>
                                <li>Make sure the URL is correct and <strong>MYETHERWALLET LLC [US]</strong> certificate is there</li>
                                <li>Authenticate your wallet and click on <strong>Send Ether & Tokens</strong></li>
                                <li>Enter BitDegree Crowdsale address @if($showAddress)<code>{{ $icoAddress }}</code> @endif into <strong>To Address</strong> field</li>
                                <li>Enter the amount of ether that you would like to invest into <strong>Amount to Send</strong> field</li>
                                <li>Make sure <strong>ETH</strong> is selected as the currency</li>
                                <li>Enter <strong>200000</strong> for <strong>Gas Limit</strong></li>
                                <li>Click on <strong>Generate Transaction</strong></li>
                                <li>Confirm by clicking on <strong>Send Transaction</strong></li>
                                <!--li>Click on <strong>Yes, I am sure! Make transaction</strong></li-->
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="grey-block">
                            <h2>Parity</h2>
                            <p>Parity can be downloaded from <a href="https://parity.io/" target="_blank" rel="nofollow noopener">parity.io</a></p>
                            <ol>
                                <li>Open Parity</li>
                                <li>Click on <strong>Accounts</strong> tab at the top of the screen</li>
                                <li>Click on an account from which you would like to make the investment</li>
                                <li>Click on <strong>Transfer</strong></li>
                                <li>Make sure <strong>Ethereum</strong> is selected as the token type</li>
                                <li>Enter BitDegree Crowdsale address @if($showAddress)<code>{{ $icoAddress }}</code> @endif as the <strong>recipient address</strong></li>
                                <li>Enter the <strong>amount to transfer</strong></li>
                                <li>Check the <strong>advanced sending options</strong> checkbox</li>
                                <li>Click on <strong>Next</strong></li>
                                <li>For <strong>gas</strong> enter <strong>200000</strong></li>
                                <li>Click on <strong>Send</strong></li>
                                <li>Enter your account password and click on <strong>Confirm Request</strong></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Participate in BitDegree ICO</h4>
                </div>
                <div class="modal-body" id="modal-agreements">
                    <div class="checkbox">
                        <label><input class="check-required" type="checkbox" name="checkbox"> Aggrement 1</label>
                    </div>
                    <div class="checkbox">
                        <label><input class="check-required" type="checkbox" name="checkbox"> Aggrement 2</label>
                    </div>
                    <div class="checkbox">
                        <label><input class="check-required" type="checkbox" name="checkbox"> Aggrement 3</label>
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
                                        @foreach($countries as $code => $country)
                                            <option value="{{ $code }}">{{ $country }}</option>
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
                                    <label for="input-wallet">Wallet Address</label>
                                    <input type="text" class="form-control" id="input-wallet" name="wallet">
                                    <span class="text-danger validation-error"></span>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">Participate in BitDegree ICO</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
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
                var interval = setInterval(function () {
                    var currentTimestamp = Math.floor(Date.now() / 1000);
                    if(Math.abs(initializedAt + remainingAtInit - currentTimestamp - secondsLeft) > 5) {
                        secondsLeft = (initializedAt + remainingAtInit) - currentTimestamp;
                    }
                    updateTimer(--secondsLeft < 0 ? 0 : secondsLeft);

                    if(secondsLeft <= 0) {
                        clearInterval(interval);
                    }
                }, 1000);
            });

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
@endsection
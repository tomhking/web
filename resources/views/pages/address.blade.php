@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens', 'hideFooter' => true])

@section('content')

    <div class="main">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="dashboard-logo">
                    <a href="{{ route_lang('home') }}" class="login-logo">
                        <img class="logo" src="{{ asset('bitdegree-logo.png') }}" alt="BitDegree">
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="content main">
                @if($participant->isProfileFull())
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Get tokens</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1 eth-address">
                            <div class="form-group">
                                <label for="input-address">Send ETH to this address:</label>
                                <input type="text" class="form-control" readonly value="{{ $icoAddress }}" onclick="this.setSelectionRange(0, this.value.length)" id="ico-address">
                                <p class="text-right" id="copy-address" style="display: none">
                                    <span class="text-success copied" style="display: none">Copied!</span>
                                    <a class="btn">Copy Address</a>
                                </p>
                            </div>
                            <div class="well">
                                <p>Please make sure to have a valid ERC20 compatible Ethereum address to receive your tokens. <b><span class="red">Do not use any exchange address!</span></b></p>
                                <p><b>Recommended Gas Limit: 200 000.</b> Payments without data or gas limit fields are rejeced.</p>
                                <p><strong>Do NOT send ETH from an exchange.</strong> Use MyEtherWallet, MetaMask, Mist, Parity or other compatible wallets.</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Personal Details</h1>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1 personal-details">
                            <form action="{{ route_lang('participant-profile') }}" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input-first-name">First Name</label>
                                            <input type="text" class="form-control" id="input-first-name" name="first_name"required minlength="2" maxlength="35" data-validate="name">
                                            <div class="text-danger validation">Please specify a valid first name.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-country">Country</label>
                                            <select name="country" id="input-country" class="form-control"required data-validate="country">
                                                <option value="">- please select -</option>
                                                @foreach($countries as $code => $country)
                                                    <option value="{{ $code }}" {{ in_array($code, $blacklistedCountries) ? "disabled" : "" }} {{ $currentCountry == $code && !in_array($code, $blacklistedCountries) ? "selected" : "" }}>{{ $country }}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger validation">Please select a country.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input-last-name">Last Name</label>
                                            <input type="text" class="form-control" id="input-last-name" name="last_name"required minlength="2" maxlength="35" data-validate="name">
                                            <div class="text-danger validation">Please specify a valid last name.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-birthday">Date of Birth</label>
                                            <input type="date" class="form-control" id="input-birthday" name="birthday" max="{{ \Carbon\Carbon::today()->subYears(16)->toDateString() }}" min="{{ \Carbon\Carbon::today()->subYears(100)->toDateString() }}"required data-validate="birthday">
                                            <span class="text-danger validation-error"></span><div class="text-danger validation">Please specify your date of birth.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-center agreement">By proceeding you agree to our <a href="#">Terms of Service</a></p>
                                        <div class="text-center cta"><button type="submit" class="btn btn-primary">Get Tokens</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('partials.validation')

@endsection

@push('body-scripts')
    <script>
        jqWait(function () {
            var copyContainer = $('#copy-address'), button = $('.btn', copyContainer), address = $('#ico-address'), message = $('.copied', copyContainer), handle;

            if(typeof document.execCommand === 'function') {
                copyContainer.show();
            }

            button.click(function () {
                address.select();
                document.execCommand('Copy');
                message.fadeIn();
                if(handle) clearTimeout(handle);
                handle = setTimeout(function () {
                    message.fadeOut();
                }, 2500);
            });
        })
    </script>
@endpush
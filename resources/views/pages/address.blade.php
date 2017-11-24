@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens', 'hideFooter' => true])

@section('content')




                        @if($participant->isProfileFull())
                            <div class="header container-fluid">
                                <div class="row-fluid">
                                    <div class="col-md-3">
                                        <div class="dashboard-logo">
                                            <a href="{{ route_lang('home') }}" class="login-logo">
                                                <img class="logo" src="{{ asset('bitdegree-logo.png') }}" alt="BitDegree">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-push-4 align-right">
                                        <div class="user-menu">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> Referral</a></li>
                                                <li><a href="#"> <img class="token" src="{{ asset('token-img.png') }}" alt="BitDegree Token"> Aidrop: <b>1BDG</b></a></li>
                                                <li><a href="#"><img class="ethereum" src="{{ asset('ethereum-icon.png') }}" alt="Ethereum"> Add your Wallet address</a></li>
                                                <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Account</a></li>
                                                <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid">
                                    <div class="col-sm-3 col-md-2 hidden-xs-down sidebar">
                                        <div class="main">
                                            <h4>How to participate?</h4>
                                            <ul class="sidebar-nav">
                                                <li><a href="#">Get tokens now</a></li>
                                                <li><a href="#">How to create Ethereum wallet?</a></li>
                                                <li><a href="#">How to get Ethereum?</a></li>
                                                <li><a href="#">How to transfer Ethereum?</a></li>
                                                <li><a href="https://www.bitdegree.org/en/token/faq">Bitdegree FAQ</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
                                        <div class="main">
                                            <div class="container">
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
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @else
                            <div class="main">
                                <div class="container-fluid">
                                    <div class="row-fluid">
                                        <div class="col-md-3">
                                            <div class="dashboard-logo">
                                                <a href="{{ route_lang('home') }}" class="login-logo">
                                                    <img class="logo" src="{{ asset('bitdegree-logo.png') }}" alt="BitDegree">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container-fluid">
                                    <div class="container main">
                                    <div class="content">
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
                                                                <input type="text" class="form-control" id="input-first-name" name="first_name" required minlength="2" maxlength="35" data-validate="name">
                                                                <div class="text-danger validation">Please specify a valid first name.</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input-email">Email</label>
                                                                <input type="email" data-validate="email" class="form-control" value="" name="email" placeholder="Your email" id="input-email" required>
                                                                <div class="text-danger validation">Email is not valid.</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input-country">Country of residence</label>
                                                                <select name="country" id="input-country" class="form-control" required data-validate="country">
                                                                    <option value="">- please select -</option>
                                                                    @foreach($countries as $code => $country)
                                                                        <option value="{{ $code }}" {{ in_array($code, $blacklistedCountries) ? "disabled" : "" }} {{ $currentCountry == $code && !in_array($code, $blacklistedCountries) ? "selected" : "" }}>{{ $country }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="text-danger validation">Please select a country.</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input-invest">How much are you planning to invest?</label>
                                                                <select name="invest" id="input-invest" class="form-control">
                                                                    <option value="">- please select -</option>
                                                                    <option value="More than 10">Less than 10 ETH</option>
                                                                    <option value="less than 10">More than 10 ETH</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="input-last-name">Last Name</label>
                                                                <input type="text" class="form-control" id="input-last-name" name="last_name" required minlength="2" maxlength="35" data-validate="name">
                                                                <div class="text-danger validation">Please specify a valid last name.</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input-password">Password</label>
                                                                <input class="form-control" type="password" name="psw">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input-birthday">Date of Birth</label>
                                                                <input type="date" class="form-control" id="input-birthday" name="birthday" max="{{ \Carbon\Carbon::today()->subYears(16)->toDateString() }}" min="{{ \Carbon\Carbon::today()->subYears(100)->toDateString() }}" required data-validate="birthday">
                                                                <span class="text-danger validation-error"></span><div class="text-danger validation">Please specify your date of birth.</div>
                                                            </div>
                                                            <div class="form-group upload">
                                                                <label for="input-upload">Please upload copy of your ID:</label>
                                                            <input type="file" name="" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="agreement col-md-6 col-md-push-3 text-center">
                                                            <input type="checkbox" id="agreeToTerms" name="subscribe" value="newsletter">
                                                            <label for="agreeToTerms">I hereby agree to Bitdegree Token Sale <a href="#">Terms of Service</a></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <div class="text-center cta"><button type="submit" class="btn btn-primary">Get Tokens</button></div>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endif


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
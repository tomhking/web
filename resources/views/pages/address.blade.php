@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list'])

@section('content')

    @if($participant->isProfileFull())
        <h1>Get Tokens</h1>
        <div class="form-group">
            <label for="input-address">Send ETH to this address:</label>
            <input type="text" class="form-control" readonly value="{{ $icoAddress }}">
            <p class="text-right copy">
                <a>Copy Address</a>
            </p>
        </div>
        <div class="well">
            <p>Please make sure to have a valid ERC20 compatible Ethereum address to receive your tokens. Do not use any exchange address!</p>
            <p>Recommended Gas Limit: 200 000. Payments without data or gas limit fields are rejeced.</p>
            <p><strong>Do NOT send ETH from an exchange.</strong> Use MyEtherWallet, MetaMask, Mist, Parity or other compatible wallets.</p>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <h1>Personal Details</h1>
            </div>
        </div>

        <form action="{{ route_lang('participant-profile') }}" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-first-name">First Name</label>
                        <input type="text" class="form-control" id="input-first-name" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="input-country">Country</label>
                        <select name="country" id="input-country" class="form-control">
                            <option value="">- please select -</option>
                            @foreach($countries as $code => $country)
                                <option value="{{ $code }}" {{ in_array($code, $blacklistedCountries) ? "disabled" : "" }} {{ $currentCountry == $code && !in_array($code, $blacklistedCountries) ? "selected" : "" }}>{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-last-name">Last Name</label>
                        <input type="text" class="form-control" id="input-last-name" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="input-birthday">Date of Birth</label>
                        <input type="date" class="form-control" id="input-birthday" name="birthday" max="{{ \Carbon\Carbon::today()->subYears(16)->toDateString() }}" min="{{ \Carbon\Carbon::today()->subYears(100)->toDateString() }}">
                        <span class="text-danger validation-error"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">By proceeding you agree to our <a href="#">Terms of Service</a></p>
                    <div class="text-center"><button type="submit" class="btn btn-primary">Get Tokens</button></div>
                </div>
            </div>
        </form>
    @endif


@endsection
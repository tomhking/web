@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        <div class="col-sm-3 col-md-2 hidden-xs-down sidebar">
            <h4>What's next?</h4>
            <ul class="sidebar-nav">
                <li class="step-done"><a href="#">Step 1</a></li>
                <li class="step-done"><a href="{{ route('address') }}">Step 2</a></li>
                <li class="step-active"><a href="{{ route('details') }}">Step 3</a></li>
            </ul>
        </div>

        <div class="col-sm-12  col-md-10 col-md-offset-2 pt-3 ">

            @include('partials.dashboard-tabs')

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                        <h1 class="text-center">Please fill your profile</h1>
                    </div>

                    <form action="{{ route('details') }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1 personal-details">
                                <div class="row">
                                    <div class="col-md-12">
                                        @include('partials.status')
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input-first-name">First Name</label>
                                            <input tabindex="1" type="text" class="form-control" id="input-first-name" name="first_name" required minlength="2" maxlength="35" value="{{ old('first_name', $user->first_name) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-country">Country of residence</label>
                                            <select tabindex="3" name="country" id="input-country" class="form-control" required>
                                                <option value="" disabled {{ empty(old('country', $user->country ?? $currentCountry)) ? "selected" : "" }}>- please select -</option>
                                                @foreach($countries as $code => $name)
                                                    <option value="{{ $code }}" {{ in_array($code, $blacklistedCountries) ? "disabled" : ( old('country', $user->country ?? $currentCountry) == $code ? "selected" : "" ) }}>{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-wallet">Your ETH wallet</label>
                                            <input tabindex="5" type="text" class="form-control" value="{{ old('wallet', $user->wallet) }}" name="wallet" id="input-wallet">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input-last-name">Last name</label>
                                            <input tabindex="2" type="text" class="form-control" id="input-last-name" name="last_name" required minlength="2" maxlength="35" value="{{ old('last_name', $user->last_name) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-birthday">Date of birth</label>
                                            <input tabindex="4" type="date" class="form-control" id="input-birthday" value="{{ old('birthday', $user->birthday) }}" name="birthday" max="{{ \Carbon\Carbon::today()->subYears(16)->toDateString() }}" min="{{ \Carbon\Carbon::today()->subYears(100)->toDateString() }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-kyc">I am planning to contribute:</label>
                                            <select tabindex="6" name="kyc" id="input-kyc" class="form-control" {{ $user->identification ? "disabled" : "" }}>
                                                @foreach([
                                                    -1 => '- please select -',
                                                    0 => 'Less than 1 ETH',
                                                    1 => '1 ETH or more',
                                                ] as $state => $name)
                                                    <option value="{{ $state }}" {{ old('kyc', $user->identification ? 1 : -1) == $state ? "selected" : "" }}>{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @if($user->identification)
                                    <h4>Identity verification</h4>
                                    <p>You have already submitted your identification.</p>
                                @else
                                    <div class="row" style="display: none;" id="kyc-upload">
                                        <div class="col-md-12">
                                            <h4>Identity verification</h4>
                                            <p>According to our Terms of Service, you need to upload a clear picture of yourself and your passport, driver's licence or national identity card if you want to contribute over 1 ETH.</p>
                                            <input type="file" name="file">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1 buttons">
                                <div class="content dashboard-buttons">
                                    <div class="left text-left">
                                        <a class="button-back" href="{{ route('address') }}">Back</a>
                                    </div>
                                    <div class="right text-right">
                                        <button tabindex="8" type="submit" class="btn btn-primary button-save">SAVE</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {!! csrf_field() !!}
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('body-scripts')
    @if(!$user->identification)
        <script>
            jqWait(function () {
                var previousKyc = localStorage.getItem('kyc-choice');
                if(previousKyc) $('#input-kyc').val(previousKyc);
                $('#input-kyc').change(function () {
                    var choice = parseInt($(this).val());
                    localStorage.setItem('kyc-choice', choice);
                    choice === 1 ? $('#kyc-upload').fadeIn() : $('#kyc-upload').hide();
                }).change();
            });
        </script>
    @endif
@endpush
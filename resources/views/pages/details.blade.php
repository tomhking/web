@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        <div class="col-sm-3 col-md-2 hidden-xs-down sidebar">
            <h4>What's next?</h4>
            <ul class="sidebar-nav">
                <li class="step-done"><a href="#">Step 1</a></li>
                <li class="step-done"><a href="#">Step 2</a></li>
                <li class="step-active"><a href="#">Step 3</a></li>
            </ul>
        </div>

        <div class="col-sm-12  col-md-10 col-md-offset-2 pt-3 ">

            @include('partials.dashboard-tabs')

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                        <h1 class="text-center">Please fill your profile</h1>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1 personal-details">
                            <form action="{{ route('details') }}" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input-first-name">First Name</label>
                                            <input type="text" class="form-control" id="input-first-name" name="first_name" required minlength="2" maxlength="35" data-validate="name">
                                            <div class="text-danger validation">Please specify a valid first name.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-country">Country of residence</label>
                                            <select name="country" id="input-country" class="form-control" required data-validate="country">
                                                <option value="">- please select -</option>
                                            </select>
                                            <div class="text-danger validation">Please select a country.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-email">ETH wallet address</label>
                                            <input type="email" data-validate="email" class="form-control" value="" name="email" id="input-eth-address" required>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input-last-name">Last name</label>
                                            <input type="text" class="form-control" id="input-last-name" name="last_name" required minlength="2" maxlength="35" data-validate="name">
                                            <div class="text-danger validation">Please specify a valid last name.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-birthday">Date of birth</label>
                                            <input type="date" class="form-control" id="input-birthday" name="birthday" max="{{ \Carbon\Carbon::today()->subYears(16)->toDateString() }}" min="{{ \Carbon\Carbon::today()->subYears(100)->toDateString() }}" required data-validate="birthday">
                                            <span class="text-danger validation-error"></span><div class="text-danger validation">Please specify your date of birth.</div>
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
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1 buttons">
                            <div class="content dashboard-buttons">
                                <div class="left text-left">
                                    <a class="button-back" href="">Back</a>
                                </div>
                                <div class="right text-right">
                                    <div class="cta">
                                        <a href="" type="submit" class="btn btn-primary button-save">SAVE</a></div>
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


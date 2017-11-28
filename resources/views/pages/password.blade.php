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
                        <h1 class="text-center">Change your password</h1>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1 change-password">
                            @include('partials.status')
                            <form action="{{ route('password') }}" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <label for="input-password">New Password</label>
                                            <input type="password" class="form-control" id="input-password" name="password" required minlength="3">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-password-confirmation">Confirm New Password</label>
                                            <input type="password" class="form-control" id="input-password-confirmation" name="password_confirmation" required minlength="3">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center buttons">
                                    <button class="btn btn-default">Save Changes</button>
                                </div>
                                {!! csrf_field() !!}
                            </form>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>


@endsection


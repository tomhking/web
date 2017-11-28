@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in instructions', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        @include('partials.instructions-menu')

        <div class="col-sm-12  col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h1 class="text-center">ALTERNATIVE WAYS TO GET TOKENS</h1>
                            <p class="subtitle">If you choose to get your tokens from the BitDegree website, they will be transferred to you instantly after you make a purchase.</p>
                            <p>During the crowdsale, you will be able to get tokens by using https://www.tokenlot.com/ (exact link will be provided soon).</p>
                            <p>Tokenlot accepts all other digital currencies. If you choose to use Tokenlot, <b>your tokens will reach you after the crowdsale ends.</b> You will receive an email with detailed instructions. The email will be sent to the same email address that was originally used to purchase the tokens. To receive BDG tokens instantly we really recommend to join BitDegree crowdsale via official website.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection


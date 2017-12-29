@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens refund logged-in', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        <div class="col-sm-12 col-md-8 col-md-offset-2 ">

            <div class="main container-main">
                <div class="container">

                    <div class="row">
                        <div class="col-xs-12 col-md-12 text-center">
                            <h1>REFUNDING</h1>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">

                            <p>BDG token — is a utility token that will be used in the operation cycles of the learning platform and will represent future access to a platform’s products and services.</p>

                            <p><a style="color: #ffbcbc; font-weight:bold;" href="https://blog.bitdegree.org/bank-of-lithuania-confirms-bitdegree-token-and-model-of-operation-is-fully-within-legal-frameworks-ad0cb8e335c2">BitDegree is fully compliant with law</a> and wants to focus on project only, without taking any risks or putting contributors into it, which can affect the success of the whole blockchain based learning platform. It has received confirmation from Bank of Lithuania, acting under maintenance of European Central Bank, that token and model of operation is fully within legal frameworks.</p>

                            <p>Taking into account latest legal practice in United States regarding securities & non-securities starting from middle of December 2017, questions related with tokens and causing uncertainty, BitDegree voluntarily decided to avoid any possible legal risks, including minimal or hypothetical, and to stop NEW contributions from United States residents, citizens, green card holders and taxpayers at BitDegree’s crowdsale.</p>

                            <p>For existing US contributors, BitDegree will provide the full possibility to continue with the BDG tokens and the platform. If after our e-mail you feel that you no longer want to participate in the future development of the platform as a contributor, you can choose to file for a refund after the crowdsale until 31th January, 2018. This is our goodwill and your voluntary choice.</p>

                            <p>US law (enforced by the SEC) with respect to ICOs is evolving and we are trying to mitigate any potential risk by offering an optional refund to US citizens or residents.</p>

                            <p><b>This is completely optional and you can see it as a proactive move on our part.</b></p>

                            <p><b>We’re building a blockchain-based learning platform as it was planned and the crowdsale continues getting it’s highs with no stops nor barriers!</b></p>

                            <p>We believe that BitDegree Learning Platform will succeed and revolutionize education from the base.</p>

                            <p>If you would still like to refund, check the box below.</p>

                            <div class="agreement">
                                <input tabindex="3" type="checkbox" id="agreeToTerms" name="agreement" {{ old('agreement', false) ? 'checked' : '' }} value="1">
                                <label for="agreeToTerms">Yes, I want to refund</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center login-cta signup-cta cta"><button tabindex="5" type="submit" class="btn btn-primary">SAVE</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

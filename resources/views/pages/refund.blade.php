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

                            <p>BDG token — is a utility token that will represent the future access to a learning platform’s services. BitDegree is fully compliant with law and wants to focus on project only, without taking any risks or putting contributors into it, which can affect the success of the whole blockchain based learning platform. It has <a style="color: #ffbcbc; font-weight:bold;" href="https://blog.bitdegree.org/bank-of-lithuania-confirms-bitdegree-token-and-model-of-operation-is-fully-within-legal-frameworks-ad0cb8e335c2">received confirmation</a> from Bank of Lithuania, acting under maintenance of European Central Bank, that token and model of operation is fully within legal frameworks.</p>

                            <p>As you may already know, taking into account newest legal practice in United States regarding securities & non-securities starting from middle of December 2017, questions related with tokens and causing uncertainty, BitDegree voluntarily decided to avoid any possible legal risks, including minimal or hypothetical, and to stop new contributions from United States residents, citizens, green card holders and taxpayers at BitDegree’s crowdsale.</p>

                            <p>According to above, residents of the United States participated in Bitdegree’s crowdsale will have an ability to be voluntarily refunded until 31th January, 2018, if they wish so.</p>

                            <p>Before taking decision regarding your possibility to refund please kindly be informed, that:</p>

                            <p><b>(i) BitDegree token is a utility token that will be used in the operation cycles of the learning platform and will represent future access to a platform’s products and services;</b></p>

                            <p><b>(ii) there is no real assumptions or probabilities to believe or assume, that BitDegree token’s value will rise or grow. So, you should not have any though, guesses or forecasts, that token’s value may or will grow or rise;</b></p>

                            <p><b>(iii) purchase of BitDegree tokens shall be based just on participation on the project, not on speculative or investments motives. Therefore, if you purchased BitDegree tokens in order receive any profit from that later, please use our refund program, because, as mentioned above, there is no assumptions to believe, that BitDegree token’s value will or may rise.</b></p>

                            <p>In case you decided to be refunded, you may follow below mentioned instructions: Starting from January 1, 2018, login into your BitDegree dashboard, go to refund section and follow provided instructions.</p>

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

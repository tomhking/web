@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in instructions instructions-faq', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        @include('partials.instructions-menu')

        <div class="col-sm-12  col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h1 class="text-center">FAQ</h1>
                            <p class="subtitle">For more detailed information, please visit the official: <a href="https://myetherwallet.github.io/knowledge-base/" target="_blank" rel="nofollow">MyEtherWallet's FAQ</a>.</p>

                            <div class="panel-group faq-block" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">

                                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#1" aria-expanded="false" aria-controls="1">
                                            <h3 class="panel-title">
                                                Why can’t I see my balances when I unlock my wallet?
                                            </h3>
                                        </div>
                                    </div>
                                    <div id="1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="1">
                                        <div class="panel-body">
                                            <p>This is most likely due to the fact that you are behind a firewall. It is common for the API that is used to display the balance to be blocked by firewalls. You will still be able to send transactions, but you will need to use a blockchain explorer, such as Etherscan , to view your balance.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">

                                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#2" aria-expanded="false" aria-controls="2">
                                            <h3 class="panel-title">
                                                Why can’t I see the account I have just created in the Blockchain explorer (e.g., Etherchain,Etherscan)?
                                            </h3>
                                        </div>
                                    </div>
                                    <div id="2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="2">
                                        <div class="panel-body">
                                            <p>Only active accounts are visible in a blockchain explorer. Once you have transferred some ETH into the account, it should be visible.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">

                                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#5" aria-expanded="false" aria-controls="5">
                                            <h3 class="panel-title">
                                                I am trying to unlock my wallet but it keeps freezing / hanging.
                                            </h3>
                                        </div>
                                    </div>
                                    <div id="5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="5">
                                        <div class="panel-body">
                                            <p>Decrypting the keystore files is an intensive process and takes longer in Javascript.<br> We recommend:</p>
                                              <ol>
                                                  <li>Using Google Chrome.</li>
                                                  <li>Clicking "Continue" when you see the unresponsive error alert pop up.</li>
                                                  <li>Closing other intensive programs open (e.g., a lot of browser tabs, video games, etc.).</li>
                                              </ol>
                                            <p>The combination of the above typically eliminates the problem. If it doesn't, please contact us and include your browser and OS and we can advise from there.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">

                                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#6" aria-expanded="false" aria-controls="6">
                                            <h3 class="panel-title">
                                                Transaction Failed - “Out of Gas”
                                            </h3>
                                        </div>
                                    </div>
                                    <div id="6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="6">
                                        <div class="panel-body">
                                            <p>Each transaction (including token and contract transactions) require gas which is paid in Ether. You can think of this like a transaction fee. The more computational effort a transaction takes, the more gas you need.</p>
                                            <p>MyEtherWallet estimates how much gas you will need - but sometimes it doesn't get it right.</p>
                                            <p><b>Solution: Try manually increasing the “Gas Limit”. First, try doubling the amount of gas that MyEtherWallet estimates, and sending again.</b> Any excess gas will be returned to you, so you could even triple or quadruple it.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">

                                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#7" aria-expanded="false" aria-controls="7">
                                            <h3 class="panel-title">
                                                How does MyEtherWallet actually work?
                                            </h3>
                                        </div>
                                    </div>
                                    <div id="7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="7">
                                        <div class="panel-body">
                                            <p>Please check <a href="https://myetherwallet.github.io/knowledge-base/getting-started/myetherwallet-help-and-quicktips.html" target="_blank" rel="nofollow">This page</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">

                                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#10" aria-expanded="false" aria-controls="10">
                                            <h3 class="panel-title">
                                                Where can I get more help?
                                            </h3>
                                        </div>
                                    </div>
                                    <div id="10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="10">
                                        <div class="panel-body">
                                            <p>Twitter: @bitdegree_org<br>
                                                Facebook: <a href="https://www.facebook.com/bitdegree" target="_blank" rel="nofollow">https://www.facebook.com/bitdegree</a><br>
                                                Telegram: <a href="https://t.me/bitdegree" target="_blank" rel="nofollow">https://t.me/bitdegree</a><br>
                                                Reddit: r/BitDegree/<br>
                                                Blog: <a href="https://blog.bitdegree.org" target="_blank" rel="nofollow">https://blog.bitdegree.org</a></p>
                                        </div>
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


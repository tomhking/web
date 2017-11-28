@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in instructions', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        @include('partials.instructions-menu')

        <div class="col-sm-12  col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                            <div class="col-xs-12 col-md-12">
                            <h1 class="text-center">How to create an ether wallet</h1>
                            <p class="subtitle">First of all you need to have an Ether wallet. Creating an ether wallet is a must in order to participate in the crowdsale and receive your tokens.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div id="accordion" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <div class="instructions-button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h3>MyEtherWallet [RECOMMENDED]</h3>
                                        </div>
                                    </div>

                                    <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <h4><b>Step 1:</b> Go to <a href="https://www.myetherwallet.com/" target="_blank" rel="nofollow">https://www.myetherwallet.com/</a> and make sure the URL is correct and MYETHERWALLET LLC [US] certificate is there.</h4>
                                            <img src="{{ asset_rev('instructions/myetherwallet-1.png') }}" alt="Myetherwallet">

                                            <h4><b>Step 2:</b> Go to the “New Wallet” Tab.</h4>
                                            <img src="{{ asset_rev('instructions/myetherwallet-2.png') }}" alt="Myetherwallet">

                                            <h4><b>Step 3:</b> Enter a Strong Password.</h4>
                                            <img src="{{ asset_rev('instructions/myetherwallet-3.png') }}" alt="Myetherwallet">
                                            <p>Enter a password that will be used to access your wallet:</p>
                                            <p>1. Create a strong password, using upper and lower-case letters, and also numbers and symbols (e.g., “#”, “@”, etc.).</p>
                                            <p>2. Do not lose this password. Losing this password is equivalent to losing all ETH and BDG stored in your account. Click on the <b>Create New Wallet</b> button.</p>

                                            <h4><b>Step 4:</b> Save Your Keystore File.</h4>
                                            <img src="{{ asset_rev('instructions/myetherwallet-4.png') }}" alt="Myetherwallet">
                                            <p>This file contains your private and public keys and is required every time you want to access your account.</p>
                                            <p class="instructions-note"><span><b>NOTE:</b></span> you won’t be able to access your account without this file and the password from the previous step. Losing either one of them is equivalent to losing all ETH and BDG stored in your account.</p>

                                            <h4><b>Step 5 (optional):</b> Backup Your Private Key.</h4>
                                            <img src="{{ asset_rev('instructions/myetherwallet-5.png') }}" alt="Myetherwallet">
                                            <p>If you would like to make this account accessible by other Ethereum wallets, you can export and backup your private key.</p>
                                            <p class="instructions-note"><span><b>NOTE:</b></span>You should never share your private keys with anyone else. If your wallet address is the equivalent of your bank account number, then your private wallet key is your PIN. If anyone obtains your private key, they will have access to all of your funds.</p>

                                            <h4><b>Step 6:</b> Unlock Your Wallet to View the Public Address.</h4>
                                            <img src="{{ asset_rev('instructions/myetherwallet-6.png') }}" alt="Myetherwallet">
                                            <p>Follow the instructions to unlock your wallet and get your public address:</p>
                                                <ul>
                                                    <li>Select the Keystore File (UTC / JSON) and select the keystore file you’ve downloaded in the previous step.</li>
                                                    <li>Input the password you set on step 3 and click on the Unlock button to unlock it.</li>
                                                </ul>

                                            <h4><b>Step 7:</b> Save Your Public Address</h4>
                                            <p>Now that you have created the wallet you should now be able to see your Ethereum public address under the Your Address label or the Account Address section.</p>
                                            <img src="{{ asset_rev('instructions/myetherwallet-7.png') }}" alt="Myetherwallet">
                                            <p class="instructions-note"><span><b>NOTE:</b></span>
                                                You will need to provide this public address during your registration for the BitDegree token sale.<br>
                                                You will need to provide this public address to transfer ETH to your wallet.<br>
                                                Do not lose your password and the keystore file, as you will need to use them in the BitDegree token sale.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <div class="instructions-button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <h3>ALTERNATIVE OPTION 1: MetaMask</h3>
                                        </div>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>MetaMask is a plugin for Google Chrome browser. It can be downloaded and installed from metamask.io</p>

                                            <h4><b>Step 1:</b> Go to <a href="https://metamask.io" target="_blank" rel="nofollow">https://metamask.io</a> and click on <b>GET CHROME EXTENSION.</b></h4>
                                            <img src="{{ asset_rev('instructions/metamask-1.png') }}" alt="Metamask">

                                            <h4><b>Step 2:</b> Chrome web store will open in a new tab. Click on <b>Add Extension</b></h4>
                                            <img src="{{ asset_rev('instructions/metamask-2.png') }}" alt="Metamask">

                                            <h4><b>Step 3:</b>  Click on <b>+ADD TO CHROME</b></h4>
                                            <img src="{{ asset_rev('instructions/metamask-3.png') }}" alt="Metamask">

                                            <h4><b>Step 4:</b> Read the Terms of Use and click on <b>Accept.</b></h4>
                                            <img src="{{ asset_rev('instructions/metamask-4.png') }}" alt="Metamask">

                                            <h4><b>Step 5:</b> Enter a secure password twice and click on <b>CREATE.</b></h4>
                                            <img src="{{ asset_rev('instructions/metamask-5.png') }}" alt="Metamask">

                                            <h4><b>Step 6:</b> Copy the words that appeared on your screen and save them somewhere safe. Then click on <b>I’ve copied it somewhere safe.</b></h4>
                                            <img src="{{ asset_rev('instructions/metamask-6.png') }}" alt="Metamask">

                                            <h4><b>Step 7:</b> A wallet named <b>Account 1</b> will be created for you by default.</h4>
                                            <img src="{{ asset_rev('instructions/metamask-7.png') }}" alt="Metamask">

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <div class="instructions-button" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                            <h3>ALTERNATIVE OPTION 2: MIST</h3>
                                        </div>
                                    </div>
                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">

                                            <h4><b>Step 1:</b> Download the latest Mist release here <a href="https://github.com/ethereum/mist/releases" target="_blank" rel="nofollow">https://github.com/ethereum/mist/releases</a>. For this tutorial we are using Ethereum Mist for Mac OS.</h4>
                                            <img src="{{ asset_rev('instructions/mist-1.png') }}" alt="Mist">

                                            <h4><b>Step 2:</b> Click <b>USE THE MAIN NETWORK</b></h4>
                                            <img src="{{ asset_rev('instructions/mist-2.png') }}" alt="Mist">

                                            <h4><b>Step 3:</b> Click <b>SKIP</b> on “Do you have wallet file”</h4>
                                            <img src="{{ asset_rev('instructions/mist-3.png') }}" alt="Mist">

                                            <h4><b>Step 4:</b> Pick a secure password and enter it twice</h4>
                                            <img src="{{ asset_rev('instructions/mist-4.png') }}" alt="Mist">

                                            <h4><b>Step 5:</b> Your Main Account address is here. Be sure to write it down.</h4>
                                            <img src="{{ asset_rev('instructions/mist-5.png') }}" alt="Mist">

                                            <h4><b>Step 6:</b> Click <b>NEXT</b> and wait for download.</h4>

                                            <h4><b>Step 7:</b> Here is the account overview screen you will see once the download is complete, you can use <b>SEND</b> to send Ether. To receive the ether from other party, simply share the address from <b>Step 5.</b></h4>
                                            <img src="{{ asset_rev('instructions/mist-6.png') }}" alt="Mist">

                                            <p class="instructions-note"><span><b>NOTE:</b></span> You will need to provide this public address during your registration for the BitDegree token sale.<br>
                                                You will need to provide this public address to transfer ETH to your wallet.<br>
                                                Do not lose your password and the keystore file, as you will need to use them in the BitDegree token sale.</p>
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


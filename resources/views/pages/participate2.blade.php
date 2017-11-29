@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in instructions', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        @include('partials.instructions-menu')

        <div class="col-sm-12  col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                            <div class="col-xs-12 col-md-12">
                            <h1 class="text-center">GETTING ETH AND TRANSFERRING<br> IT TO YOUR WALLET</h1>
                            <p class="subtitle">There are a few ways to get Ether. We suggest using one of the following:<br>
                                -Purchasing by bank transfer,<br>
                                -Purchasing by Credit Card,<br>
                                -Exchanging Bitcoin or other cryptocurrency.<br>
                                We suggest using Cex.io or Kraken.com as their interface is really easy-to-use.<br>
                                <b>NOTE:</b> Kraken.com does not accept transfers from Credit Card.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div id="accordion" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <div class="instructions-button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h3>OPTION 1: Kraken.com (pay with bank transfer or crypto)</h3>
                                        </div>
                                    </div>

                                    <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <h3>PART 1 — Getting ETH</h3>

                                            <h4><b>Step 1:</b> Create an account by entering your email, selecting a username and a secure password. Click on the black sign up box in the right corner:</h4>
                                            <img src="{{ asset_rev('instructions/kraken-1.png') }}" alt="Kraken">

                                            <h4><b>Step 2:</b> You’ll receive an email confirmation letter. Once your account is confirmed log in. Your screen should look similar to this:</h4>
                                            <img src="{{ asset_rev('instructions/kraken-2.png') }}" alt="Kraken">

                                            <h4><b>Step 3:</b> Now you must verify your personal information. You can do that by clicking on <b>Get verified.</b></h4>
                                            <img src="{{ asset_rev('instructions/kraken-3.png') }}" alt="Kraken">

                                            <h4><b>Step 4:</b> Select the applicable Tier and verify your identity. It usually takes up to 2–3 days.</h4>
                                            <img src="{{ asset_rev('instructions/kraken-4.png') }}" alt="Kraken">

                                            <h4><b>Step 5:</b> Once your account is verified, go to the <b>Funding</b> tab. Select your funding method from the left side and deposit the desired amount of selected currency.</h4>
                                            <img src="{{ asset_rev('instructions/kraken-5.png') }}" alt="Kraken">

                                            <h4><b>Step 6:</b> Once your account is funded, select <b>Trade</b> and <b>New Order</b> to place orders. Note that the currency pair you select plays a role in determining what is bought. Select the <b>BUY</b> button and choose a currency pair x/y, then currency x will be bought and currency y sold..</h4>
                                            <img src="{{ asset_rev('instructions/kraken-6.jpeg') }}" alt="Kraken">

                                            <h4><b>Step 7:</b> Enter the desired amount and press <b>Buy x with y.</b></h4>

                                            <div class="row">
                                                <div class="col-xs-12 col-md-12">
                                                    <h3>PART 2 — Transferring ETH to your wallet</h3>
                                                    <div class="well">
                                                        <p><b><span class="red">Do NOT send Ether from an exchange.</span></b> Use MyEtherWallet (recommended), MetaMask, Mist wallets, or other ERC20 compatible ones.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4><b>Step 1:</b> Login to your account and go to <b>Funding</b> tab. Select <b>Withdraw</b>. Press on <b>Ether (ETH).</b></h4>
                                            <img src="{{ asset_rev('instructions/kraken-7.png') }}" alt="Kraken">

                                            <h4><b>Step 2:</b> Click on <b>+Add address</b>. Add a description and your Ether wallet address. Save it and click the <b>Back</b> button.</h4>
                                            <img src="{{ asset_rev('instructions/kraken-8.png') }}" alt="Kraken">

                                            <h4><b>Step 3:</b> Select the address you just created from the dropdown. Enter the amount. <b>→Review Withdrawal → Confirm Withdrawal.</b></h4>
                                            <p>Once the <b>Initiated</b> status changes to Success you can access your Ether wallet and see the balance.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <div class="instructions-button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <h3>Alternative OPTION 2: Cex.io (pay with credit/debit cards, bank transfer or crypto)</h3>
                                        </div>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>In this tutorial we will show how to exchange money from your credit/debit card. Making a bank transfer or exchanging a cryptocurrency process is similar.</p>

                                            <h3>PART 1 — Getting ETH</h3>

                                            <h4><b>Step 1:</b> Go to <a href="https://cex.io/" target="_blank" rel="nofollow">Cex.io</a> and press <b>REGISTER</b></h4>
                                            <img src="{{ asset_rev('instructions/cex-1.png') }}" alt="Cex">

                                            <h4><b>Step 2:</b> Sign up with your email and choose a secure password. You can use an alternative way from the column on the right:</h4>
                                            <img src="{{ asset_rev('instructions/cex-2.png') }}" alt="Cex">

                                            <h4><b>Step 3:</b> Select 2-step verification method to increase security.</h4>
                                            <img src="{{ asset_rev('instructions/cex-3.png') }}" alt="Cex">

                                            <h4><b>Step 4:</b> Confirm your email.</h4>

                                            <h4><b>Step 5:</b> Once you confirm your email you should see a screen similar to this one. Select <b>DEPOSIT.</b></h4>
                                            <img src="{{ asset_rev('instructions/cex-4.png') }}" alt="Cex">

                                            <h4><b>Step 6:</b>  Select Payment card and press <b>Add a new card</b></h4>
                                            <img src="{{ asset_rev('instructions/cex-5.png') }}" alt="Cex">

                                            <h4><b>Step 7:</b> Enter your card details, take two selfies as described in the instructions. Enter the CVV of your card and get it verified.</h4>

                                            <h4><b>Step 8:</b> Once you verify your card go to <b>BUY/SELL</b>. Select ETH and the currency of your card. Choose an amount from the list or enter a custom one and press <b>BUY.</b></h4>
                                            <img src="{{ asset_rev('instructions/cex-6.png') }}" alt="Cex">
                                            <p class="instructions-note"><span><b>NOTE:</b></span> The fee on Deposit and Withdrawal varies for various Debit/Credit card as well as the fiat currency. Make sure that you go through the <a href="https://cex.io/fee-schedule#/tab/payments" target="_blank" rel="nofollow">fee structure</a> prior to making the final payment.</p>

                                            <h3>PART 2 — Transfer ETH to your wallet</h3>


                                            <h4><b>Step 1:</b> Log in to your account and select <b>WITHDRAW</b></h4>
                                            <img src="{{ asset_rev('instructions/cex-7.png') }}" alt="Cex">


                                            <h4><b>Step 2:</b> Select ETH from the drop down menu and enter the desired amount.</h4>
                                            <img src="{{ asset_rev('instructions/cex-8.png') }}" alt="Cex">

                                            <h4><b>Step 3:</b> Add your Ethereum wallet address and transfer ETH to your wallet.</h4>
                                            <p>Access your Ether wallet and see the balance. Note that transactions may take some time.</p>

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


@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list'])

@section('content')
    <div id="faqs" class="main faqs faq-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="title">FAQs</h2>
                </div>
            </div>


            <h4 class="title">Basics</h4>

            <div class="panel-group faq-block" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h3 class="panel-title">
                                What is BitDegree?
                            </h3>
                        </div>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <p>BitDegree is the world's first blockchain-powered, smart-incentives based online education platform which will revolutionize global education and tech recruiting. BitDegree shall directly align the incentives of students and anyone who wants them to become digitally smarter - like current or potential employers, digital service providers and sponsors.</p>
                            <p>BitDegree is an educational platform for everyone who is willing to study and get IT job.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h3 class="panel-title">
                                How different are you compared to Coursera?
                            </h3>
                        </div>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <p>BitDegree will be highest quality IT courses website similar as Coursera. The difference is smart-contract based rewards for students learning on platform. In short it means students in addition getting direct benefits for learning on BitDegree platform, which leads to higher education level and lower barrier to enter job marketplace. Please read our whitepaper how does this work in details.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h3 class="panel-title">
                                How much will it cost to study on BitDegree?
                            </h3>
                        </div>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <p>For the first 2 years all courses on BitDegree will be free to attract as much students as possible. User growth pool will be used to incentivize this traction. In the future depending on business environment premium courses may be offered.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                            <h3 class="panel-title">
                                What courses will be available on BitDegree?
                            </h3>
                        </div>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body">
                            <p>All courses on BitDegree platform will be IT oriented. Highest quality courses created by best tutors available.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFive">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                            <h3 class="panel-title">
                                Why this project needs Blockchain technology?
                            </h3>
                        </div>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                        <div class="panel-body">
                            <p>Blockchain will put BitDegree online education platform ahead of competition. By enabling us to introduce smart incentives and record students achievements in blockchain. Rewards earned on platform will be exchangeable into digital goods on third party service providers.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingSix">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                            <h3 class="panel-title">
                                What achievement data will be stored in blockchain?
                            </h3>
                        </div>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                        <div class="panel-body">
                            <p>Students will be able to choose which data will be stored on blockchain. What courses he had passed.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingSeven">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                            <h3 class="panel-title">
                                How can I hide my achievement data on blockchain?
                            </h3>
                        </div>
                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                        <div class="panel-body">
                            <p>Once student have chosen that his data is stored on blockchain, it can not be removed afterwards.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingEight">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                            <h3 class="panel-title">
                                How BitDegree will ensure that student learned a course online?
                            </h3>
                        </div>
                    </div>
                    <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                        <div class="panel-body">
                            <p>Students are incentivized to do peer-review process for assignments. Course tutor BitDegree token is received for each peer-review students submit. Proof of effort verification process is defined in our whitepaper.</a></p>
                        </div>
                    </div>
                </div>

            </div>

            <br>
            <h4 class="title">Company</h4>

            <div class="panel-group faq-block" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#1" aria-expanded="true" aria-controls="1">
                            <h3 class="panel-title">
                                Is BitDegree.org hiring?
                            </h3>
                        </div>
                    </div>
                    <div id="1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>We are actively seeking individuals who share our vision for the future of edu-tech, and the education in general. Applicants are encouraged to apply directly―not by means of a recruiter or other representation. Submit application to hello+jobs@bitdegree.org</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#2" aria-expanded="false" aria-controls="2">
                            <h3 class="panel-title">
                                What is the roadmap?
                            </h3>
                        </div>
                    </div>
                    <div id="2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="2">
                        <div class="panel-body">
                            <p>The BitDegree Roadmap is available <a href="index.html#roadmap">here</a>.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#3" aria-expanded="false" aria-controls="3">
                            <h3 class="panel-title">
                                How can authors apply to become part of BitDegree.org platform to start creating courses?
                            </h3>
                        </div>
                    </div>
                    <div id="3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="3">
                        <div class="panel-body">
                            <p>Yes. Please send us an email to hello+jobs@bitdegree.org</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#4" aria-expanded="true" aria-controls="4">
                            <h3 class="panel-title">
                                When will students in the BitDegree.org platform be available to opt-in?
                            </h3>
                        </div>
                    </div>
                    <div id="4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="4">
                        <div class="panel-body">
                            <p>Please check our roadmap <a href="index.html#roadmap">here</a>.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#5" aria-expanded="true" aria-controls="5">
                            <h3 class="panel-title">
                                How many users does the BitDegree.org have?
                            </h3>
                        </div>
                    </div>
                    <div id="5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="5">
                        <div class="panel-body">
                            <p>We have partnered with Hostinger International  and 000webhost and we will start promoting BitDegree services to more than 29 million 000webhost & Hostinger users.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#6" aria-expanded="true" aria-controls="6">
                            <h3 class="panel-title">
                                Your partner is 000webhost. It was hacked. How can I trust You?
                            </h3>
                        </div>
                    </div>
                    <div id="6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="6">
                        <div class="panel-body">
                            <p>000webhost has a dedicated page explaining what had happened and how company solved security issues <a href="https://www.000webhost.com/000webhost-database-hacked-data-leaked">here</a>.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#7" aria-expanded="true" aria-controls="7">
                            <h3 class="panel-title">
                                How do I report a security issue?
                            </h3>
                        </div>
                    </div>
                    <div id="7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="7">
                        <div class="panel-body">
                            <p>Please send us an email to hello@bitdegree.org</p>
                        </div>
                    </div>
                </div>

            </div>

            <br>
            <h4 class="title">Token Sale</h4>

            <div class="panel-group faq-block" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#8" aria-expanded="true" aria-controls="8">
                            <h3 class="panel-title">
                                When does the ICO  start?
                            </h3>
                        </div>
                    </div>
                    <div id="8" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Crowdsale starting date will be published on this website soon.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#9" aria-expanded="false" aria-controls="9">
                            <h3 class="panel-title">
                                What is BitDegree Token?
                            </h3>
                        </div>
                    </div>
                    <div id="9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="9">
                        <div class="panel-body">
                            <p>BitDegree will revolutionize education by creating a new ERC20 token built on top of Ethereum.  BitDegree token as a payment measure can be exchanged among users of the platform: Students, Sponsors, and third party Digital Service Providers.</p>
                            <p>Our token can be used to create smart-incentives for educational accomplishments, to purchase advertising and recruitment services, and various other digital services offered by third parties on the BitDegree platform.</p>
                            <p>Sponsors are the main fuel for a sustainable BitDegree economy. The economic incentive for Sponsors to buy BitDegree tokens is to enhance employer branding and recruitment of tech talent. The demand of BitDegree Token is closely aligned with the gargantuan $200 billion recruitment industry. Due to limited supply, the demand for BitDegree platform’s services will drive the token price up.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#10" aria-expanded="false" aria-controls="10">
                            <h3 class="panel-title">
                                How to participate in ICO?
                            </h3>
                        </div>
                    </div>
                    <div id="10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="10">
                        <div class="panel-body">
                            <p>We will provide more information in this website on how to participate in the ICO once the crowdsale date approaches. Stay tuned! Subscribe to our newsletter.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#11" aria-expanded="true" aria-controls="11">
                            <h3 class="panel-title">
                                How can you ensure, that you will continue to work after your token sale?
                            </h3>
                        </div>
                    </div>
                    <div id="11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="11">
                        <div class="panel-body">
                            <p>The token sale is not BitDegree goal itself. It is only one of the ways to accumulate funds for building a company. Raising money though ICO does not equal to value creating. True value and biggest return for all the shareholders, stakeholders, contributors and investors comes when the global company is being build with the raised funds.</p>
                            <p>The core Bitdegree team members are acting actively in IT business since 2004. We are bootstrapped, profitable and proud. We have vision to change the global education to better and ICO is just a starting point.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#12" aria-expanded="true" aria-controls="12">
                            <h3 class="panel-title">
                                Are Tokens transferable? Where are Tokens traded?
                            </h3>
                        </div>
                    </div>
                    <div id="12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="12">
                        <div class="panel-body">
                            <p>We expect to be listed on all major exchanges about a month after the crowdsale ends.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#13" aria-expanded="true" aria-controls="13">
                            <h3 class="panel-title">
                                What do Tokens represent?
                            </h3>
                        </div>
                    </div>
                    <div id="13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="13">
                        <div class="panel-body">
                            <p>Think of a token as mini voucher that can be exchanged to services on many digital service providers. Hostinger is the first one who accepts BitDegree token as one of the payments.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#14" aria-expanded="true" aria-controls="14">
                            <h3 class="panel-title">
                                Which wallets can be used to store Token?
                            </h3>
                        </div>
                    </div>
                    <div id="14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="14">
                        <div class="panel-body">
                            <p>BitDegree Token is an ERC20 token, and can be stored in ERC20 compatible wallets. We do not recommend a particular product, but official <a href="https://ethereum.org/">Ethereum wallet Mist</a> and <a href="https://www.myetherwallet.com/">MyEtherWallet</a> are most common.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#15" aria-expanded="true" aria-controls="15">
                            <h3 class="panel-title">
                                What crypto-currencies were accepted during the sale?
                            </h3>
                        </div>
                    </div>
                    <div id="15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="15">
                        <div class="panel-body">
                            <p>Only Ethereum (ETH) will be accepted during a sale.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#16" aria-expanded="true" aria-controls="16">
                            <h3 class="panel-title">
                                What is the distribution of tokens?
                            </h3>
                        </div>
                    </div>
                    <div id="16" class="panel-collapse collapse" role="tabpanel" aria-labelledby="16">
                        <div class="panel-body">
                            <p>Distribution of tokens is provided <a href="https://www.bitdegree.org/token/#distribution">in this section</a> of the website.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#17" aria-expanded="true" aria-controls="17">
                            <h3 class="panel-title">
                                Is there a pre-sale or whitelist?
                            </h3>
                        </div>
                    </div>
                    <div id="17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="17">
                        <div class="panel-body">
                            <p>There is no pre-sale or whitelist.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#18" aria-expanded="true" aria-controls="18">
                            <h3 class="panel-title">
                                What is the Tokens smart contract address?
                            </h3>
                        </div>
                    </div>
                    <div id="18" class="panel-collapse collapse" role="tabpanel" aria-labelledby="18">
                        <div class="panel-body">
                            <p>Will be published on website bitdegree.org 48hrs before crowdsale launch date.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#19" aria-expanded="true" aria-controls="19">
                            <h3 class="panel-title">How will the user growth pool be used? What is the Tokens smart contract address?
                            </h3>
                        </div>
                    </div>
                    <div id="19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="19">
                        <div class="panel-body">
                            <p>User growth fund is used to incentivize users to participate in the BitDegree ecosystem.</p>
                            <ul>
                                <li>A 300 million endowment is for early Students of BitDegree platform.</li>
                                <li>No new tokens will be created once the user growth pool is exhausted.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#20" aria-expanded="true" aria-controls="20">
                            <h3 class="panel-title">
                                Does the recent SEC bulletin affect Token?
                            </h3>
                        </div>
                    </div>
                    <div id="20" class="panel-collapse collapse" role="tabpanel" aria-labelledby="20">
                        <div class="panel-body">
                            <p>SEC jurisdiction lies in the United States federal government and as they personally state only affects ICOs that are issuing tokens in the United States or for the citizens of the US. As we won't issue tokens through the US and will not let the US citizens or green card holders to participate in ICO. Moreover Bitdegree Token will be more like payment measure and not the security and therefore are not under the scope of SEC’s jurisdictions.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#21" aria-expanded="true" aria-controls="21">
                            <h3 class="panel-title">
                                What kind of information do I need to provide to participate in ICO?
                            </h3>
                        </div>
                    </div>
                    <div id="21" class="panel-collapse collapse" role="tabpanel" aria-labelledby="21">
                        <div class="panel-body">
                            <p>Your name, last name, email, phone number, country of residence, date of birth and your public wallet address.</p>
                        </div>
                    </div>
                </div>

            </div>

            <br>
            <h4 class="title">Sponsoring</h4>
            <div class="panel-group faq-block" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#22" aria-expanded="true" aria-controls="22">
                            <h3 class="panel-title">
                                How can a company become a Sponsor?
                            </h3>
                        </div>
                    </div>
                    <div id="22" class="panel-collapse collapse" role="tabpanel" aria-labelledby="22">
                        <div class="panel-body">
                            <p>Please send us an email to hello@bitdegree.org</p>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

    @include('partials.subscribe-bottom')

@endsection
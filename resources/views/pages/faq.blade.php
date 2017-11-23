@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list'])

@section('content')
    <div class="faq-token-info">
    @include('partials.landing.token-facts')
    </div>

    <div id="faqs" class="main faqs faq-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="title">FAQs</h2>
                </div>
            </div>


            <h4 class="title">Bitdegree</h4>

            <div class="panel-group faq-block" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#1" aria-expanded="false" aria-controls="1">
                            <h3 class="panel-title">
                                What is BitDegree?
                            </h3>
                        </div>
                    </div>
                    <div id="1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="1">
                        <div class="panel-body">
                            <p>We are kick-starting a new education platform for everyone around the globe.</p>
                            <p>BitDegree is the world's first blockchain-powered, smart-incentives based online education platform which will revolutionize global education and tech recruiting. BitDegree shall directly align the incentives of students and anyone who wants them to become digitally smarter - like current or potential employers, digital service providers and sponsors.</p>
                            <p>BitDegree is an educational platform for everyone who is willing to study and get IT job.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#2" aria-expanded="false" aria-controls="2">
                            <h3 class="panel-title">
                                How different are you compared to Coursera?
                            </h3>
                        </div>
                    </div>
                    <div id="2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="2">
                        <div class="panel-body">
                            <p>BitDegree will be highest quality IT courses website similar as Coursera. The difference is smart-contract based rewards for students learning on platform. In short it means students in addition getting direct benefits for learning on BitDegree platform, which leads to higher education level and lower barrier to enter job marketplace. Please read our whitepaper how does this work in details.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#5" aria-expanded="false" aria-controls="5">
                            <h3 class="panel-title">
                                Why this project needs Blockchain technology?
                            </h3>
                        </div>
                    </div>
                    <div id="5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="5">
                        <div class="panel-body">
                            <p>Blockchain will put BitDegree online education platform ahead of competition. By enabling us to introduce smart incentives and record students achievements in blockchain. Rewards earned on platform will be exchangeable into digital goods on third party service providers.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#6" aria-expanded="false" aria-controls="6">
                            <h3 class="panel-title">
                                What achievement data will be stored in blockchain?
                            </h3>
                        </div>
                    </div>
                    <div id="6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="6">
                        <div class="panel-body">
                            <p>Students will be able to choose which data will be stored on blockchain. What courses he had passed.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#7" aria-expanded="false" aria-controls="7">
                            <h3 class="panel-title">
                                How can I hide my achievement data on blockchain?
                            </h3>
                        </div>
                    </div>
                    <div id="7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="7">
                        <div class="panel-body">
                            <p>Once student have chosen that his data is stored on blockchain, it can not be removed afterwards.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#10" aria-expanded="false" aria-controls="10">
                            <h3 class="panel-title">
                                What do the 29m users of two Web Hosts have to do with your product?
                            </h3>
                        </div>
                    </div>
                    <div id="10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="10">
                        <div class="panel-body">
                            <p>These users are young and eager to learn which correlates directly with the BitDegree project idea. User base was incentivized with AirDrop of BitDegree tokens.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#15" aria-expanded="false" aria-controls="15">
                            <h3 class="panel-title">
                                Who would be your main competitor?
                            </h3>
                        </div>
                    </div>
                    <div id="15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="15">
                        <div class="panel-body">
                            <p>We have two types of competitors - technological ones and those on whose revenues we will prey. From the latter category, universities, code academies and recruitment agencies will suffer.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#16" aria-expanded="false" aria-controls="16">
                            <h3 class="panel-title">
                                Why companies will be attracted to sponsor courses?
                            </h3>
                        </div>
                    </div>
                    <div id="16" class="panel-collapse collapse" role="tabpanel" aria-labelledby="16">
                        <div class="panel-body">
                            <p>Because this is a unique way to:<br>
                            1) stand out among competition in attracting talents<br>
                            2) pre-select the best talents<br>
                            3) choose from the talents that have basic operational knowledge<br>
                            4) when some specific talent is scarce in some geographic location educate it also saves costs compared to traditional methods and is a more responsible way of acquiring talents because the resources end up spent not on the intermediaries but to benefit the talent.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#17" aria-expanded="false" aria-controls="17">
                            <h3 class="panel-title">
                                How will you handle abusive clients?
                            </h3>
                        </div>
                    </div>
                    <div id="17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="17">
                        <div class="panel-body">
                            <p>BitDegree will provide free tokens for learning and it is a common question to ask how we will handle bots, abusive clients, macro scripts and similar. For this we have planned these solutions:</p>
                            <ul>
                                <li>Selfie tracking. Will require make a selfie before starting studies.</li>
                                <li>Typing pattern tracking. System learns unique text typing for each client.</li>
                                <li>Speech recognition. Client has to say words on the screen.</li>
                            </ul>
                            <p>During system development multiple new ways will be identified which works best.</p>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <h4 class="title">Education and Courses</h4>

            <div class="panel-group faq-block" id="accordion" role="tablist" aria-multiselectable="true">

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#4" aria-expanded="false" aria-controls="4">
                            <h3 class="panel-title">
                                What courses will be available on BitDegree?
                            </h3>
                        </div>
                    </div>
                    <div id="4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="4">
                        <div class="panel-body">
                            <p>All courses on BitDegree platform will be IT oriented. Highest quality courses created by best tutors available.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#3" aria-expanded="false" aria-controls="3">
                            <h3 class="panel-title">
                                How much will it cost to study on BitDegree?
                            </h3>
                        </div>
                    </div>
                    <div id="3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="3">
                        <div class="panel-body">
                            <p>For the first 1 year all courses on BitDegree will be free to attract as much students as possible. User growth pool will be used to incentivize this traction. In the future depending on business environment premium courses may be offered.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#8" aria-expanded="false" aria-controls="8">
                            <h3 class="panel-title">
                                How BitDegree will ensure that student learned a course online?
                            </h3>
                        </div>
                    </div>
                    <div id="8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="8">
                        <div class="panel-body">
                            <p>Students are incentivized to do peer-review process for assignments. Course tutor BitDegree token is received for each peer-review students submit. Proof of effort verification process is defined in our whitepaper.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#9" aria-expanded="false" aria-controls="9">
                            <h3 class="panel-title">
                                How much tokens will student receive for finished course?
                            </h3>
                        </div>
                    </div>
                    <div id="9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="9">
                        <div class="panel-body">
                            <p>Actual amount of token received for course completion will be decided depending on sponsor. Amount may vary on geo location, language and tutors.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#11" aria-expanded="false" aria-controls="11">
                            <h3 class="panel-title">
                                Will there be courses in the other languages?
                            </h3>
                        </div>
                    </div>
                    <div id="11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="11">
                        <div class="panel-body">
                            <p>There will be courses in other languages in the future.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#12" aria-expanded="false" aria-controls="12">
                            <h3 class="panel-title">
                                Is the platform also suitable for children education?
                            </h3>
                        </div>
                    </div>
                    <div id="12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="12">
                        <div class="panel-body">
                            <p>In the beginning our focus will be on the digital skills that are needed by employers, but there is no limit of what a smart kid can learn and we will not discriminate. In the future, we also foresee to address the skills and knowledge needed to acquire at the young age. More news about that - very soon.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#13" aria-expanded="false" aria-controls="13">
                            <h3 class="panel-title">
                                Will the courses be membership based or you'll pay for each course you take?
                            </h3>
                        </div>
                    </div>
                    <div id="13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="13">
                        <div class="panel-body">
                            <p>For most of the courses, you'll get paid to learn. If this option will not be available, you will be able to pay for the courses with your BitDegree tokens. We will have special incentives for the loyal BitDegree learners community, you could say that you'll get "membership benefits"</p>
                            <p>Students will be able to choose from a plethora of IT courses. Most of the courses will be free to enroll for the first year. All of the courses has a sponsor who funds the students participating. Depending on sponsor, students will receive micro-scholarships for learning. This is calculated by achievements every student is performing. Think of it this way, if you solve a "CodeCademy" style of exercise, you get micro-payment for doing that. This is one way of distributing sponsors funding to students. Another way is: Students enroll to paid courses. All the funds are frozen until, the achievement is unlocked. Basically students learn for free, because he is getting back his money while learning. This incentivizes students, to finish the course. There will be more enrollment models how students will learn.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#14" aria-expanded="false" aria-controls="14">
                            <h3 class="panel-title">
                                How will our degrees become internationally recognized?
                            </h3>
                        </div>
                    </div>
                    <div id="14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="14">
                        <div class="panel-body">
                            <p>We will provide blockchain based certificates issued by BitDegree. Everybody will be able to see each student progress. We will consider using 3rd party services such as blockcerts.org</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#18" aria-expanded="false" aria-controls="18">
                            <h3 class="panel-title">
                                What is gamification in education?
                            </h3>
                        </div>
                    </div>
                    <div id="18" class="panel-collapse collapse" role="tabpanel" aria-labelledby="18">
                        <div class="panel-body">
                            <p>Over the longer term, BitDegree will consider adding an interesting narrative to each course. For instance, rather than simply doing the assignment, tell us we are on a mission to disarm a bomb or address world hunger and the only way to do that is to write a program that contains the exact same features as the abstract version of the course. Some arbitrary graphics like a burning fuse or a hungry child can help provide context. Eventually, we consider creating a higher level context for the entire program that would provide a reason for doing this task whether it be killing the dragon or saving the real world. By creating a contextualized identity for learners, we make course assignments more personally relevant thereby enhancing both learning and motivation to continue and complete the work.</p>
                        </div>
                    </div>
                </div>

            </div>



            <br>
            <h4 class="title">Company</h4>

            <div class="panel-group faq-block" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#01" aria-expanded="false" aria-controls="01">
                            <h3 class="panel-title">
                                Is BitDegree.org hiring?
                            </h3>
                        </div>
                    </div>
                    <div id="01" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>We are actively seeking individuals who share our vision for the future of edu-tech, and the education in general. Applicants are encouraged to apply directly―not by means of a recruiter or other representation. Submit application to hello+jobs@bitdegree.org</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#02" aria-expanded="false" aria-controls="02">
                            <h3 class="panel-title">
                                What is the roadmap?
                            </h3>
                        </div>
                    </div>
                    <div id="02" class="panel-collapse collapse" role="tabpanel" aria-labelledby="02">
                        <div class="panel-body">
                            <p>The BitDegree Roadmap is available <a href="https://www.bitdegree.org/en/token#roadmap">here</a>.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#03" aria-expanded="false" aria-controls="03">
                            <h3 class="panel-title">
                                How can authors apply to become part of BitDegree.org platform to start creating courses?
                            </h3>
                        </div>
                    </div>
                    <div id="03" class="panel-collapse collapse" role="tabpanel" aria-labelledby="03">
                        <div class="panel-body">
                            <p>Yes. Please send us an email to hello+jobs@bitdegree.org</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#04" aria-expanded="false" aria-controls="04">
                            <h3 class="panel-title">
                                When will students in the BitDegree.org platform be available to opt-in?
                            </h3>
                        </div>
                    </div>
                    <div id="04" class="panel-collapse collapse" role="tabpanel" aria-labelledby="04">
                        <div class="panel-body">
                            <p>Please check our roadmap <a href="https://www.bitdegree.org/en/token#roadmap">here</a>.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#05" aria-expanded="false" aria-controls="05">
                            <h3 class="panel-title">
                                How many users does the BitDegree.org have?
                            </h3>
                        </div>
                    </div>
                    <div id="05" class="panel-collapse collapse" role="tabpanel" aria-labelledby="05">
                        <div class="panel-body">
                            <p>We have partnered with Hostinger International  and 000webhost and we will start promoting BitDegree services to more than 29 million 000webhost & Hostinger users.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#06" aria-expanded="false" aria-controls="6">
                            <h3 class="panel-title">
                                Your partner is 000webhost. It was hacked. How can I trust You?
                            </h3>
                        </div>
                    </div>
                    <div id="06" class="panel-collapse collapse" role="tabpanel" aria-labelledby="06">
                        <div class="panel-body">
                            <p>000webhost has a dedicated page explaining what had happened and how company solved security issues <a href="https://www.000webhost.com/000webhost-database-hacked-data-leaked">here</a>.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#07" aria-expanded="false" aria-controls="07">
                            <h3 class="panel-title">
                                How do I report a security issue?
                            </h3>
                        </div>
                    </div>
                    <div id="07" class="panel-collapse collapse" role="tabpanel" aria-labelledby="07">
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

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#001" aria-expanded="false" aria-controls="001">
                            <h3 class="panel-title">
                                What is the symbol of BitDegree token?
                            </h3>
                        </div>
                    </div>
                    <div id="001" class="panel-collapse collapse" role="tabpanel" aria-labelledby="001">
                        <div class="panel-body">
                            <p>BDG</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#002" aria-expanded="false" aria-controls="002">
                            <h3 class="panel-title">
                                When does the token sale start?
                            </h3>
                        </div>
                    </div>
                    <div id="002" class="panel-collapse collapse" role="tabpanel" aria-labelledby="002">
                        <div class="panel-body">
                            <p>December 1st. 2017. It will take 2 weeks until Dec 14 or until hard-cap is reached.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#003" aria-expanded="false" aria-controls="003">
                            <h3 class="panel-title">
                                What is soft-cap and hard-cap?
                            </h3>
                        </div>
                    </div>
                    <div id="003" class="panel-collapse collapse" role="tabpanel" aria-labelledby="003">
                        <div class="panel-body">
                            <p>Soft-cap is 19000 ETH and Hard-cap is 76500 ETH</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#004" aria-expanded="false" aria-controls="004">
                            <h3 class="panel-title">
                                What is the value of 1 BitDegree (BDG) token at the token sale?
                            </h3>
                        </div>
                    </div>
                    <div id="004" class="panel-collapse collapse" role="tabpanel" aria-labelledby="004">
                        <div class="panel-body">
                            <p>Smart contract will automatically issue 10000 BDG tokens for 1ETH sent to smart contract address. So 1 BDG token is worth 1/10000 ETH, if ETH price is $300, 1 token is $0.03.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#005" aria-expanded="false" aria-controls="005">
                            <h3 class="panel-title">
                                What is BitDegree Token?
                            </h3>
                        </div>
                    </div>
                    <div id="005" class="panel-collapse collapse" role="tabpanel" aria-labelledby="005">
                        <div class="panel-body">
                            <p>ERC20 utility token built on top of Ethereum blockchain. BitDegree token as a mean of exchange can be used among users of the platform: Students, Sponsors, and third party Digital Service Providers. </p>
                            <p>Token can be used to create smart-incentives for educational accomplishments, to purchase advertising and recruitment services, and various other digital services offered by third parties on the BitDegree platform. </p>
                            <p>Sponsors are the main fuel for a sustainable BitDegree economy. The economic incentive for Sponsors to buy BitDegree tokens is to enhance employer branding and recruitment of tech talent. The demand of BitDegree Token is closely aligned with the gargantuan $200 billion recruitment industry. Due to limited supply, the demand for BitDegree platform’s services will drive the token price up. </p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#006" aria-expanded="false" aria-controls="006">
                            <h3 class="panel-title">
                                BitDegree Token is utility token. What does it mean?
                            </h3>
                        </div>
                    </div>
                    <div id="006" class="panel-collapse collapse" role="tabpanel" aria-labelledby="006">
                        <div class="panel-body">
                            <p>Utility token means that BitDegree token is not a security. It follows these rules:</p>
                            <ul>
                                <li>Token owner <b>does not</b> have voting rights as a shareholder.</li>
                                <li>Token owner <b>does not</b> participate in any kind of revenue sharing.</li>
                                <li>Token owner <b>does not</b> receive dividends of any kind.</li>
                                <li>Tokens will not be bought back.</li>
                            </ul>
                            <br>
                            <p>BitDegree token passes <a href="http://consumer.findlaw.com/securities-law/what-is-the-howey-test.html" target="_blank">Howey test</a>. Answering these questions:</p>
                            <p>It is an investment of money: No<br>
                                There is an expectation of profits from the investment: No<br>
                                The investment of money is in a common enterprise: No<br>
                                Any profit comes from the efforts of a promoter or third party: No<br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#007" aria-expanded="false" aria-controls="007">
                            <h3 class="panel-title">
                                How to participate in token sale?
                            </h3>
                        </div>
                    </div>
                    <div id="007" class="panel-collapse collapse" role="tabpanel" aria-labelledby="007">
                        <div class="panel-body">
                            <p>We will provide more information in this website on how to participate in the token sale once the crowdsale date approaches. Stay tuned! Subscribe to our newsletter. You can start by creating Ethereum wallet on <a href="https://www.myetherwallet.com/" target="_blank">MyEtherWallet</a> this will help to get started easier.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#008" aria-expanded="false" aria-controls="008">
                            <h3 class="panel-title">
                                How can you ensure, that you will continue to work after your token sale?
                            </h3>
                        </div>
                    </div>
                    <div id="008" class="panel-collapse collapse" role="tabpanel" aria-labelledby="008">
                        <div class="panel-body">
                            <p>The token sale is not BitDegree goal itself. It is only one of the ways to accumulate funds for building a company. Raising money though token sale does not equal to value creating. True value and biggest return for all the shareholders, stakeholders, contributors and investors comes when the global company is being build with the raised funds.</p>
                            <p>The core Bitdegree team members are acting actively in IT business since 2004. We are bootstrapped, profitable and proud. We have vision to change the global education to better and token sale is just a starting point. Big advisory board tells about itself.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#009" aria-expanded="false" aria-controls="009">
                            <h3 class="panel-title">
                                Are Tokens transferable? Where are Tokens traded?
                            </h3>
                        </div>
                    </div>
                    <div id="009" class="panel-collapse collapse" role="tabpanel" aria-labelledby="009">
                        <div class="panel-body">
                            <p>We have received requests from 2 Exchanges to list BitDegree token. In general all crypto currency exchanges are able to add ERC20 tokens to their trading platform. This is the information we can provide right now. More information about exchanges will be provided after the token sale.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#010" aria-expanded="false" aria-controls="010">
                            <h3 class="panel-title">
                                What do Tokens represent?
                            </h3>
                        </div>
                    </div>
                    <div id="010" class="panel-collapse collapse" role="tabpanel" aria-labelledby="010">
                        <div class="panel-body">
                            <p>Think of a token as mini voucher that can be exchanged to services on many digital service providers. Hostinger is the first one who accepts BitDegree token in exchange for services.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#011" aria-expanded="false" aria-controls="011">
                            <h3 class="panel-title">
                                Which wallets can be used to store Token?
                            </h3>
                        </div>
                    </div>
                    <div id="011" class="panel-collapse collapse" role="tabpanel" aria-labelledby="011">
                        <div class="panel-body">
                            <p>BitDegree Token is an ERC20 token, and can be stored in ERC20 compatible wallets. We do not recommend a particular product, but official <a href="https://ethereum.org/">Ethereum wallet Mist</a> and <a href="https://www.myetherwallet.com/">MyEtherWallet</a> are most common.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#012" aria-expanded="false" aria-controls="012">
                            <h3 class="panel-title">
                                What crypto-currencies were accepted during the sale?
                            </h3>
                        </div>
                    </div>
                    <div id="012" class="panel-collapse collapse" role="tabpanel" aria-labelledby="012">
                        <div class="panel-body">
                            <p>Only Ethereum (ETH) will be accepted during a sale.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#013" aria-expanded="false" aria-controls="013">
                            <h3 class="panel-title">
                                What is the distribution of tokens?
                            </h3>
                        </div>
                    </div>
                    <div id="013" class="panel-collapse collapse" role="tabpanel" aria-labelledby="013">
                        <div class="panel-body">
                            <p>Distribution of tokens is provided <a href="https://www.bitdegree.org/en/token#token-distribution">in this section</a> of the website.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#014" aria-expanded="false" aria-controls="014">
                            <h3 class="panel-title">
                                Is there a pre-sale or whitelist?
                            </h3>
                        </div>
                    </div>
                    <div id="014" class="panel-collapse collapse" role="tabpanel" aria-labelledby="014">
                        <div class="panel-body">
                            <p>There is no pre-sale or whitelist.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#015" aria-expanded="false" aria-controls="015">
                            <h3 class="panel-title">
                                What is the Tokens smart contract address?
                            </h3>
                        </div>
                    </div>
                    <div id="015" class="panel-collapse collapse" role="tabpanel" aria-labelledby="015">
                        <div class="panel-body">
                            <p>Will be published on website <b>bitdegree.org</b> 48hrs before crowdsale launch date. Also available on <a href="https://github.com/bitdegree" target="_blank">github</a></p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#016" aria-expanded="false" aria-controls="016">
                            <h3 class="panel-title">
                                How will the user growth pool be used?
                            </h3>
                        </div>
                    </div>
                    <div id="016" class="panel-collapse collapse" role="tabpanel" aria-labelledby="016">
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

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#017" aria-expanded="false" aria-controls="017">
                            <h3 class="panel-title">
                                Does the recent SEC bulletin affect Token?
                            </h3>
                        </div>
                    </div>
                    <div id="017" class="panel-collapse collapse" role="tabpanel" aria-labelledby="017">
                        <div class="panel-body">
                            <p>SEC jurisdiction lies in the United States federal government and as they personally state only affects token sales that are issuing tokens in the United States or for the citizens of the US. As we won't issue tokens through the US and will not let the US citizens or green card holders to participate in token sale. Moreover Bitdegree Token will be more like payment measure and not the security and therefore are not under the scope of SEC’s jurisdictions.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#018" aria-expanded="false" aria-controls="018">
                            <h3 class="panel-title">
                                What kind of information do I need to provide to participate in token sale?
                            </h3>
                        </div>
                    </div>
                    <div id="018" class="panel-collapse collapse" role="tabpanel" aria-labelledby="018">
                        <div class="panel-body">
                            <p>Your name, last name, email, phone number, country of residence, date of birth and your public wallet address.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#019" aria-expanded="false" aria-controls="019">
                            <h3 class="panel-title">
                                Can USA participate in the token sale?
                            </h3>
                        </div>
                    </div>
                    <div id="019" class="panel-collapse collapse" role="tabpanel" aria-labelledby="019">
                        <div class="panel-body">
                            <p>Unfortunately people from the US are unable to participate in the token sale.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#020" aria-expanded="false" aria-controls="020">
                            <h3 class="panel-title">
                                Where can I find your Smart Contract?
                            </h3>
                        </div>
                    </div>
                    <div id="020" class="panel-collapse collapse" role="tabpanel" aria-labelledby="020">
                        <div class="panel-body">
                            <p>Bitdegree Smart Contract is open source and can be viewed on <a href="https://github.com/bitdegree/bitdegree-token-crowdsale/tree/master/contracts" target="blank">Github</a></p>
                        </div>
                    </div>
                </div>

            </div>

            <br>
            <h4 class="title">Sponsoring</h4>
            <div class="panel-group faq-block" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#0001" aria-expanded="false" aria-controls="0001">
                            <h3 class="panel-title">
                                How can a company become a Sponsor?
                            </h3>
                        </div>
                    </div>
                    <div id="0001" class="panel-collapse collapse" role="tabpanel" aria-labelledby="0001">
                        <div class="panel-body">
                            <p>Please send us an email to hello@bitdegree.org</p>
                        </div>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#0002" aria-expanded="false" aria-controls="0002">
                            <h3 class="panel-title">
                                What are the payment options to fund courses?
                            </h3>
                        </div>
                    </div>
                    <div id="0002" class="panel-collapse collapse" role="tabpanel" aria-labelledby="0002">
                        <div class="panel-body">
                            <p>Everything will be paid in tokens.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#0003" aria-expanded="false" aria-controls="0003">
                            <h3 class="panel-title">
                                What is your business plan for onboarding sponsors to fund BitDegree platform?
                            </h3>
                        </div>
                    </div>
                    <div id="0003" class="panel-collapse collapse" role="tabpanel" aria-labelledby="0003">
                        <div class="panel-body">
                            <p>Approach sponsors explaining BitDegree idea. Sponsors who appreciates the project will join.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#0004" aria-expanded="false" aria-controls="0004">
                            <h3 class="panel-title">
                                What student data is provided to Sponsors?
                            </h3>
                        </div>
                    </div>
                    <div id="0004" class="panel-collapse collapse" role="tabpanel" aria-labelledby="0004">
                        <div class="panel-body">
                            <p>Depending on course and content provider settings, student will be able to choose which data is provided to Sponsors.</p>
                        </div>
                    </div>
                </div>

            </div>

            <br>
            <h4 class="title">Links</h4>
            <div class="panel-group faq-block" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#00001" aria-expanded="false" aria-controls="00001">
                            <h3 class="panel-title">
                                Bounty thread (Registration forms are here)
                            </h3>
                        </div>
                    </div>
                    <div id="00001" class="panel-collapse collapse" role="tabpanel" aria-labelledby="00001">
                        <div class="panel-body">
                            <a href="https://bitcointalk.org/index.php?topic=2225880.0" target="_blank">https://bitcointalk.org/index.php?topic=2225880.0</a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#00002" aria-expanded="false" aria-controls="00002">
                            <h3 class="panel-title">
                                Announcement thread
                            </h3>
                        </div>
                    </div>
                    <div id="00002" class="panel-collapse collapse" role="tabpanel" aria-labelledby="00002">
                        <div class="panel-body">
                            <a href="https://bitcointalk.org/index.php?topic=2214321.0" target="_blank">https://bitcointalk.org/index.php?topic=2214321.0</a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab">

                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#00003" aria-expanded="false" aria-controls="00003">
                            <h3 class="panel-title">
                                Telegram chat
                            </h3>
                        </div>
                    </div>
                    <div id="00003" class="panel-collapse collapse" role="tabpanel" aria-labelledby="00003">
                        <div class="panel-body">
                            <a href="https://t.me/joinchat/GIngsQrKak9hN8h4xwN2Kg" target="_blank">https://t.me/joinchat/GIngsQrKak9hN8h4xwN2Kg</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('partials.subscribe-bottom')

@endsection
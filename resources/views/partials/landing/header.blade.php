
<header class="{{ $navBarOnly ?? false ? 'container-fluid' : '' }}">
    @if(!($navBarOnly ?? false))
        <div class="medusae-overlay"></div>
        <video  id="bgvid" poster="{{ asset('landing-bg.jpg') }}" class="hidden-xs hidden-sm" autoplay="" loop="" style="position: absolute; height: 1006px; top:-105px;">
            <source src="assets/bg.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <nav id="sidebar" class="sidebar side-nav">
            <ul class="nav nav-list affix">
                <li><a href="#top">Top</a></li>
                <li><a href="#what-are-we">01. <span>What is Bitdegree?</span></a></li>
                <li><a href="#section-two">02. <span>Our Users</span></a></li>
                <li><a href="#why-us">03. <span>What problems do we solve?</span></a></li>
                <li><a href="#statistics">04. <span>About MOOCs</span></a></li>
                <li><a href="#section-five">05. <span>Student Perspective</span></a></li>
                <li><a href="#statistics-2">06. <span>IT jobs Demand</span></a></li>
                <li><a href="#section-seven">07. <span>Token Economy</span></a></li>
                <li><a href="#team">08. <span>The Team</span></a></li>
                <li><a href="#roadmap">09. <span>Roadmap</span></a></li>
            </ul>
        </nav>
    @endif

    <div class="container header-content">
        <div class="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a href="{{ route('home') }}" class="navbar-logo navbar-brand">
                        <img class="logo" src="{{ asset('bitdegree-logo.png') }}" alt="BitDegree">
                    </a>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>

                </div>
                <div id="navbar" class="collapse navbar-collapse navbar-container">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('home') }}#what-are-we" data-toggle="collapse" data-target=".navbar-collapse.in">What is BitDegree</a></li>
                        <li><a href="{{ route('home') }}#team" data-toggle="collapse" data-target=".navbar-collapse.in">People Behind</a></li>
                        <!--<li><a href="#token-sale-terms" data-toggle="collapse" data-target=".navbar-collapse.in">ICO &amp; Roadmap</a></li>-->
                        <!--<li><a href="#faqs" data-toggle="collapse" data-target=".navbar-collapse.in">FAQ</a></li>-->
                        <!--<li><a href="https://medium.com/@bitdegree" target="_blank">Blog</a></li>-->
                    </ul>
                    <ul class="cta-menu">
                        <li><a href="/bitdegree-ico-one-pager.pdf" class="navbar-cta" target="_blank">One Pager</a></li>
                    </ul>
                </div>
            </div>
        </div>

        @if(!($navBarOnly ?? false))
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="title">Revolutionizing education with blockchain</h2>
                    <div class="description">
                        <p>The world's first blockchain-powered online education platform with token scholarships &amp; tech talent acquisition</p>
                    </div>
                    <div class="communicate">
                        <div class="contact">
                            <form action="https://xyz.us16.list-manage.com/subscribe/post?u=528cc9372b916077746636344&amp;id=f79db67249" method="post">
                                <input class="suscribe-input" name="EMAIL" type="email" placeholder="Enter email to receive updates" required>
                                <input type="submit" class="submit" value="Subscribe" name="subscribe">
                            </form>
                        </div>

                        <div class="bullet-points">
                            <p>Smart incentives  &#8226;  The world's best MOOCs  &#8226;  Powered by the Ethereum  &#8226;  Decentralized</p>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>

</header>
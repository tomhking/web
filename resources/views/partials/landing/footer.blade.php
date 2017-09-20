<footer class="container-fluid footer main">
    <div class="container">
        <div class="row footer-links">
            <div class="col-md-12">
                <a href="{{ route('home') }}" class="footer-logo">
                    <img class="logo" src="{{ asset('bitdegree-logo.png') }}" alt="BitDegree">
                </a>
            </div>
            <div class="col-md-12">
                <div class="navbar" role="navigation">
                    <div id="navbar-2" class="navbar-container">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('home') }}#what-are-we" data-toggle="collapse" data-target=".navbar-collapse.in">What is BitDegree</a></li>
                            <li><a href="{{ route('home') }}#team" data-toggle="collapse" data-target=".navbar-collapse.in">People Behind</a></li>
                            <!--<li><a href="#token-sale-terms" data-toggle="collapse" data-target=".navbar-collapse.in">ICO &amp; Roadmap</a></li>-->
                            <!--<li><a href="#faqs" data-toggle="collapse" data-target=".navbar-collapse.in">FAQ</a></li>-->
                            <!--<li><a href="https://medium.com/@bitdegree" target="_blank">Blog</a></li>-->
                            <li><a href="/bitdegree-ico-one-pager.pdf" class="navbar-cta" target="_blank">One Pager</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <a href="https://www.ethereum.org/" rel="nofollow" class="footer-logo">
            <img class="logo" src="{{ asset('ethereum.png') }}" alt="Etherium foundation">
        </a>

        <p class="copyright">Copyright © 2017 BitDegree.org <br>  <a href="mailto:hello@bitdegree.org">hello@bitdegree.org</a></p>
    </div>
</footer>
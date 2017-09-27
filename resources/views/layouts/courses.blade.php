<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>BitDegree ICO - Revolutionizing education with blockchain</title>

    @include('partials.tag-manager-head')

    <meta name="description" content="Join upcoming BitDegree ICO (Initial Coin Offerings). BitDegree - The world's first blockchain based free education platform with token scholarships & talent networking. Be the first to know about BitDegree Foundation Token Distribution & ICO event updates.">
    <meta name="keywords" content="ICO, initial coin offerings, bitdegree, ethereum, bitcoin, token, tokens, blockchain, learning foundation, scholarship, free education">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ base('fav_icon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('app-icons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('app-icons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('app-icons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('app-icons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('app-icons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('app-icons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('app-icons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('app-icons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('app-icons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('app-icons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ base('fav-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ base('fav-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ base('fav-16x16.png') }}">
    <link rel="manifest" href="{{ asset('app-icons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('app-icons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:100,200,300,400,500,600,700,900|Work+Sans:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

    <link rel="stylesheet" href="{{ asset('vendor-bundle.min.css?ver2') }}">
    <link rel="stylesheet" href="{{ asset('main.css?ver2') }}">
    <link href="{{ asset('course_style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('jquery.mCustomScrollbar.css') }}">
</head>

<body lang="en-GB" class="canvas" data-spy="scroll" data-target="#toc" style="">

@include('partials.tag-manager-body')

<div class="container-fluid">
    <div class="row-fluid">

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 sidebar-offcanvas affix" id="sidebar">

            <div class="sidebar-nav">
                <div class="current-lesson">
                    <div class="back-arrow">
                        <a href="{{ route_lang('mvp') }}" title="Back">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </a>
                    </div>
                    @yield('currentStep')
                </div>

                <div class="lesson tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-folder-o" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                    </ul>
                </div>



                <div class="lessons-nav navbar mCustomScrollbar" role="navigation">

                    <div id="navbar" class="collapse navbar-collapse navbar-container">
                        @yield('steps')
                    </div>

                </div>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main-content">
            <div class="col-xs-12 col-sm-12 col-md-12 header">
                <div class="container-fluid">
                    <div class="content text-center">
                        <h4>@yield('title')</h4>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12  video-wrapper">
                <div class="content front-content" id="content">
                    <div class="video-container">
                        <div class="container-fluid communicate">
                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-md-push-2 text-center">
                                    <h6>BitDegree Program</h6>
                                    @yield('courseHeader')
                                </div>
                                <div class="contact">
                                    <form action="https://xyz.us16.list-manage.com/subscribe/post?u=528cc9372b916077746636344&amp;id=f79db67249" method="post">
                                        <input class="suscribe-input" name="EMAIL" type="email" placeholder="Enter your email to receive updates" required>
                                        <input type="submit" class="submit" value="Subscribe" name="subscribe">
                                    </form>
                                    <div class="contact-icons">
                                        <a class="contact-icon contact-icon-twitter" href="https://twitter.com/bitdegree_org" rel="nofollow" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a class="contact-icon contact-icon-slack" href="https://bitdegree.slack.com" rel="nofollow" target="_blank"><i class="fa fa-slack" aria-hidden="true"></i></a>
                                        <a class="contact-icon contact-icon-github" href="https://github.com/bitdegree" rel="nofollow" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                                        <a class="contact-icon contact-icon-reddit" href="https://www.reddit.com/r/bitdegree" rel="nofollow" target="_blank"><i class="fa fa-reddit-alien" aria-hidden="true"></i></a>
                                        <a class="contact-icon contact-icon-facebook" href="https://www.facebook.com/bitdegree.org/" rel="nofollow" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="contain-video">
                            <div class="course-video">
                                <div class="course-video-overlay"></div>
                                <video  id="bgvid" poster="{{ asset('bitdegree-vid-img.jpg') }}" class="hidden-xs hidden-sm" autoplay="" loop="" style="      width: auto; height: 100%;">
                                    <source src="{{ asset('bitdegree_bg.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <div class="col-xs-12 col-sm-12 col-md-12 ">
                <div class="content front-content" id="lesson-content">
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Google CDN jQuery with fallback to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset('jquery-1.11.0.min.js') }}"><\/script>')</script>

<!-- custom scrollbar plugin -->
<script src="{{ asset('jquery.mCustomScrollbar.concat.min.js') }}"></script>

<script>
    (function($){
        $(window).on("load",function(){

            $("a[rel='load-content']").click(function(e){
                e.preventDefault();
                var url=$(this).attr("href");
                $.get(url,function(data){
                    $(".content .mCSB_container").append(data); //load new content inside .mCSB_container
                    //scroll-to appended content
                    $(".content").mCustomScrollbar("scrollTo","h2:last");
                });
            });

            $(".content").delegate("a[href='top']","click",function(e){
                e.preventDefault();
                $(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
            });

        });
    })(jQuery);
</script>

<script>
    (function($){
        $(window).on("load resize",function(){
            var selector=".lessons-nav", //your element(s) selector
                cssFlag=window.getComputedStyle(document.querySelector(selector),":after").getPropertyValue("content").replace(/"/g,'');
            if(cssFlag){
                $(selector).mCustomScrollbar({ /* scrollbar options */ });
            }else{
                $(selector).mCustomScrollbar("destroy");
            }
        });
    })(jQuery);
</script>


</body>

</html>
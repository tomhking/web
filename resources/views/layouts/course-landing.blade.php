<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@lang('home.title')</title>

    @include('partials.tag-manager-head')

    <meta name="description" content="@lang('home.meta_description')">
    <meta name="keywords" content="@lang('home.meta_keywords')">
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

    @include('partials.stylesheets')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

    @include('partials.smartlook')
</head>

<body class="landing {{ $bodyClass or 'front-page' }}" data-spy="scroll" data-target="#sidebar" data-offset="150">
    @include('partials.tag-manager-body')

    <div id="top"></div>

    @include('partials.landing.header')

    @include('partials.tag-manager-body')

    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main-content">

                <div class="col-xs-12 col-sm-12 col-md-12  video-wrapper">
                    <div class="content front-content" id="content">
                        <div class="video-container">
                            <div class="container-fluid communicate">
                                <div class="row">
                                    <div class="col-xs-12 col-md-8 col-md-push-2 text-center">
                                        <h6>BitDegree Program</h6>
                                        @yield('courseHeader')
                                    </div>
                                    @include('partials.sign-up-for-course')
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

            </div>
        </div>
    </div>


    @yield('content')
    @include('partials.landing.footer')
    @stack('body_scripts')

</body>

</html>
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

    @include('partials.smartlook')
</head>

<body class="landing {{ $bodyClass or 'front-page' }}" data-spy="scroll" data-target="#sidebar" data-offset="150">
    @include('partials.tag-manager-body')

    <div id="top"></div>

    @include('partials.landing.header')

    @yield('content')

    @if(!isset($hideFooter) || !$hideFooter) @include('partials.landing.footer') @endif

    @include('partials.scripts')
    @stack('body-scripts')
</body>

</html>
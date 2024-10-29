@php
    $theme = 0;
    $themename = ["adorable"];
    $themestatus = 1;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') | {{ config('app.name') }}</title>

    @stack('seo-tags')
    @if(Request::segment(2) == '')
    <meta property="og:keywords" content="berita,news,berita game,olahraga,trending,portal berita,website berita" />
    <meta property="og:title" content="Jurnalhobi" />
    <meta property="keywords" content="berita,news,berita game, olahraga,trending,portal berita,website berita" />
    <meta property="title" content="Jurnalhobi" />
    @endif
    <meta property="description" content="Jurnalhobi adalah portal berita yang menyediakan berita terkini dan terpercaya bagi pembaca." />
    <meta property="url" content="https://jurnalhobi.com/" />
    <meta property="type" content="website" />
    <meta property="image" content="https://jurnalhobi.com/img/logo.png" />
    <meta property="site_name" content="Jurnalhobi" />
    <meta property="og:description" content="Jurnalhobi adalah portal berita yang menyediakan berita terkini dan terpercaya bagi pembaca." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://jurnalhobi.com/" />
    <meta property="og:image" content="https://jurnalhobi.com/img/logo.png" />
    <meta property="og:site_name" content="Jurnalhobi" />
    <meta property="og:locale" content="en-US" />
    <meta property="twitter:card" content="summary" />
    <meta property="twitter:site" content="@jurnalhobi" />
    <meta property="twitter:site:id" content="@jurnalhobi" />
    <meta property="twitter:creator" content="@jurnalhobi" />
    <meta property="twitter:creator:id" content="@jurnalhobi" />
    <meta name="theme-color" content="#fc2691" />
    <meta name="robots" content="index,nofollow" />
    <meta name="googlebot" content="index,nofollow" />

    <!-- iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#fc2691" />
    <meta content="yes" name="apple-touch-fullscreen" />
    <meta name="format-detection" content="telephone=no" />

    <link rel="shortcut icon" type="image/ico" href="/img/logo.png" />

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    @if ($themestatus)
        <link href="{{ asset('css/'.$themename[$theme].'.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif
    @stack('css')
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7041766592433406" crossorigin="anonymous"></script>
    @stack('head script')
</head>
<body theme="light">
    <div id="scroller">
        @if ($themestatus)
            @include('layouts.others.'.$themename[$theme].'/'.$themename[$theme].'_header')
            {{-- @include('layouts.others.'.$themename[$theme].'_sidebar') --}}
            @yield('content')
        @else
            @include('layouts.others.header')
            @include('layouts.others.sidebar')
            @yield('content')
        @endif
    </div>
    @yield('button')
</body>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VZGZVY2Q79"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VZGZVY2Q79');
</script>
@if ($themestatus)
<script src="{{ asset('js/'.$themename[$theme].'.js') }}"></script>
@else
<script src="{{ asset('js/app.js') }}"></script>
@endif
<script defer src="https://friconix.com/cdn/friconix.js"></script>
@stack('script')
</html>
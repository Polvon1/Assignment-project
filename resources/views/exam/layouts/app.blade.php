<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} - {{ __('landing.slogan') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <!-- favicon -->
    <link rel="apple-touch-icon" href="{{ asset('frontend/images/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend/images/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('frontend/images/favicon.ico') }}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('frontend/images/favicon.ico') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.ico') }}" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="Abzalkhujaa" name="author" />
    <meta content="Uzinfocom" name="company">
    @include('exam.layouts.inc.style')
    <script>window.MathJax = { MathML: { extensions: ["mml3.js", "content-mathml.js"]}};</script>
    <script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=MML_HTMLorMML"></script>
</head>
<body>
<!-- Loader -->
{{--@include('exam.layouts.includes.preloader')--}}
<!-- Loader -->

<!-- Navbar STart -->
{{--@include('exam.layouts.includes.header')--}}
<!-- Navbar End -->

@yield('content')

<!-- Footer Start -->
{{--@include('exam.layouts.includes.footer')--}}
<!-- Footer End -->

@include('exam.layouts.inc.script')

</body>
</html>

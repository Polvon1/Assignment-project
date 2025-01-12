<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} - {{ __('landing.slogan') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ __('landing.slogan') }}" />
    <meta name="keywords" content="Online, Test, Online Test, Quiz, Get test" />
    <meta name="author" content="Abzalkhuja" />
    <meta name="Version" content="v3.2.6" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('landing/images/favicon.ico') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('landing/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- tobii css -->
    <link href="{{ asset('landing/css/tobii.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="{{ asset('landing/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <link rel="stylesheet" href="{{ asset('fonts/feather/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/flag-icon/css/flag-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/fonts/font-awesome-pro/css/all.min.css') }}">
    <!-- Slider -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('landing/css/tiny-slider.css') }}"/>
    <!-- Main Css -->
    <link href="{{ asset('landing/css/style.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="{{ asset('landing/css/colors/default.css') }}" rel="stylesheet" id="color-opt">
    <livewire:styles />

    <style>
        .work-process.process-arrow:after{
            display: none;
        }
        .card-radio{
            cursor: pointer;
            transition: all 0.35s ease;
        }
        .card-radio .card-radio__card {
            cursor: pointer;
            border: 2px solid rgba(0, 0, 0, 0);
            position: relative;
        }
        .card-radio .card-radio__card::after {
            font-family: "Font Awesome 5 Pro";
            position: absolute;
            content: "";
            top: 10px;
            right: 20px;
            color: #38c172;
            display: none;
        }
        .card-radio .card-radio__btn:checked + .card-radio__card {
            border: 2px solid rgb(47,85,212);
            transition: all 0.35s ease;
        }
        .card-radio .card-radio__btn:checked + .card-radio__card::after {
            display: block;
        }
        .progress-box .progress .progress-value{
            top: 15px!important;
        }
        .category-icon{
            height: 80px;
            width: auto!important;
        }
        .accordion-title figure img {
            display: none;
        }
        .accordion-title > * {
            margin-bottom: 0!important;
        }
        .accordion .accordion-item .accordion-button:before{
            top: 15px;
            transform: none;
        }
    </style>
</head>

<body>

<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>
<!-- Loader -->

@if(Route::currentRouteName() != 'main.index')
    @include('landing.layouts.panels.page_header')
@else
    @include('landing.layouts.panels.header')
@endif

@yield('content')

<!-- javascript -->
<script src="{{ asset('landing/js/bootstrap.bundle.min.js') }}"></script>
<!-- SLIDER -->
<script src="{{ asset('landing/js/tiny-slider.js') }}"></script>
<script src="{{ asset('landing/js/shuffle.min.js') }}"></script>
<!-- tobii js -->
<script src="{{ asset('landing/js/tobii.min.js') }}"></script>
<!-- Icons -->
<script src="{{ asset('landing/js/feather.min.js') }}"></script>
<!-- Main Js -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('landing/js/plugins.init.js') }}"></script>
<script src="{{ asset('landing/js/app.js') }}"></script>

<livewire:scripts />

<script>
    @if(session()->has(\App\Support\Enums\NotificationTypeEnum::SUCCESS))
    Swal.fire({
        title: 'Успешно!',
        text: 'Заявка отправлена',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 5000
    })
    @endif
    @if(session()->has(\App\Support\Enums\NotificationTypeEnum::ERROR))
    Swal.fire({
        title: 'Безуспешно!',
        text: 'Заявка не отправлена',
        icon: 'error',
        confirmButtonText: 'OK',
        timer: 4000
    })
    @endif
</script>

<script>window.MathJax = { MathML: { extensions: ["mml3.js", "content-mathml.js"]}};</script>
<script type="text/javascript" async  src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script>

</body>
</html>

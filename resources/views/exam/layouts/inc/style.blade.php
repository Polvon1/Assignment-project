<!-- Bootstrap -->
<link href="{{ asset('landing/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- tobii css -->
<link href="{{ asset('landing/css/tobii.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Icons -->
<link href="{{ asset('landing/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
<link rel="stylesheet" href="{{ asset('fonts/feather/iconfont.css') }}">
<link rel="stylesheet" href="{{ asset('fonts/flag-icon-css/css/flag-icon.min.css') }}">
<link rel="stylesheet" href="{{ asset('landing/fonts/font-awesome-pro/css/all.min.css') }}">
<!-- Slider -->
<link rel="stylesheet" href="{{ asset('landing/css/tiny-slider.css') }}"/>
@yield('vendor-style')
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
    .question-title figure img{
        width: 100%;
    }

</style>
@yield('page-style')

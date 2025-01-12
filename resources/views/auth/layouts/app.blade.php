<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Abzalkhujaa">
    <meta name="description" content="Get Test Platform">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Gettest.uz') }}</title>
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/libs/fontawesome-icons.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
    <livewire:styles />
    <style>
        .parent-div {
            display: inline-block;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        .parent-div input[type=file] {
            left: 0;
            top: 0;
            opacity: 0;
            position: absolute;
            font-size: 90px;
            cursor: pointer;
        }
        .btn-upload {
            background-color: #fff;
            border: 3px solid #000;
            color: #000;
            padding: 10px 25px;
            border-radius: 10px;
            font-size: 22px;
            font-weight: bold;
        }
    </style>
    @yield('page-style')
</head>
<body class="nk-body npc-default pg-auth">
<div class="nk-app-root" id="#app">
    <div class="nk-main">
        <div class="nk-wrap nk-wrap-nosidebar">
            <div class="nk-content">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<livewire:scripts />
@yield('page-script')
</body>
</html>




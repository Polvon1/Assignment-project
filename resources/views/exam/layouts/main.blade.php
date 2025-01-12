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
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('exam/assets/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('exam/assets/css/theme.css') }}">
    <livewire:styles />
</head>
<body class="nk-body bg-white npc-default has-aside">

<div class="nk-app-root">
    <div class="nk-main ">
        <div class="nk-wrap ">
            @include('exam.layouts.inc.header')
            <div class="nk-content ">
                <div class="container wide-xl">
                    <div class="nk-content-inner">
                        @yield('aside')
                        <div class="nk-content-body">
                            @yield('content')
                            @include('exam.layouts.inc.footer')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script src="{{ asset('exam/assets/js/bundle.js') }}"></script>
<script src="{{ asset('exam/assets/js/scripts.js') }}"></script>
<livewire:scripts />
@yield('page-script')
</body>
</html>

<header id="topnav" class="defaultscroll sticky">
    <div class="container-fluid">
        <!-- Logo container-->
        <a class="logo" href="{{ route('main.index') }}">
{{--            <span class="logo-light-mode">--}}
{{--                <img src="{{ asset('images/logo.png') }}" class="l-dark" height="35" alt="">--}}
{{--                <img src="{{ asset('images/logo_white.png') }}" class="l-light" height="35" alt="">--}}
{{--            </span>--}}
{{--            <img src="{{ asset('images/logo_white.png') }}" height="24" class="logo-dark-mode" alt="">--}}
        </a>
        <div class="buy-button">
            @auth
                @hasanyrole(\App\Support\Enums\RoleEnum::admin_moderator_organization_roles_to_string())
                <a href="{{ route('dashboard.index') }}">
                    <div class="btn btn-primary login-btn-primary"><i class="feather icon-user"></i> {{ auth()->user()->username }}</div>
                    <div class="btn btn-light login-btn-light"><i class="feather icon-user"></i> {{ auth()->user()->username }}</div>
                </a>
                @else
                <a href="{{ route('Profile.index') }}">
                    <div class="btn btn-primary login-btn-primary"><i class="feather icon-user"></i> {{ auth()->user()->username }}</div>
                    <div class="btn btn-light login-btn-light"><i class="feather icon-user"></i> {{ auth()->user()->username }}</div>
                </a>
                @endhasanyrole
            @endauth
            @guest
                <a href="{{ route('login') }}">
                    <div class="btn btn-primary login-btn-primary">{{ __('dashboard.login.title') }}</div>
                    <div class="btn btn-light login-btn-light">{{ __('dashboard.login.title') }}</div>
                </a>
            @endguest

        </div><!--end login button-->
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light">
                <li>
                    <a href="{{ route('main.index') }}" class="sub-menu-item">{{ __('landing.menu.home') }}</a>
                </li>
                <li>
                    <a href="#how_to_work" class="sub-menu-item">{{ __('landing.menu.how_to_work') }}</a>
                </li>
                <li>
                    <a href="#feature" class="sub-menu-item">{{ __('landing.menu.feature') }}</a>
                </li>
                <li>
                    <a href="#test" class="sub-menu-item">{{ __('landing.menu.test') }}</a>
                </li>
                <li>
                    <a href="#about" class="sub-menu-item">{{ __('landing.menu.about') }}</a>
                </li>
                <li>
                    <a href="#contact" class="sub-menu-item">{{ __('landing.menu.contact') }}</a>
                </li>
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">
                        <i class="{{ $current_lang->icon }} mr-1"></i> {{ $current_lang->title }}
                    </a>
                    <span class="menu-arrow"></span>
                    <ul class="submenu">
                        @foreach($languages as $lang)
                            <li>
                                <a href="{{ route('locale.swap',['locale' => $lang->slug]) }}" class="sub-menu-item" data-language="{{ $lang->slug }}">
                                    <i class="{{ $lang->icon }}"></i> {{ $lang->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <div class="buy-menu-btn d-none">
                <a href="{{ route('login') }}"  class="btn btn-primary">{{ __('dashboard.login.title') }}</a>
            </div>
        </div>
    </div>
</header>

@php
    /**
    * @var \App\Models\Language $language
    */
    $languages = \App\Models\Language::all();
@endphp
<div class="nk-header nk-header-fixed is-light">
    <div class="container-lg wide-xl">
        <div class="nk-header-wrap">
            <div class="nk-header-brand">
                <a href="{{ route('main.index') }}" class="logo-link">
                    <img class="logo-light logo-img" src="{{ asset('images/logo_gettest.png') }}" srcset="{{ asset('images/logo_gettest.png') }} 2x" alt="logo">
                    <img class="logo-dark logo-img" src="{{ asset('images/logo_gettest.png') }}" srcset="{{ asset('images/logo_gettest.png') }} 2x" alt="logo-dark">
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-menu">
                <ul class="nk-menu nk-menu-main">
                    <li class="nk-menu-item">
                        <a href="{{ route('main.index') }}" class="nk-menu-link">
                            <span class="nk-menu-text">{{ __('landing.menu.home') }}</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('main.index') }}#how_to_work" class="nk-menu-link">
                            <span class="nk-menu-text">{{ __('landing.menu.how_to_work') }}</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('main.index') }}#feature" class="nk-menu-link">
                            <span class="nk-menu-text">{{ __('landing.menu.feature') }}</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('main.index') }}#test" class="nk-menu-link">
                            <span class="nk-menu-text">{{ __('landing.menu.test') }}</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('main.index') }}#about" class="nk-menu-link">
                            <span class="nk-menu-text">{{ __('landing.menu.about') }}</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('main.index') }}#contact" class="nk-menu-link">
                            <span class="nk-menu-text">{{ __('landing.menu.contact') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                        @forelse($languages as $language)
                            @if(app()->getLocale() == $language->slug)
                                <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                    <div class="quick-icon border border-light">
                                        <img class="icon" src="{{ asset('images/flags/'.$language->slug.'-sq.png') }}" alt="{{ $language->slug }}">
                                    </div>
                                </a>
                            @endif
                        @empty
                            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                <div class="quick-icon border border-light">
                                    <img class="icon" src="{{ asset('images/flags/english-sq.png') }}" alt="">
                                </div>
                            </a>
                        @endforelse
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
                            <ul class="language-list">
                                @forelse($languages as $language)
                                    @if(app()->getLocale() != $language->slug)
                                        <li>
                                            <a href="{{ route('locale.swap',['locale' => $language->slug]) }}" class="language-item">
                                                <img src="{{ asset('images/flags/'.$language->slug.'.png') }}" alt="{{ $language->slug }}" class="language-flag">
                                                <span class="language-name">{{ $language->title }}</span>
                                            </a>
                                        </li>
                                    @endif
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    @if(is_null(auth()->user()->image))
                                        <i class="icon ni ni-user"></i>
                                    @else
                                        <img src="{{ asset(auth()->user()->image) }}" alt="avatar">
                                    @endif
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        @if(is_null(auth()->user()->image))
                                            <i class="icon ni ni-user"></i>
                                        @else
                                            <img src="{{ asset(auth()->user()->image) }}" alt="avatar">
                                        @endif
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{ auth()->user()->name }}</span>
                                        <span class="sub-text text-soft">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    @if(auth()->user()->type == \App\Support\Enums\RoleEnum::ORGANIZATION)
                                        <li>
                                            <a href="{{ route('dashboard.organization.edit',['organization' => auth()->user()->organization_id]) }}">
                                                <em class="icon ni ni-user-alt"></em>
                                                <span>{{ __('menu.view_profile') }}</span>
                                            </a>
                                        </li>
                                    @elseif(auth()->user()->type == \App\Support\Enums\RoleEnum::USER)
                                        <li>
                                            <a href="{{ route('dashboard.user.edit',['user' => auth()->user()->id]) }}">
                                                <em class="icon ni ni-user-alt"></em>
                                                <span>{{ __('menu.view_profile') }}</span>
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('dashboard.system.user.edit',['user' => auth()->user()->id]) }}">
                                                <em class="icon ni ni-user-alt"></em>
                                                <span>{{ __('menu.view_profile') }}</span>
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="#">
                                            <em class="icon ni ni-activity-alt"></em>
                                            <span>{{ __('menu.login_activity') }}</span>
                                        </a>
                                    </li>
                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                                            <em class="icon ni ni-signout"></em>
                                            <span>{{ __('menu.logout') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="d-lg-none">
                        <a href="#" class="toggle nk-quick-nav-icon me-n1" data-target="sideNav"><em class="icon ni ni-menu"></em></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@php
    /**
    * @var \App\Models\Language $language
    * @var \App\Models\Application $application
    */
    $languages = \App\Models\Language::all();
    $applications = \App\Models\Application::take(5)->get();
@endphp
<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-app-name">
                <div class="nk-header-app-logo">
                    <em class="icon ni ni-dashlite bg-purple-dim"></em>
                </div>
                <div class="nk-header-app-info">
                    <span class="sub-text">{{ config('app.name') }}</span>
                    <span class="lead-text">{{ __('navbar.sub_title') }}</span>
                </div>
            </div>

            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown notification-dropdown">
                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                            <div class="dropdown-head">
                                <span class="sub-title nk-dropdown-title">{{ __('main.application.index') }}</span>
                            </div>
                            <div class="dropdown-body">
                                <div class="nk-notification">
                                    @forelse($applications as $application)
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-icon">
                                                <em class="icon icon-circle bg-info-dim ni ni-edit"></em>
                                            </div>
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text">
                                                    {{ $application->first_name }} {{ $application->last_name }}<br>
                                                    <small>{{ $application->region->title }}</small>
                                                </div>
                                                <div class="nk-notification-time">{{ $application->created_at->format('H:i d.m.Y') }}</div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-icon">
                                                <em class="icon icon-circle bg-primary-dim ni ni-cross-c"></em>
                                            </div>
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text">
                                                    <h6>{{ __('main.application.empty') }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="dropdown-foot center">
                                <a href="{{ route('dashboard.application.index') }}">{{ __('action.view_all') }}</a>
                            </div>
                        </div>
                    </li>
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
                                                <span>{{ __('navbar.view_profile') }}</span>
                                            </a>
                                        </li>
                                    @elseif(auth()->user()->type == \App\Support\Enums\RoleEnum::USER)
                                        <li>
                                            <a href="{{ route('dashboard.user.edit',['user' => auth()->user()->id]) }}">
                                                <em class="icon ni ni-user-alt"></em>
                                                <span>{{ __('navbar.view_profile') }}</span>
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('dashboard.system.user.edit',['user' => auth()->user()->id]) }}">
                                                <em class="icon ni ni-user-alt"></em>
                                                <span>{{ __('navbar.view_profile') }}</span>
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="#">
                                            <em class="icon ni ni-activity-alt"></em>
                                            <span>{{ __('navbar.activity') }}</span>
                                        </a>
                                    </li>
                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()" >
                                            <em class="icon ni ni-signout"></em>
                                            <span>{{ __('navbar.logout') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="nk-apps-sidebar is-dark">
    <div class="nk-apps-brand">
        <a href="#" class="logo-link">
            <img class="logo-light logo-img" src="{{ asset('images/logo-small.png') }}"
                 srcset="{{ asset('images/logo-small2x.png') }} 2x" alt="logo">
            <img class="logo-dark logo-img" src="{{ asset('images/logo-dark-small.png') }}"
                 srcset="{{ asset('images/logo-dark-small2x.png') }} 2x" alt="logo-dark">
        </a>
    </div>
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-body">
            <div class="nk-sidebar-content" data-simplebar>
                <div class="nk-sidebar-menu">
                    <!-- Menu -->
                    <ul class="nk-menu apps-menu">
                        <li class="nk-menu-item">
                            <a href="{{ route('dashboard.index') }}" class="nk-menu-link"
                               title="{{ __('menu.dashboard') }}">
                                <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            </a>
                        </li>
                        @hasanyrole(\App\Support\Enums\RoleEnum::SUPER_ADMIN)
                        <li class="nk-menu-hr"></li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link" title="{{ __('menu.quiz') }}">
                                <span class="nk-menu-icon"><em class="icon ni ni-template"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link" title="Sales Dashboard">
                                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link" title="Crypto Dashboard">
                                <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link" title="Invest Dashboard">
                                <span class="nk-menu-icon"><em class="icon ni ni-invest"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-hr"></li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link" title="Mailbox">
                                <span class="nk-menu-icon"><em class="icon ni ni-inbox"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link" title="Messages">
                                <span class="nk-menu-icon"><em class="icon ni ni-chat"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link" title="File Manager">
                                <span class="nk-menu-icon"><em class="icon ni ni-folder"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link" title="Chats">
                                <span class="nk-menu-icon"><em class="icon ni ni-chat-circle"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link" title="Calendar">
                                <span class="nk-menu-icon"><em class="icon ni ni-calendar"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-template"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-hr"></li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link" title="Go to Components">
                                <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                            </a>
                        </li>
                        @endhasanyrole

                    </ul>
                </div>
                <div class="nk-sidebar-footer">
                    <ul class="nk-menu nk-menu-md">
                        @hasanyrole(\App\Support\Enums\RoleEnum::SUPER_ADMIN)
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link" title="Settings">
                                <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                            </a>
                        </li>
                        @endhasanyrole
                    </ul>
                </div>
            </div>
            <div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown">
                <a href="#" data-bs-toggle="dropdown" data-offset="50,-60">
                    <div class="user-avatar">
                        @if(is_null(auth()->user()->image))
                            <i class="icon ni ni-user"></i>
                        @else
                            <img src="{{ asset(auth()->user()->image) }}" alt="avatar">
                        @endif
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-md ms-4">
                    <div class="dropdown-inner user-card-wrap d-none d-md-block">
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
                            <li>
                                <a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown-inner">
                        <ul class="link-list">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                                    <em class="icon ni ni-signout"></em>
                                    <span>{{ __('navbar.logout') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-md"
     data-content="userAside"
     data-toggle-screen="md"
     data-toggle-overlay="true"
     data-toggle-body="true">
    <div class="card-inner-group" data-simplebar>
        <div class="card-inner">
            <div class="user-card user-card-s2">
                <div class="user-avatar lg bg-primary">
                    @if($user->image)
                        <img src="{{ asset($user->image) }}" alt="">
                    @else
                        <span class="text-uppercase">{{ $user->username[0].$user->username[1] }}</span>
                    @endif
                </div>
                <div class="user-info">
                    <div class="badge bg-outline-light rounded-pill ucap">
                        {{ $user->role_name }}
                    </div>
                    <h5>{{ ($user->profile) ? $user->profile->full_name : __('action.no_info') }}</h5>
                    <span class="sub-text">{{ $user->email }}</span>
                </div>
            </div>
        </div>
        <div class="card-inner card-inner-sm">
            <ul class="btn-toolbar justify-center gx-1">
                <li>
                    <a href="{{ route('Profile.payment') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('action.payment') }}" class="btn btn-trigger btn-icon text-primary">
                        <em class="icon ni ni-wallet-in"></em>
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-inner">
            <div class="overline-title-alt mb-2">{{ __('page.user.sidebar.balance') }}</div>
            <div class="profile-balance d-flex justify-center">
                <div class="profile-balance-group gx-4">
                    <div class="profile-balance-sub">
                        <div class="profile-balance-amount">
                            <div class="number">{!! __('main.user.balance_currency', ['value' => $user->balance]) !!}</div>
                        </div>
                        <div class="profile-balance-subtitle">
                            <a href="{{ route('Profile.payment') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('action.payment') }}" class="btn btn-trigger btn-icon text-primary btn-lg">
                                <em class="icon ni ni-wallet-in"></em>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-inner">
            <div class="row text-center">
                <div class="col-4">
                    <div class="profile-stats">
                        <span class="amount">{{ $user->total_quizzes }}</span>
                        <span class="sub-text">{{ __('page.user.sidebar.quizzes') }}</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="profile-stats">
                        <span class="amount">{{ $user->total_reports }}</span>
                        <span class="sub-text">{{ __('page.user.sidebar.reports') }}</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="profile-stats">
                        <span class="amount">{{ $user->total_purchased }}</span>
                        <span class="sub-text">{{ __('page.user.sidebar.purchased') }}</span>
                    </div>
                </div>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <h6 class="overline-title-alt mb-2">{{ __('page.user.personal.additional') }}</h6>
            <div class="row g-3">
                <div class="col-6">
                    <span class="sub-text">{{ __('main.user.id') }}</span>
                    <span class="bold">{{ $user->id }}</span>
                </div>
                <div class="col-6">
                    <span class="sub-text">{{ __('main.user.created_at') }}:</span>
                    <span>{{ $user->created_at->format('H:i d.m.Y') }}</span>
                </div>
                <div class="col-6">
                    <span class="sub-text">{{ __('main.user.status') }}:</span>
                    <span class="lead-text">
                                                    @if($user->is_banned)
                            <em class="icon ni ni-cross-fill-c text-danger"></em>
                            <span class="text-danger">{{ $user->step }}</span>
                        @elseif(!$user->status)
                            <em class="icon ni ni-alert-fill-c text-warning"></em>
                            <span class="text-warning">{{ $user->step }}</span>
                        @else
                            <em class="icon ni ni-check-fill-c text-success"></em>
                            <span class="text-success">{{ $user->step }}</span>
                        @endif
                                                </span>
                </div>
                <div class="col-6">
                    <span class="sub-text">{{ __('main.user.updated_at') }}:</span>
                    <span>{{ $user->updated_at->format('H:i d.m.Y') }}</span>
                </div>
            </div>
        </div>
        {{--                                    <div class="card-inner">--}}
        {{--                                        <h6 class="overline-title-alt mb-3">Groups</h6>--}}
        {{--                                        <ul class="g-1">--}}
        {{--                                            <li class="btn-group">--}}
        {{--                                                <a class="btn btn-xs btn-light btn-dim" href="#">investor</a>--}}
        {{--                                                <a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a>--}}
        {{--                                            </li>--}}
        {{--                                            <li class="btn-group">--}}
        {{--                                                <a class="btn btn-xs btn-light btn-dim" href="#">support</a>--}}
        {{--                                                <a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a>--}}
        {{--                                            </li>--}}
        {{--                                            <li class="btn-group">--}}
        {{--                                                <a class="btn btn-xs btn-light btn-dim" href="#">another tag</a>--}}
        {{--                                                <a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a>--}}
        {{--                                            </li>--}}
        {{--                                        </ul>--}}
        {{--                                    </div>--}}
    </div>
</div>

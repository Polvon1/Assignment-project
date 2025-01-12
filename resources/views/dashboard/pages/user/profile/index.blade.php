@php
/**
 * @var \App\Models\User $user
 *
*/
@endphp
@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ __('main.user.index') }} / <strong class="text-primary small"> {{ $user->username }}</strong></h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    <li>{{ __('main.user.id') }}: <span class="text-base">{{ $user->id }}</span></li>
                                    <li>{{ __('main.user.created_at') }}: <span class="text-base">{{ $user->updated_at->format('H:i d.m.Y') }}</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{ route('dashboard.user.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                                <em class="icon ni ni-arrow-left"></em>
                                <span>{{ __('action.back') }}</span>
                            </a>
                            <a href="{{ route('dashboard.user.index') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">
                                <em class="icon ni ni-arrow-left"></em>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">
                                            <em class="icon ni ni-user-circle"></em>
                                            <span>{{ __('page.user.personal.menu') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <em class="icon ni ni-repeat"></em>
                                            <span>{{ __('page.user.transaction.menu') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <em class="icon ni ni-file-text"></em>
                                            <span>{{ __('page.user.quiz.menu') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <em class="icon ni ni-folder-list"></em>
                                            <span>{{ __('page.user.report.menu') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <em class="icon ni ni-bell"></em>
                                            <span>{{ __('page.user.notification.menu') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <em class="icon ni ni-activity"></em>
                                            <span>{{ __('page.user.activity.menu') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item nav-item-trigger d-xxl-none">
                                        <a href="{{ route('dashboard.user.edit',['user' => $user->id]) }}"
                                           class="btn btn-icon"
                                           data-bs-toggle="tooltip"
                                           data-bs-placement="top"
                                           title="{{ __('action.edit') }}"
                                        >
                                            <em class="icon ni ni-user-list-fill"></em>
                                        </a>
                                    </li>
                                </ul>
                                <div class="card-inner">
                                    <div class="nk-block">
                                        <div class="nk-block-head">
                                            <div class="nk-block-between d-flex justify-content-between">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title">{{ __('page.user.personal.title') }}</h4>
                                                    <div class="nk-block-des">
                                                        <p>{{ __('page.user.personal.sub_title') }}</p>
                                                    </div>
                                                </div>
                                                <div class="nk-tab-actions me-n1">
                                                    <a href="{{ route('dashboard.user.edit',['user' => $user->id]) }}" class="btn btn-icon btn-trigger">
                                                        <em class="icon ni ni-edit"></em>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">{{ __('main.user.username') }}</span>
                                                    <span class="profile-ud-value">{{ $user->username }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">{{ __('main.user.passport') }}</span>
                                                    <span class="profile-ud-value">{{ $user->document_number ?? __('action.no_info') }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">{{ __('main.user.email') }}</span>
                                                    <span class="profile-ud-value">
                                                    {{ $user->email }}
                                                        @if(is_null($user->email_verified_at))
                                                            <i class="icon ni ni-cross-circle text-danger"></i>
                                                        @else
                                                            <i class="icon ni ni-check-circle text-success"></i>
                                                        @endif</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">{{ __('main.user.full_name') }}</span>
                                                    <span class="profile-ud-value">{{ $user->name ?? __('action.no_info') }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">{{ __('main.user.phone') }}</span>
                                                    <span class="profile-ud-value">
                                                        {{ $user->phone }}
                                                        @if(is_null($user->phone_verified_at))
                                                            <i class="icon ni ni-cross-circle text-danger"></i>
                                                        @else
                                                            <i class="icon ni ni-check-circle text-success"></i>
                                                        @endif
                                                </span>
                                                </div>
                                            </div>
                                            {{--                                        <div class="Profile-ud-item">--}}
                                            {{--                                            <div class="Profile-ud wider">--}}
                                            {{--                                                <span class="Profile-ud-label">Email Address</span>--}}
                                            {{--                                                <span class="Profile-ud-value">info@softnio.com</span>--}}
                                            {{--                                            </div>--}}
                                            {{--                                        </div>--}}
                                        </div>
                                    </div>
                                    <div class="nk-block">
                                        <div class="nk-block-head nk-block-head-line">
                                            <h6 class="title overline-title text-base">{{ __('page.user.personal.additional') }}</h6>
                                        </div>
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">{{ __('main.user.region') }}</span>
                                                    <span class="profile-ud-value">{{ ($user->region_id) ? str($user->region->title)->ucfirst() : __('action.no_info') }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">{{ __('main.user.address') }}</span>
                                                    <span class="profile-ud-value">{{  $user->address ?? __('action.no_info') }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">{{ __('main.user.district') }}</span>
                                                    <span class="profile-ud-value">{{ ($user->district_id) ? str($user->district->title)->ucfirst() : __('action.no_info') }}</span>
                                                </div>
                                            </div>
                                            {{--                                        <div class="Profile-ud-item">--}}
                                            {{--                                            <div class="Profile-ud wider">--}}
                                            {{--                                                <span class="Profile-ud-label">Nationality</span>--}}
                                            {{--                                                <span class="Profile-ud-value">United State</span>--}}
                                            {{--                                            </div>--}}
                                            {{--                                        </div>--}}
                                        </div>
                                    </div>
                                    @if($user->organization_id)
                                        <div class="nk-block">
                                            <div class="nk-block-head nk-block-head-line">
                                                <h6 class="title overline-title text-base">{{ __('page.user.personal.organization') }}</h6>
                                            </div>
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">{{ __('main.user.organization') }}</span>
                                                        <span class="profile-ud-value">{{ ($user->organization_id) ? $user->organization->name : __('action.no_info') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl" data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true" data-toggle-body="true">
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
                                                <h5>{{ $user->name ?? __('action.no_info') }}</h5>
                                                <span class="sub-text">{{ $user->email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner card-inner-sm">
                                        <ul class="btn-toolbar justify-center gx-1">
                                            <li>
                                                <a href="{{ route('dashboard.user.attach',['user' => $user->id]) }}"
                                                   class="btn btn-trigger btn-icon"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="top"
                                                   title="{{ __('action.attach') }}"
                                                >
                                                    <em class="icon ni ni-clip"></em>
                                                </a>
                                            </li>
                                            <li><a href="mailto:{{ $user->email }}" class="btn btn-trigger btn-icon"><em class="icon ni ni-mail"></em></a></li>
                                            <li>
                                                <a href="{{ route("dashboard.user.edit",['user' => $user->id]) }}"
                                                   class="btn btn-trigger btn-icon"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="top"
                                                   title="{{ __('action.edit') }}">
                                                    <em class="icon ni ni-edit"></em>
                                                </a>
                                            </li>
                                            <li><a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('action.ban') }}" class="btn btn-trigger btn-icon text-danger"><em class="icon ni ni-na"></em></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-inner">
                                        <div class="row text-center">
                                            <div class="col-4">
                                                <div class="profile-stats">
                                                    <span class="amount">{{ $user->total_quizzes ?? 0 }}</span>
                                                    <span class="sub-text">{{ __('page.user.sidebar.quizzes') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="profile-stats">
                                                    <span class="amount">{{ $user->total_reports ?? 0 }}</span>
                                                    <span class="sub-text">{{ __('page.user.sidebar.reports') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="profile-stats">
                                                    <span class="amount">{{ $user->total_purchased ?? 0 }}</span>
                                                    <span class="sub-text">{{ __('page.user.sidebar.exams') }}</span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

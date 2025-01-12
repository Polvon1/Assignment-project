@php
    /**
     * @var \App\Models\User $user
     *
    */
@endphp
@extends('profile.layouts.app')

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
                                    <li>{{ __('main.user.created_at') }}: <span class="text-base">{{ $user->created_at->format('H:i d.m.Y') }}</span></li>
                                </ul>
                            </div>
                        </div>
{{--                        <div class="nk-block-head-content">--}}
{{--                            <a href="{{ route('dashboard.user.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">--}}
{{--                                <em class="icon ni ni-arrow-left"></em>--}}
{{--                                <span>{{ __('action.back') }}</span>--}}
{{--                            </a>--}}
{{--                            <a href="{{ route('dashboard.user.index') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">--}}
{{--                                <em class="icon ni ni-arrow-left"></em>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                @include('profile.layouts.inc.profile-menu',['active' => 'Profile'])
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
                                                    <a href="{{ route('Profile.edit') }}" class="btn btn-icon btn-trigger">
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
                                                    <span class="profile-ud-value">{{ $user->profile->passport ?? __('action.no_info') }}</span>
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
                                                    <span class="profile-ud-value">{{ $user->profile->full_name ?? __('action.no_info') }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">{{ __('main.user.phone') }}</span>
                                                    <span class="profile-ud-value">
                                                    +{{ $user->phone }}
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
                                                    <span class="profile-ud-value">{{ ($user->profile) ? $user->profile->address : __('action.no_info') }}</span>
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
                            @include('profile.layouts.inc.profile-aside')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

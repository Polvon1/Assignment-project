@php
    /**
    * @var \App\Models\User $user
    * @var \App\Models\Quiz $quiz
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
                            <h3 class="nk-block-title page-title">{{ __('main.user.index') }} / <strong
                                    class="text-primary small"> {{ $user->username }}</strong></h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    <li>{{ __('main.user.id') }}: <span class="text-base">{{ $user->id }}</span></li>
                                    <li>{{ __('main.user.created_at') }}: <span
                                            class="text-base">{{ $user->created_at->format('H:i d.m.Y') }}</span></li>
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
                                @include('profile.layouts.inc.profile-menu',['active' => 'quiz'])
                                <div class="card-inner">
                                    <div class="container">
                                        <div class="nk-content-inner">
                                            <div class="nk-content-body">
                                                <div class="nk-block-head nk-block-head-sm">
                                                    <div class="nk-block-between g-3">
                                                        <div class="nk-block-head-content">
                                                            <h3 class="nk-block-title page-title">{{ __('main.quiz.index') }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-block">
                                                    <div class="row g-gs">
                                                        @forelse($quizzes as $quiz)
                                                            <div class="col-xxl-4 col-md-6 col-sm-6 col-12">
                                                                <div class="card card-bordered pricing">
                                                                    @if($quiz->is_paid)
                                                                        <span class="pricing-badge badge bg-primary">
                                                                            {{ __('action.paid') }}
                                                                        </span>
                                                                    @endif
                                                                    <div class="pricing-head mt-1">
                                                                        <div class="pricing-title">
                                                                            <h6 class="card-title title">{{ $quiz->title }}</h6>
                                                                            <p class="sub-text">
                                                                                {{ $quiz->category->title }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="card-text">
                                                                            <div class="row">
                                                                                <div class="col-12 mb-1">
                                                                                    <ul class="rating text-warning d-flex justify-center">
                                                                                        @for($i = 1; $i <= $quiz->difficulty->level; $i++)
                                                                                            <li><em class="icon ni ni-star-fill"></em></li>
                                                                                        @endfor
                                                                                        @for($i = 1; $i <= \App\Models\Difficulty::count() - $quiz->difficulty->level; $i++)
                                                                                            <li><em class="icon ni ni-star"></em></li>
                                                                                        @endfor
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="col-12 mb-3">
                                                                                   <span>
                                                                                        <em class="{{ $quiz->language->icon }}"></em> {{ $quiz->language->title }}
                                                                                   </span>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <span class="h4 fw-500">{!! __('main.quiz.card.time_data', ['value' => $quiz->duration]) !!}</span>
                                                                                    <span
                                                                                        class="sub-text">{{ __('main.quiz.duration') }}</span>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <span class="h4 fw-500">{{ $quiz->questions()->count() }}</span>
                                                                                    <span class="sub-text">{{ __('main.quiz.card.question') }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pricing-body">
                                                                        <ul class="pricing-features">
                                                                            <li>
                                                                                <span class="w-50">{{ __('main.quiz.card.mark') }}</span>
                                                                                -
                                                                                <span class="ms-auto">{{ $quiz->mark }}</span>
                                                                            </li>
                                                                            <li>
                                                                                <span class="w-50">
                                                                                    {{ __('main.quiz.start') }}</span>
                                                                                -
                                                                                <span class="ms-auto">
                                                                                    @if($quiz->start)
                                                                                        {{ $quiz->start->format('H:i d.m.Y') }}
                                                                                    @else
                                                                                        <em class="fas fa-infinity"></em>
                                                                                    @endif
                                                                                </span>
                                                                            </li>
                                                                            <li>
                                                                                <span class="w-50">{{ __('main.quiz.finish') }}</span>
                                                                                -
                                                                                <span class="ms-auto">
                                                                                     @if($quiz->finish)
                                                                                        {{ $quiz->finish->format('H:i d.m.Y') }}
                                                                                    @else
                                                                                        <em class="fas fa-infinity"></em>
                                                                                    @endif
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="pricing-action">
                                                                            <a href="{{ route('quiz.show',['quiz' => $quiz->id ]) }}" class="btn btn-outline-light">
                                                                                <em class="icon ni ni-eye me-1"></em> {{ __('action.view') }}
                                                                            </a>
{{--                                                                            <button class="btn btn-outline-light">--}}
{{--                                                                                {{ __('action.view') }}--}}
{{--                                                                            </button>--}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @empty
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

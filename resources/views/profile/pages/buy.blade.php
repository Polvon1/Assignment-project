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
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                @include('profile.layouts.inc.profile-menu',['active' => 'null'])
                                <div class="card-inner">
                                    <div class="container">
                                        <div class="nk-content-inner">
                                            <div class="nk-content-body">
                                                <div class="nk-block-head nk-block-head-sm">
                                                    <div class="nk-block-between g-3">
                                                        <div class="nk-block-head-content">
                                                            <h3 class="nk-block-title page-title">{{ __('main.quiz.buy') }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-block">
                                                    <div class="row g-gs">
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
                                                        <div class="col-xxl-8 col-md-6 col-sm-6 col-12">
                                                            <div>
                                                                <div class="product-info mt-5 me-xxl-5">
                                                                    <h4 class="product-price text-primary">{{ __('main.quiz.price_currency', ['value' => $quiz->price]) }}</h4>
                                                                    <h2 class="product-title">{{ $quiz->title }}</h2>
                                                                    <div class="product-excrept text-soft">
                                                                        <p class="lead">{{ $quiz->description }}</p>
                                                                    </div>
{{--                                                                    <div class="product-meta">--}}
{{--                                                                        <ul class="d-flex g-3 gx-5">--}}
{{--                                                                            <li>--}}
{{--                                                                                <div class="fs-14px text-muted">Type</div>--}}
{{--                                                                                <div class="fs-16px fw-bold text-secondary">Watch</div>--}}
{{--                                                                            </li>--}}
{{--                                                                            <li>--}}
{{--                                                                                <div class="fs-14px text-muted">Model Number</div>--}}
{{--                                                                                <div class="fs-16px fw-bold text-secondary">Forerunner 290XT</div>--}}
{{--                                                                            </li>--}}
{{--                                                                        </ul>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="product-meta">--}}
{{--                                                                        <h6 class="title">Color</h6>--}}
{{--                                                                        <ul class="custom-control-group">--}}
{{--                                                                            <li>--}}
{{--                                                                                <div class="custom-control color-control">--}}
{{--                                                                                    <input type="radio" class="custom-control-input" id="productColor1" name="productColor" checked>--}}
{{--                                                                                    <label class="custom-control-label dot dot-xl" data-bg="#754c24" for="productColor1"></label>--}}
{{--                                                                                </div>--}}
{{--                                                                            </li>--}}
{{--                                                                            <li>--}}
{{--                                                                                <div class="custom-control color-control">--}}
{{--                                                                                    <input type="radio" class="custom-control-input" id="productColor2" name="productColor">--}}
{{--                                                                                    <label class="custom-control-label dot dot-xl" data-bg="#636363" for="productColor2"></label>--}}
{{--                                                                                </div>--}}
{{--                                                                            </li>--}}
{{--                                                                            <li>--}}
{{--                                                                                <div class="custom-control color-control">--}}
{{--                                                                                    <input type="radio" class="custom-control-input" id="productColor3" name="productColor">--}}
{{--                                                                                    <label class="custom-control-label dot dot-xl" data-bg="#ba6ed4" for="productColor3"></label>--}}
{{--                                                                                </div>--}}
{{--                                                                            </li>--}}
{{--                                                                            <li>--}}
{{--                                                                                <div class="custom-control color-control">--}}
{{--                                                                                    <input type="radio" class="custom-control-input" id="productColor4" name="productColor">--}}
{{--                                                                                    <label class="custom-control-label dot dot-xl" data-bg="#ff87a3" for="productColor4"></label>--}}
{{--                                                                                </div>--}}
{{--                                                                            </li>--}}
{{--                                                                        </ul>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="product-meta">--}}
{{--                                                                        <h6 class="title">Size</h6>--}}
{{--                                                                        <ul class="custom-control-group">--}}
{{--                                                                            <li>--}}
{{--                                                                                <div class="custom-control custom-radio custom-control-pro no-control">--}}
{{--                                                                                    <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck1" checked>--}}
{{--                                                                                    <label class="custom-control-label" for="sizeCheck1">XS</label>--}}
{{--                                                                                </div>--}}
{{--                                                                            </li>--}}
{{--                                                                            <li>--}}
{{--                                                                                <div class="custom-control custom-radio custom-control-pro no-control">--}}
{{--                                                                                    <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck2">--}}
{{--                                                                                    <label class="custom-control-label" for="sizeCheck2">SM</label>--}}
{{--                                                                                </div>--}}
{{--                                                                            </li>--}}
{{--                                                                            <li>--}}
{{--                                                                                <div class="custom-control custom-radio custom-control-pro no-control">--}}
{{--                                                                                    <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck3">--}}
{{--                                                                                    <label class="custom-control-label" for="sizeCheck3">L</label>--}}
{{--                                                                                </div>--}}
{{--                                                                            </li>--}}
{{--                                                                            <li>--}}
{{--                                                                                <div class="custom-control custom-radio custom-control-pro no-control">--}}
{{--                                                                                    <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck4">--}}
{{--                                                                                    <label class="custom-control-label" for="sizeCheck4">XL</label>--}}
{{--                                                                                </div>--}}
{{--                                                                            </li>--}}
{{--                                                                        </ul>--}}
{{--                                                                    </div>--}}
                                                                    <form action="{{ route('Profile.buy.store',['quiz' => $quiz->id]) }}" method="POST">
                                                                        @csrf
                                                                        <div class="product-meta">
                                                                            <ul class="d-flex flex-wrap align-center g-2 pt-1">
                                                                                <li>
                                                                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                                                                        <em class="icon ni ni-cart me-1"></em> {{ __('action.buy') }}
                                                                                    </button>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
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

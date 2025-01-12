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
                                                            <h3 class="nk-block-title page-title">{{ __('payment.title') }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-block">
                                                    <form action="{{ route('Profile.payment.store') }}" method="POST" class="row g-gs">
                                                        @csrf
                                                        <div class="col-12">
                                                            <h5 class="nk-block-title">{{ __('payment.select_amount') }}</h5>
                                                            <ul class="custom-control-group">
                                                                <li>
                                                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                        <input type="radio" class="custom-control-input" name="amount" id="amount_btn1" value="10000">
                                                                        <label class="custom-control-label" for="amount_btn1">{{ __('main.quiz.price_currency', ['value' => number_format(10000)]) }}</label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                        <input type="radio" class="custom-control-input" name="amount" id="amount_btn2" value="20000">
                                                                        <label class="custom-control-label" for="amount_btn2">{{ __('main.quiz.price_currency', ['value' => number_format(20000)]) }}</label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                        <input type="radio" class="custom-control-input" name="amount" id="amount_btn3" value="30000">
                                                                        <label class="custom-control-label" for="amount_btn3">{{ __('main.quiz.price_currency', ['value' => number_format(30000)]) }}</label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                        <input type="radio" class="custom-control-input" name="amount" id="amount_btn4" value="50000">
                                                                        <label class="custom-control-label" for="amount_btn4">{{ __('main.quiz.price_currency', ['value' => number_format(50000)]) }}</label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                        <input type="radio" class="custom-control-input" name="amount" id="amount_btn5" value="100000">
                                                                        <label class="custom-control-label" for="amount_btn5">{{ __('main.quiz.price_currency', ['value' => number_format(100000)]) }}</label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                        <input type="radio" class="custom-control-input" name="amount" id="amount_btn6" value="200000">
                                                                        <label class="custom-control-label" for="amount_btn6">{{ __('main.quiz.price_currency', ['value' => number_format(200000)]) }}</label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-12">
                                                            <h5 class="nk-block-title">{{ __('payment.inout_amount') }}</h5>
                                                            <x-html.input-component name="amount" type="number" label="{{ __('payment.inout_amount') }}" size="lg" :pattern="'min=1000'" :required="false"/>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('action.payment') }}
                                                            </button>
                                                        </div>
                                                    </form>
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

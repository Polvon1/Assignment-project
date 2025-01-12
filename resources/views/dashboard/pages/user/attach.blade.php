@php
/**
 * @var \App\Models\Quiz $quiz
 * @var \App\Models\User $user
*/
@endphp
@extends('dashboard.layouts.app')

@section('title',__('main.user.edit'))

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ __('main.quiz.index') }}</h3>
                            <div class="nk-block-des text-soft">
                                <p>{{ __('action.attach') }}</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <a href="{{ route('dashboard.user.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                                            <em class="icon ni ni-arrow-left"></em>
                                            <span>{{ __('action.back') }}</span>
                                        </a>
                                        <a href="{{ route('dashboard.user.index') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">
                                            <em class="icon ni ni-arrow-left"></em>
                                        </a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @livewire('attach-quiz-component',compact('user'))
            </div>
        </div>
    </div>
@endsection

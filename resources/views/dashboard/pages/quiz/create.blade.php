@php
    /**
    * @var \App\Models\Difficulty $difficulty
    * @var \App\Models\Language $language
    * @var \App\Models\Category $category
    */
@endphp

@extends('dashboard.layouts.app')

@section('title',__('main.quiz.add'))

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ __('main.quiz.add') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    @livewire('quiz-create-component')
                </div>
            </div>
        </div>
    </div>
@endsection

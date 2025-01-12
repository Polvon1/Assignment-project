@php
    /**
    * @var \App\Models\Difficulty $difficulty
    * @var \App\Models\Language $language
    * @var \App\Models\Category $category
    */
@endphp

@extends('dashboard.layouts.app')

@section('title',__('main.question.add'))

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ __('main.question.add') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <form action="{{ route('dashboard.quiz.question.store',['quiz' => $quiz->id]) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 col-sm-7 col-12">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner">
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <x-html.summernote-component
                                                    name="title"
                                                    :required="true"
                                                    label="{{ __('main.question.title') }}"
                                                />
                                            </div>
                                            <div class="col-md-12 col-sm-12 mb-3">
                                                <x-html.input-component
                                                    name="a"
                                                    size="lg"
                                                    label="{{ __('main.question.a') }}"
                                                    :required="true"
                                                    type-input="V"/>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mb-3">
                                                <x-html.input-component
                                                    name="b"
                                                    size="lg"
                                                    label="{{ __('main.question.b') }}"
                                                    :required="true"
                                                    type-input="V"/>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mb-3">
                                                <x-html.input-component
                                                    name="c"
                                                    size="lg"
                                                    label="{{ __('main.question.c') }}"
                                                    :required="true"
                                                    type-input="V"/>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mb-3">
                                                <x-html.input-component
                                                    name="d"
                                                    size="lg"
                                                    label="{{ __('main.question.d') }}"
                                                    :required="true"
                                                    type-input="V"/>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mb-3">
                                                <x-html.input-component
                                                    name="answer_explain"
                                                    size="lg"
                                                    label="{{ __('main.question.answer_explain') }}"
                                                    :required="true"
                                                    type-input="V"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-5 col-12">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner">
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <h5>
                                                    {{ __('main.question.answer') }}
                                                    @error('answer')
                                                        <small class="text-danger text-center">
                                                           <i class="icon ni ni-na"></i>  {{ __('main.question.choose_correct_answer') }}
                                                        </small>
                                                    @enderror
                                                </h5>
                                                <ul class="custom-control-group custom-control-vertical w-100">
                                                    <li>
                                                        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                            <input type="radio" class="custom-control-input" @if("a" == old('answer')) checked @endif name="answer" id="answer_a" value="a">
                                                            <label class="custom-control-label" for="answer_a">
                                                                <span class="mx-2">{{ __('main.question.a') }}</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                            <input type="radio" class="custom-control-input" @if("b" == old('answer')) checked @endif name="answer" id="answer_b" value="b">
                                                            <label class="custom-control-label" for="answer_b">
                                                                <span class="mx-2">{{ __('main.question.b') }}</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                            <input type="radio" class="custom-control-input" @if("c" == old('answer')) checked @endif name="answer" id="answer_c" value="c">
                                                            <label class="custom-control-label" for="answer_c">
                                                                <span class="mx-2">{{ __('main.question.c') }}</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                            <input type="radio" class="custom-control-input" @if("d" == old('answer')) checked @endif name="answer" id="answer_d" value="d">
                                                            <label class="custom-control-label" for="answer_d">
                                                                <span class="mx-2">{{ __('main.question.d') }}</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-12 d-flex justify-end my-3">
                                                <div class="form-group mt-2">
                                                    <button type="submit" class="btn btn-lg btn-primary">
                                                        <i class="icon ni ni-plus-circle me-3"></i>
                                                        {{ __('action.add') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/editors/summernote.css') }}">
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/libs/editors/summernote.js') }}"></script>
    <script src="{{ asset('assets/js/editors.js') }}"></script>
@endsection

@php
    /**
     * @var $category \App\Models\Category
     * @var $quiz \App\Models\Quiz
    */
@endphp

@extends('landing.layouts.app')

@section('content')
    <!-- Hero Start -->
    <section class="bg-half bg-primary d-table w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="title text-white font-weight-bold"> {{ __('landing.category.title') }} </h4>
                        <p class="text-white para-desc mb-0 mx-auto">{{ __('landing.category.start_testing') }}</p>
                        @isset($breadcrumbs)
                            <div class="page-next">
                                <nav aria-label="breadcrumb" class="d-inline-block">
                                    <ul class="breadcrumb bg-white rounded shadow mb-0">
                                        @foreach($breadcrumbs as $breadcrumb)
                                            @if(isset($breadcrumb['link']))
                                                <li class="breadcrumb-item"><a href="{{ $breadcrumb['link'] }}">{!! $breadcrumb['name'] !!}</a></li>
                                            @else
                                                <li class="breadcrumb-item active" aria-current="page">{!! $breadcrumb['name'] !!}</li>
                                            @endisset
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- Shape Start -->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!--Shape End-->

    <section class="section mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 filters-group-wrap">
                    <div class="filters-group mb-5">
                        <ul class="container-filter list-inline mb-0 filter-options text-center">
                            <li class="list-inline-item categories-name border text-dark rounded active" data-group="all">
                                {{ __('main.quiz.index') }}
                            </li>
                            @forelse($categories as $category)
                                <li class="list-inline-item categories-name border text-dark rounded " data-group="{{ $category->id }}">
                                    {{ $category->title }}
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div id="grid" class="row">
                @forelse($categories as $category)
                    @forelse($category->quizzes as $quiz)
                        <div class="col-md-4 col-sm-6 col-12 pt-2 mb-4 picture-item" data-groups='["{{$category->id}}"]'>
                            @livewire('quiz-card-component',['key' => $quiz->id,'quiz' => $quiz,'category' => $category])
                        </div>
                    @empty
                    @endforelse
                @empty
                    <div class="text-center col-12 my-4">
                        <h1>
                            <i class="feather icon-x-circle text-danger"></i>
                        </h1>
                        <h1 class="text-secondary">
                            {{ __('main.quiz.no_quizzes') }}
                        </h1>
                        <p class="text-secondary">
                            {{ __('main.quiz.soon_added') }}
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection


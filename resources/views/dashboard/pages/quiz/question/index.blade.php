@php
    /**
    * @var \App\Models\Quiz $quiz
    * @var \App\Models\Language $language
    * @var \App\Models\Question $question
    */
@endphp

@extends('dashboard.layouts.app')

@section('title',__('main.question.index')." | " . $quiz->title )

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ __('main.quiz.index') }} / <strong
                                    class="text-primary small"> {{ str($quiz->title)->limit(50) }}</strong></h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    <li>{{ __('main.quiz.id') }}: <span class="text-base">{{ $quiz->id }}</span></li>
                                    <li>{{ __('main.quiz.created_at') }}: <span
                                            class="text-base">{{ $quiz->created_at->format('H:i d.m.Y') }}</span></li>
                                    <li>{{ __('main.quiz.created_by') }}: <span
                                            class="text-base">{{ $quiz->createdBy->username }}</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{ route('dashboard.quiz.index') }}"
                               class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                                <em class="icon ni ni-arrow-left"></em>
                                <span>{{ __('action.back') }}</span>
                            </a>
                            <a href="{{ route('dashboard.quiz.index') }}"
                               class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">
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
                                            <em class="icon ni ni-list"></em>
                                            <span>{{ __('page.quiz.question.menu') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <em class="icon ni ni-file-text"></em>
                                            <span>{{ __('page.quiz.report.menu') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <em class="icon ni ni-users"></em>
                                            <span>{{ __('page.quiz.user.menu') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item nav-item-trigger d-xxl-none">
                                        <a href="{{ route('dashboard.quiz.question.create',['quiz' => $quiz->id]) }}"
                                           class="btn btn-icon"
                                           data-bs-toggle="tooltip"
                                           data-bs-placement="top"
                                           title="{{ __('main.question.add') }}"
                                        >
                                            <em class="icon ni ni-plus-circle"></em>
                                        </a>
                                    </li>
                                </ul>
                                <div class="card-inner">
                                    <div class="nk-tb-list nk-tb-ulist">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div
                                                    class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid">
                                                    <label class="custom-control-label" for="uid"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-xxl">
                                                <span class="sub-text">{{ __('main.question.title') }}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="sub-text">{{ __('main.question.answer') }}</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools text-end"></div>
                                        </div>
                                        @foreach($quiz->questions as $question)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col nk-tb-col-check">
                                                    <div
                                                        class="custom-control custom-control-sm custom-checkbox notext">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="uid{{ $question->id }}">
                                                        <label class="custom-control-label"
                                                               for="uid{{ $question->id }}"></label>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col tb-col-xxl">
                                                    <div class="text-ellipsis w-max-200px">
                                                        {!! $question->title !!}
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span>{{ $question->answer }}</span>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        @can('edit.quiz')
                                                            <li class="nk-tb-action-hidden">
                                                                <a href="{{ route('dashboard.quiz.question.edit',['quiz' => $quiz->id,'question' => $question->id]) }}"
                                                                   class="btn btn-trigger btn-icon"
                                                                   data-bs-placement="top"
                                                                   title="{{ __('action.edit') }}">
                                                                    <em class="icon ni ni-edit-fill"></em>
                                                                </a>
                                                            </li>
                                                        @endcan
                                                        @can('delete.quiz')
                                                            <li class="nk-tb-action-hidden">
                                                                <a href="#"
                                                                   onclick="event.preventDefault();document.getElementById('deleteQuestion{{$question->id}}').submit();"
                                                                   class="btn btn-trigger btn-icon"
                                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                                   title="{{ __('action.delete') }}">
                                                                    <em class="icon ni ni-trash-fill"></em>
                                                                </a>
                                                            </li>
                                                        @endcan
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#"
                                                                   class="dropdown-toggle btn btn-icon btn-trigger"
                                                                   data-bs-toggle="dropdown"><em
                                                                        class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        @can('edit.quiz')
                                                                            <li>
                                                                                <a href="{{ route('dashboard.quiz.question.edit',['quiz' => $quiz->id,'question' => $question->id]) }}">
                                                                                    <em class="icon ni ni-edit-fill"></em>
                                                                                    <span>{{ __('action.edit') }}</span>
                                                                                </a>
                                                                            </li>
                                                                        @endcan
                                                                        @can('delete.quiz')
                                                                            <li>
                                                                                <a href="#"
                                                                                   onclick="event.preventDefault();document.getElementById('deleteQuestion{{ $question->id}}').submit();">
                                                                                    <em class="icon ni ni-trash-fill"></em>
                                                                                    <span>{{ __('action.delete') }}</span>
                                                                                </a>
                                                                            </li>
                                                                        @endcan
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div
                                class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-md"
                                data-content="userAside" data-toggle-screen="md" data-toggle-overlay="true"
                                data-toggle-body="true">
                                <div class="card-inner-group" data-simplebar>
                                    <div class="card-inner">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg bg-primary">
                                                <img src="{{ asset("images/flags/".$quiz->language->slug."-sq.png") }}"
                                                     alt="">
                                            </div>
                                            <div class="user-info">
                                                <ul class="rating text-warning d-flex justify-center">
                                                    @for($i = 1; $i <= $quiz->difficulty->level; $i++)
                                                        <li><em class="icon ni ni-star-fill"></em></li>
                                                    @endfor
                                                    @for($i = 1; $i <= \App\Models\Difficulty::count() - $quiz->difficulty->level; $i++)
                                                        <li><em class="icon ni ni-star"></em></li>
                                                    @endfor
                                                </ul>
                                                <h6 class="mt-3">
                                                    {{ $quiz->title }}
                                                </h6>
                                                <span class="sub-text">
                                                    {{ $quiz->category->title }}
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->
                                    <div class="card-inner card-inner-sm">
                                        <ul class="btn-toolbar justify-center gx-1">
                                            @can('edit.quiz')
                                                <li>
                                                    <a href="{{ route('dashboard.quiz.edit',['quiz' => $quiz->id]) }}"
                                                       class="btn btn-trigger btn-icon"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="{{ __('action.edit') }}"
                                                    >
                                                        <em class="icon ni ni-edit"></em>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('view.report')
                                                <li>
                                                    <a href="#"
                                                       class="btn btn-trigger btn-icon"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="{{ __('action.show_report') }}">
                                                        <em class="icon ni ni-list"></em>
                                                    </a>
                                                </li>
                                            @endcan

                                        </ul>
                                    </div>

                                    <div class="card-inner">
                                        <div class="row text-center">
                                            <div class="col-4">
                                                <div class="profile-stats">
                                                    <span class="amount">{{ $quiz->questions()->count() }}</span>
                                                    <span class="sub-text">{{ __('main.question.index') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="profile-stats">
                                                    <span class="amount">{{ 0 }}</span>
                                                    <span class="sub-text">{{ __('main.quiz.exams') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="profile-stats">
                                                    <span class="amount">{{ 0 }}</span>
                                                    <span class="sub-text">{{ __('main.quiz.report') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <span class="sub-text">{{ __('main.quiz.start') }}:</span>
                                                <span class="bold">
                                                    @if($quiz->start)
                                                        <i class="fas fa-clock"></i>
                                                        <small>{{ $quiz->start->format('H:i d.m.Y') }}</small><br>
                                                    @else
                                                        <i class='fas fa-infinity'></i>
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="col-6">
                                                <span class="sub-text">{{ __('main.quiz.finish') }}:</span>
                                                <span class="bold">
                                                    @if($quiz->finish)
                                                        <i class="fas fa-clock"></i>
                                                        <small>{{ $quiz->finish->format('H:i d.m.Y') }}</small><br>
                                                    @else
                                                        <i class='fas fa-infinity'></i>
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="col-6">
                                                <span class="sub-text">{{ __('main.quiz.duration') }}:</span>
                                                <span>{{ __('main.quiz.duration_min', ['value' => $quiz->duration]) }}</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="sub-text">{{ __('main.quiz.mark') }}:</span>
                                                <span>{{ $quiz->mark }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner">
{{--                                        <h6 class="overline-title-alt mb-2">{{ __('page.user.personal.additional') }}</h6>--}}
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <span class="sub-text">{{ __('main.quiz.id') }}:</span>
                                                <span class="bold">{{ $quiz->id }}</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="sub-text">{{ __('main.quiz.created_at') }}</span>
                                                <span>{{ $quiz->created_at->format('H:i d.m.Y') }}</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="sub-text">{{ __('status.title') }}:</span>
                                                @if($quiz->is_public)
                                                    <span class="lead-text text-success">
                                                        <i class="icon ni ni-star-fill"></i>
                                                        {{ __('status.public') }}
                                                    </span>
                                                @else
                                                    <span class="lead-text text-danger">
                                                        <i class="icon ni ni-lock"></i>
                                                        {{ __('status.private') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-6">
                                                <span class="sub-text">{{ __('main.quiz.created_by') }}:</span>
                                                <span>{{ $quiz->createdBy->username }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner">
                                        <div class="row">
                                            <div class="col-12 my-4">
                                                <a href="{{ route('dashboard.quiz.question.create',['quiz' => $quiz->id]) }}"
                                                   class="btn btn-primary btn-lg d-grid">
                                                    <i class="fas fa-plus-circle"></i> {{ __('main.question.add') }}
                                                </a>
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
    </div>
    @foreach($quiz->questions as $question)
        <form action="{{ route('dashboard.quiz.question.destroy',['quiz' => $quiz->id,'question' => $question->id]) }}"
              method="POST" class="d-none" id="deleteQuestion{{ $question->id }}">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
@endsection



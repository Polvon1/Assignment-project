@php
    /**
    * @var \App\Models\Quiz $quiz
    */
@endphp
@extends('exam.layouts.main')

@section('aside')
    @include('exam.layouts.inc.aside')
@endsection

@section('content')
    <div class="nk-content-wrap">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">{{ __('main.quiz.index') }}</h3>
                    <div class="nk-block-des text-soft">
                        <p>{{ __('main.quiz.count_title') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="row g-gs">
                @forelse($quizzes as $quiz)
                    <div class="col-sm-6 col-xl-4">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="team">
                                    <div class="team-status bg-primary text-white p-3">
                                        <em class="icon ni ni-star-fill"></em>
                                    </div>
                                    <div class="team-options">
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-focus"></em><span>Quick View</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-mail"></em><span>Send Email</span></a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Pass</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset 2FA</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend User</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-card user-card-s2">
                                        <div class="user-avatar md bg-primary">
                                            <img src="{{ asset('images/flags/'.$quiz->language->slug.'-sq.png') }}" alt="">
                                        </div>
                                        <div class="user-info">
                                            <h6>{{ $quiz->title }}</h6>
                                            <span class="sub-text">{{ $quiz->category->title }}</span>
                                        </div>
                                    </div>
                                    <div class="team-details">
                                        <p>
                                            {{ $quiz->description }}
                                        </p>
                                    </div>
                                    <ul class="team-statistics">
                                        <li>
                                            <span>{{ $quiz->questions()->count() }}</span>
                                            <span>{{ __('quiz.card.question') }}</span>
                                        </li>
                                        <li>
                                            <span>{{ $quiz->price }}</span>
                                            <span><sup>UZS</sup></span>
                                            <span>{{ __('quiz.card.price') }}</span>
                                        </li>
                                        <li>
                                            <span>{{ $quiz->duration }}</span>
                                            <span>{{ __('main.quiz.duration') }}</span>
                                        </li>
                                    </ul>
                                    <div class="team-view">
                                        <a href="{{ route('quiz.show',['quiz' => $quiz->id]) }}" class="btn btn-round btn-outline-light w-150px">
                                            <span>{{ __('action.view') }}</span>
                                        </a>
                                    </div>
                                </div><!-- .team -->
                            </div><!-- .card-inner -->
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection

@php
    /**
     * @var \App\Models\Quiz $quiz
     * @var \App\Models\Language $lang
     * @var \App\DTOs\CheckExamResponseDTO $response
    */
@endphp

@extends('landing.layouts.app_without_footer')

@section('content')
    <!-- Hero Start -->
    <section class="bg-profile d-table w-100 bg-primary" style="background: url('{{ asset('frontend/images/account/bg.png') }}') center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card public-profile border-0 rounded shadow" style="z-index: 1;">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-md-3 text-md-start text-center">
                                    <div class="avatar avatar-large rounded-circle shadow d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('images/flags/'.$quiz->language->slug.'-sq.png') }}" class="img-fluid rounded-circle" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-7">
                                    <div class="row align-items-end">
                                        <div class="col-md-7 text-md-start text-center mt-4 mt-sm-0">
                                            <h5 class="title mb-0">{{ $quiz->title }}</h5>
                                            <small class="text-muted h6 me-2">
                                                {{ $quiz->category->title }}
                                            </small>
                                            <ul class="list-inline mb-0 mt-3">
                                                @for($i = 1; $i <= $quiz->difficulty->level; $i++)
                                                    <li class="list-inline-item"><em class="fas fa-star text-warning"></em></li>
                                                @endfor
                                                @for($i = 1; $i <= \App\Models\Difficulty::count() - $quiz->difficulty->level; $i++)
                                                    <li class="list-inline-item"><em class="fal fa-star text-warning"></em></li>
                                                @endfor
                                            </ul>
                                            <ul class="list-inline mb-0 mt-3">
                                                <li class="h6 list-inline-item mr-3">
                                                    <span class="text-primary h5 mr-2">
                                                        <i class="fal fa-calendar-check text-primary align-middle"></i>
                                                    </span>
                                                    @if($quiz->start)
                                                        <small>
                                                            {{ $quiz->start->format('H:i d.m.Y') }}
                                                        </small>
                                                    @else
                                                        {{ __('exam.any_time') }}
                                                    @endif
                                                </li>
                                                <li class="h6 list-inline-item  mx-3">
                                                    <span class="text-primary h5 mr-2">
                                                        <i class="fal fa-calendar-times text-primary align-middle"></i>
                                                    </span>
                                                    @if($quiz->finish)
                                                        <small>
                                                            {{ $quiz->finish->format('H:i d.m.Y') }}
                                                        </small>
                                                    @else
                                                        {{ __('exam.any_time') }}
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <div class="d-flex mb-4 justify-content-center mt-3 text-dark">
                                        <span class="price h1 mb-0 mx-2">{{ $quiz->price }}</span>
                                        <span class="h5 mb-0 mt-2 text-muted">{{ __('main.quiz.currency') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <!-- Profile Start -->
    <section class="section mt-60">
        <div class="container mt-lg-3">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="sidebar sticky-bar p-4 rounded shadow">
                        <div class="widget">
                            <h5 class="widget-title">{{ __('exam.total') }} :</h5>
                            <div class="row mt-4">
                                <div class="col-6 text-center">
                                    <i  class="fal fa-list fea icon-ex-md text-primary mb-1"></i>
                                    <h5 class="mb-0">{{ $quiz->questions->count() }}</h5>
                                    <p class="text-muted mb-0">{{ __('main.quiz.card.question') }}</p>
                                </div>

                                <div class="col-6 text-center">
                                    <i  class="fal fa-stars fea icon-ex-md text-primary mb-1"></i>
                                    <h5 class="mb-0">{{ $quiz->mark * $quiz->questions->count() }}</h5>
                                    <p class="text-muted mb-0">{{ __('exam.mark') }}</p>
                                </div>
                            </div>
                        </div>
                        @if($response->status === \App\DTOs\CheckExamResponseDTO::START)
                        @elseif($response->status === \App\DTOs\CheckExamResponseDTO::FINISH)
                            <div class="widget mt-4 pt-2">
                                <h5 class="widget-title">{{ __('exam.result') }}:</h5>
                                <div class="progress-box mt-2">
                                    <h6 class="title text-muted">{{ __('exam.answers') }}</h6>
                                    <div class="progress">
                                        <div class="progress-bar position-relative bg-primary" style="width:{{ $response->exam->mark * 100 / ($response->exam->quiz->mark * $response->exam->quiz->questions->count()) }}%;">
                                            <div class="progress-value d-block text-muted h6">{{ $response->exam->answers }} / {{ $response->exam->examQuestions->count() }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-box mt-5 mb-4">
                                    @php
                                        $percent = $response->exam->mark * 100 / ($response->exam->quiz->mark * $response->exam->examQuestions->count()) ?? 0
                                    @endphp
                                    <h6 class="title text-muted">{{ __('exam.total_mark') }} ({{ number_format($percent,2) }}%)</h6>
                                    <div class="progress">
                                        <div  class="progress-bar position-relative
                                            @if($percent < 55)
                                            bg-danger
                                            @elseif($percent >= 55 and $percent < 70)
                                            bg-warning
                                            @elseif($percent >= 70 and $percent < 85)
                                            bg-success
                                            @elseif($percent >= 85)
                                            bg-primary
                                            @else
                                            bg-danger
                                            @endif
                                            " style="width:{{ $response->exam->mark * 100 / ($response->exam->quiz->mark * $response->exam->quiz->questions->count()) }}%;">
                                            <div class="progress-value d-block text-muted h6">{{ $response->exam->answers * $response->exam->quiz->mark }} / {{ $response->exam->examQuestions->count() * $response->exam->quiz->mark  }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="border-bottom pb-4 pt-3 ">
                        <div class="row align-items-center">
                            <div class="col-2 text-center">
                                <i class="feather icon-info fa-3x text-primary"></i>
                            </div>
                            <div class="col-10">
                                <h5>{{ __('exam.hint.title') }}</h5>
                                <p class="text-muted mb-0">
                                    {{ __('exam.hint.description') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom pb-4">
                        <div class="row">
                            <div class="col-md-12 mt-4 pt-2 pt-sm-0">
                                @if($response->status !== \App\DTOs\CheckExamResponseDTO::NEW)
                                    @if($response->status === \App\DTOs\CheckExamResponseDTO::START)
                                        <a href="{{ route('exam.app',['exam' => $response->exam->token]) }}" class="btn btn-lg btn-primary btn-block">
                                            {{ __('action.continue') }}
                                        </a>
                                    @else
                                        @if($quiz->show_answer)
                                            <div class="text-center">
                                                @php
                                                    $percent = $response->exam->mark * 100 / ($response->exam->quiz->mark * $response->exam->examQuestions->count()) ?? 0
                                                @endphp
                                                @if($percent < 55)
                                                    <h1 class="text-danger">{{ number_format($percent,2) }} %</h1>
                                                    <h4 class="text-danger">{{ __('quiz.55') }}</h4>
                                                @elseif($percent >= 55 and $percent < 70)
                                                    <h1 class="text-warning">{{ number_format($percent,2) }} %</h1>
                                                    <h4 class="text-warning">{{ __('quiz.70') }}</h4>
                                                @elseif($percent >= 70 and $percent < 85)
                                                    <h1 class="text-success">{{ number_format($percent,2) }} %</h1>
                                                    <h4 class="text-success">{{ __('quiz.85') }}</h4>
                                                @elseif($percent >= 85)
                                                    <h1 class="text-primary">{{ number_format($percent,2) }} %</h1>
                                                    <h4 class="text-primary">{{ __('quiz.100') }}</h4>
                                                @else
                                                    <h1 class="text-danger">{{ number_format($percent,2) }} %</h1>
                                                    <h4 class="text-danger">{{ __('action.no_info') }}</h4>
                                                @endif
                                            </div>
                                            <hr/>
                                            <div class="text-center">
                                                <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="collapse" data-bs-target="#quiz_result" aria-expanded="false" aria-controls="collapseExample">
                                                    {{ __('exam.show_answer') }}
                                                </button>
                                            </div>
                                            <div class="collapse accordion mt-4 pt-2" id="quiz_result">
                                                @foreach($response->exam->examQuestions as $examQuestion)
                                                    <div class="accordion-item rounded mb-2">
                                                        <h2 class="accordion-header" id="heading_{{$loop->index}}">
                                                            <button class="accordion-button align-items-start border-0 bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$loop->index}}" aria-expanded="false" aria-controls="collapseTwo">
                                                                <i class="feather @if($examQuestion->is_correct) icon-check-circle text-success @else icon-x-circle text-danger @endif" style="margin-right: 10px; margin-top: 5px;"></i>
                                                                <div class="accordion-title">
                                                                    {!! $examQuestion->question->title !!}
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse_{{$loop->index}}" class="accordion-collapse border-0 collapse" aria-labelledby="heading_{{$loop->index}}" data-bs-parent="#quiz_result" style="">
                                                            <div class="accordion-body text-muted bg-white">
                                                                <div class="mb-2">
                                                                    <strong>{{ __('exam.your_answer') }}:</strong>
                                                                    <p class="m-0">
                                                                        {{ (!is_null($examQuestion->answer)) ? $examQuestion->question->getOptions()[$examQuestion->answer] : __('exam.no_answer') }}
                                                                    </p>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <strong>{{ __('exam.correct_answer') }}:</strong>
                                                                    <p class="m-0">
                                                                        {{ $examQuestion->question->getOptions()[$examQuestion->correct_answer] }}
                                                                    </p>
                                                                    <br/>
                                                                    <em>{{ __('main.question.answer_explain') }}:</em>
                                                                    <div class="font-italic">
                                                                        <em>
                                                                            {{ $examQuestion->question->answer_explain }}
                                                                        </em>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="text-center">
                                                @php
                                                    $percent = $response->exam->mark * 100 / ($response->exam->quiz->mark * $response->exam->examQuestions->count()) ?? 0
                                                @endphp
                                                @if($percent < 55)
                                                    <h1 class="text-danger">{{ number_format($percent,2) }} %</h1>
                                                    <h4 class="text-danger">{{ __('quiz.55') }}</h4>
                                                @elseif($percent >= 55 and $percent < 70)
                                                    <h1 class="text-warning">{{ number_format($percent,2) }} %</h1>
                                                    <h4 class="text-warning">{{ __('quiz.70') }}</h4>
                                                @elseif($percent >= 70 and $percent < 85)
                                                    <h1 class="text-success">{{ number_format($percent,2) }} %</h1>
                                                    <h4 class="text-success">{{ __('quiz.85') }}</h4>
                                                @elseif($percent >= 85)
                                                    <h1 class="text-primary">{{ number_format($percent,2) }} %</h1>
                                                    <h4 class="text-primary">{{ __('quiz.100') }}</h4>
                                                @else
                                                    <h1 class="text-danger">{{ number_format($percent,2) }} %</h1>
                                                    <h4 class="text-danger">{{ __('action.no_info') }}</h4>
                                                @endif
                                            </div>
                                        @endif
                                    @endif
                                @else
                                    @can('view',$quiz)
{{--                                        <h5>{{ __('exam.language') }} :</h5>--}}
                                        @if($quiz->is_public and !(bool)auth()->user()->paid($quiz))
                                           @can('buy',$quiz)
                                                <div class="col-12 mt-3 text-center">
                                                    <a href="{{ route('Profile.buy',['quiz' => $quiz->id]) }}" class="btn btn-primary btn-lg">
                                                        <em class="fas fa-cart me-1"></em> {{ __('action.start') }}
                                                    </a>
                                                </div>
                                           @endcan
                                        @else
                                        <form action="{{ route('exam.start') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                                            <div class="col-12 mt-3 text-center">
                                                @if(!is_null($quiz->start))
                                                    @if (now()->format('Y-m-d H:i:s') > $quiz->start->format('Y-m-d H:i:s') && now()->format('Y-m-d H:i:s') <= $quiz->finish->format('Y-m-d H:i:s'))
                                                        <button @if($quiz->questions()->count() > 0) type="submit" class="btn btn-primary btn-lg" @else type="button" class="btn btn-outline-danger btn-lg" disabled @endif>
                                                            {{ __('action.start') }}
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-danger btn-lg" disabled>
                                                            {{ __('exam.not_active') }}
                                                        </button>
                                                    @endif
                                                @else
                                                    <button @if($quiz->questions()->count() > 0) type="submit" class="btn btn-primary btn-lg" @else type="button" class="btn btn-outline-danger btn-lg" disabled @endif>
                                                        {{ __('action.start') }}
                                                    </button>
                                                @endif
                                            </div>
                                        </form>
                                        @endif
                                    @else
                                        <h2 class="text-center text-danger">
                                            <i class="feather icon-slash"></i>
                                        </h2>
                                        <h3 class="text-danger text-center">
                                            {{ __('exam.access.not') }}
                                        </h3>
                                        <p class="text-danger text-center" style="opacity: 0.7;">
                                            {{ __('exam.access.contact') }}
                                        </p>
                                    @endcan
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


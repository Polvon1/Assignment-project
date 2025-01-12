@php
    /**
    * @var \App\Models\Quiz $quiz
    * @var \App\Models\Category $category
    */
@endphp

<div class="card pricing-rates business-rate shadow bg-white border-0 rounded">
    <div class="ribbon ribbon-right @if($quiz->is_paid) ribbon-primary  @else ribbon-warning @endif overflow-hidden">
        <span class="text-center d-block shadow small h6">
            <i class="feather icon-star"></i>
        </span>
    </div>
    <div class="card-body">
        <h6 class="title fw-bold text-uppercase text-primary mb-4">
            <div style="height: 80px;">{{ $quiz->title }}</div>
            <br>
            @if($category)
                <sub class="text-secondary">{{ $quiz->category->title }}</sub>
            @endif
        </h6>
        <div class="d-flex mb-4 justify-content-center">
            <span class="h4 mb-0 mt-2"><i class="fal fa-stopwatch"></i></span>
            <span class="price h1 mb-0 mx-2">{{ $quiz->duration }}</span>
            <span class="h4 align-self-end mb-1">{{ __('main.quiz.card.minutes') }}</span>
        </div>
        <ul class="list-unstyled mb-0 ps-0">
            <li class="h6 text-muted mb-0">
                <span class="text-primary h5 me-2">
                    <i class="{{ $quiz->language->icon }} align-middle"></i>
                </span>
                {{ $quiz->language->title }}
            </li>
            <li class="h6 text-muted mb-0 text-lowercase">
                <span class="text-primary h5 me-2">
                    <i class="far fa-star align-middle"></i>
                </span>
                {{ $quiz->mark }} {{ __('main.quiz.card.mark') }}
            </li>
            <li class="h6 text-muted mb-0 text-lowercase">
                <span class="text-primary h5 me-2">
                    <i class="far fa-star align-middle"></i>
                </span>
                {{ $quiz->mark * $quiz->questions->count()}} {{ __('main.quiz.card.question') }}
            </li>

            <li class="h6 text-muted mb-0">
                <span class="text-primary h5 me-2">
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
            <li class="h6 text-muted mb-0">
                <span class="text-primary h5 me-2">
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
        <div class="d-flex mb-4 justify-content-center mt-3">
            <span class="price h1 mb-0 mx-2">{{ $quiz->price }}</span>
            <span class="h5 mb-0 mt-2">{{ __('main.quiz.currency') }}</span>
        </div>
        <div class="text-center">
            <a href="{{ route('quiz.show',['quiz' => $quiz->id]) }}" class="btn btn-primary mt-2"><i class="fas fa-eye me-1"></i>{{ __('action.view') }}</a>
            @can('buy',$quiz)
                <a href="{{ route('Profile.buy',['quiz' => $quiz->id]) }}" class="btn btn-outline-primary mt-2"><i class="fas fa-shopping-cart me-1"></i>{{ __('action.buy') }}</a>
            @endcan
        </div>
    </div>
</div>

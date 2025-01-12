<div class="nk-block">
    <div class="row g-gs mb-5">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="form-group">
                <label class="form-label" for="search">{{ __('action.search') }}</label>
                <input
                    id="search"
                    type="search"
                    class="form-control form-control-lg"
                    placeholder="{{ __('action.search') }}"
                    wire:model.debounce="search"
                />
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="form-group">
                <label class="form-label" for="categoryFilter">{{ __('main.quiz.category') }}</label>
                <select
                    wire:model="category_filter"
                    id="categoryFilter"
                    placeholder="{{ __('filter.all.category') }}"
                    class="form-control form-control-lg">
                    <option value="0">{{ __('filter.all.category') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="form-group">
                <label class="form-label" for="difficultyFilter">{{ __('main.quiz.difficulty') }}</label>
                <select
                    wire:model="difficulty_filter"
                    id="difficultyFilter"
                    placeholder="{{ __('filter.all.difficulty') }}"
                    class="form-control form-control-lg">
                    <option value="0">{{ __('filter.all.difficulty') }}</option>
                    @foreach($difficulties as $difficulty)
                        <option value="{{ $difficulty->id }}">{{ $difficulty->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="form-group">
                <label class="form-label" for="languageFilter">{{ __('main.quiz.language') }}</label>
                <select
                    wire:model="language_filter"
                    id="languageFilter"
                    placeholder="{{ __('filter.all.language') }}"
                    class="form-control form-control-lg">
                    <option value="0">{{ __('filter.all.language') }}</option>
                    @foreach($languages as $language)
                        <option value="{{ $language->id }}">{{ $language->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row g-gs">
        @forelse($quizzes as $quiz)
            <div class="col-sm-6 col-lg-4 col-xxl-3">
                <div class="card card-bordered h-100">
                    <div class="card-inner">
                        <div class="project">
                            <div class="project-head">
                                <span class="project-title">
                                    <div class="user-avatar sq bg-purple">
                                        <span>{{ str($quiz->language->slug)->upper() }}</span>
                                    </div>
                                    <div class="project-info">
                                        <h6 class="title">{{ $quiz->title }}</h6>
                                        <span class="sub-text">{{ $quiz->category->title }}</span>
                                    </div>
                                </span>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 me-n1"
                                       data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li>
                                                <a href="{{ route('dashboard.quiz.show',['quiz' => $quiz->id]) }}">
                                                    <em class="icon ni ni-eye"></em><span>{{ __('action.show') }}</span></a></li>
{{--                                            <li><a href="#"><em--}}
{{--                                                        class="icon ni ni-edit"></em><span>Edit Project</span></a></li>--}}
{{--                                            <li><a href="#"><em--}}
{{--                                                        class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a>--}}
{{--                                            </li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="project-progress">
                                <div class="project-progress-details">
                                    <span class="badge badge-dim bg-light text-gray">
                                        <span>
                                            @if($quiz->start)
                                                <i class="icon ni ni-clock"></i>
                                                <small>{{ $quiz->start->format('H:i d.m.Y') }}</small><br>
                                                <i class="icon ni ni-clock"></i>
                                                <small>{{ $quiz->finish->format('H:i d.m.Y') }}</small>
                                            @else
                                                <i class='fas fa-infinity'></i>
                                            @endif
                                        </span>
                                    </span>
                                    <div class="project-progress-task">
                                        <em class="icon ni ni-check-round-cut"></em>
                                        <span>{{ $quiz->questions()->count() }} {{ __('main.question.index') }}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="row my-3">
                                <div class="col-md-12 justify-center">
                                    @if($this->user->quizzes()->where('quiz_id',$quiz->id)->count() > 0)
                                        <button type="button" wire:click="detach({{ $quiz->id }})"
                                                class="btn btn-danger btn-lg btn-round">
                                            <i class="icon ni ni-bookmark-fill"></i>
                                            {{ __('action.detach') }}
                                        </button>
                                    @else
                                        <button type="button" wire:click="attach({{ $quiz->id }})"
                                                class="btn btn-primary btn-lg btn-round">
                                            <i class="icon ni ni-bookmark"></i>
                                            {{ __('action.attach') }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</div>

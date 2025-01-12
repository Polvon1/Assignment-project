<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">{{ __('main.quiz.index') }} </h3>
                        <div class="nk-block-des text-soft">
                            <p>{{ __('main.quiz.total', ['value' => $quizzes->total()]) }}</p>
                        </div>
                    </div>
                    <div class="nk-block-head-content">
                        @can('create.quiz')
                            <a href="{{ route('dashboard.quiz.create') }}" class="btn btn-icon btn-primary d-md-none">
                                <em class="icon ni ni-plus"></em>
                            </a>
                            <a href="{{ route('dashboard.quiz.create') }}"
                               class="btn btn-primary d-none d-md-inline-flex">
                                <em class="icon ni ni-plus"></em>
                                <span>{{ __('main.quiz.add') }}</span>
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="card card-bordered card-stretch">
                    <div class="card-inner-group">
                        <div class="card-inner position-relative card-tools-toggle">
                            <div class="card-title-group">
                                <div class="card-tools">
                                    {{--                                    <div class="form-inline flex-nowrap gx-3">--}}
                                    {{--                                        <div class="form-wrap w-150px">--}}
                                    {{--                                            <select class="form-select js-select2" data-search="off" data-placeholder="Bulk Action">--}}
                                    {{--                                                <option value="">Bulk Action</option>--}}
                                    {{--                                                <option value="edit">Edit</option>--}}
                                    {{--                                                <option value="delete">Move To Trash</option>--}}
                                    {{--                                            </select>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="btn-wrap">--}}
                                    {{--                                            <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled">Apply</button></span>--}}
                                    {{--                                            <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div><!-- .form-inline -->--}}
                                </div>
                                <div class="card-tools me-n1">
                                    <ul class="btn-toolbar gx-1">
                                        <li>
                                            <a href="#" class="btn btn-icon search-toggle toggle-search"
                                               data-target="search">
                                                <em class="icon ni ni-search"></em>
                                            </a>
                                        </li>
                                        <li class="btn-toolbar-sep"></li>
                                        <li>
                                            <div class="toggle-wrap">
                                                <a href="#" class="btn btn-icon btn-trigger toggle"
                                                   data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                <div class="toggle-content" data-content="cardTools">
                                                    <ul class="btn-toolbar gx-1">
                                                        <li class="toggle-close">
                                                            <a href="#" class="btn btn-icon btn-trigger toggle"
                                                               data-target="cardTools"><em
                                                                    class="icon ni ni-arrow-left"></em></a>
                                                        </li>
                                                        <li>
                                                            <div class="dropdown">
                                                                <a href="#"
                                                                   class="btn btn-trigger btn-icon dropdown-toggle"
                                                                   data-bs-toggle="dropdown">
                                                                    <div class="dot dot-primary"></div>
                                                                    <em class="icon ni ni-filter-alt"></em>
                                                                </a>
                                                                <div
                                                                    class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                                    <div class="dropdown-head">
                                                                        <span
                                                                            class="sub-title dropdown-title">{{ __('filter.index') }}</span>
                                                                        <div class="dropdown">
                                                                            <a href="#" class="btn btn-sm btn-icon">
                                                                                <em class="icon ni ni-more-h"></em>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown-body dropdown-body-rg">
                                                                        <div class="row gx-6 gy-3">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="overline-title overline-title-alt"
                                                                                        for="filter_difficulty">{{ __('main.quiz.difficulty') }}</label>
                                                                                    <select class="form-select"
                                                                                            id="filter_difficulty"
                                                                                            wire:model="difficulty_filter">
                                                                                        <option
                                                                                            value="0">{{ __('filter.all.difficulty') }}</option>
                                                                                        @foreach($difficulties as $difficulty)
                                                                                            <option
                                                                                                value="{{ $difficulty->id }}">{{ $difficulty->title }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="overline-title overline-title-alt"
                                                                                        for="filter_category">{{ __('main.category.index') }}</label>
                                                                                    <select class="form-select"
                                                                                            id="filter_category"
                                                                                            wire:model="category_filter">
                                                                                        <option
                                                                                            value="0">{{ __('filter.all.category') }}</option>
                                                                                        @foreach($categories as $category)
                                                                                            <option
                                                                                                value="{{ $category->id }}">{{ $category->title }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="overline-title overline-title-alt"
                                                                                        for="filter_language">{{ __('main.language.index') }}</label>
                                                                                    <select class="form-select"
                                                                                            id="filter_language"
                                                                                            wire:model="language_filter">
                                                                                        <option
                                                                                            value="0">{{ __('filter.all.language') }}</option>
                                                                                        @foreach($languages as $language)
                                                                                            <option
                                                                                                value="{{ $language->id }}">{{ $language->title }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="overline-title overline-title-alt"
                                                                                        for="is_public_filter">{{ __('status.index') }}</label>
                                                                                    <select class="form-select"
                                                                                            id="is_public_filter"
                                                                                            wire:model="is_public_filter">
                                                                                        <option
                                                                                            value="-1">{{ __('filter.all.status') }}</option>
                                                                                        <option
                                                                                            value="0">{{ __('status.private') }}</option>
                                                                                        <option
                                                                                            value="1">{{ __('status.public') }}</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            {{--                                                                            <div class="col-12">--}}
                                                                            {{--                                                                                <div class="form-group">--}}
                                                                            {{--                                                                                    <button type="button" class="btn btn-secondary">{{__('main.action.filter')}}</button>--}}
                                                                            {{--                                                                                </div>--}}
                                                                            {{--                                                                            </div>--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown-foot between">
                                                                        <a class="clickable" href="#"
                                                                           wire:click="clearFilter">{{__('filter.reset')}}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="dropdown">
                                                                <a href="#"
                                                                   class="btn btn-trigger btn-icon dropdown-toggle"
                                                                   data-bs-toggle="dropdown">
                                                                    <em class="icon ni ni-setting"></em>
                                                                </a>
                                                                <div
                                                                    class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                                    <ul class="link-check">
                                                                        <li><span>{{ __('action.show') }}</span></li>
                                                                        <li @if($perPage == 10) class="active" @endif>
                                                                            <a href="#"
                                                                               wire:click.prevent="setPerPage({{ 10 }})">10</a>
                                                                        </li>
                                                                        <li @if($perPage == 15) class="active" @endif>
                                                                            <a href="#"
                                                                               wire:click.prevent="setPerPage({{ 15 }})">15</a>
                                                                        </li>
                                                                        <li @if($perPage == 20) class="active" @endif>
                                                                            <a href="#"
                                                                               wire:click.prevent="setPerPage({{ 20 }})">20</a>
                                                                        </li>
                                                                    </ul>
                                                                    <ul class="link-check">
                                                                        <li><span>Order</span></li>
                                                                        <li @if($sortDirection == 'asc') class="active" @endif>
                                                                            <a href="#"
                                                                               wire:click.prevent="setSortDirection('asc')">{{ __('filter.asc') }}</a>
                                                                        </li>
                                                                        <li @if($sortDirection == 'desc') class="active" @endif>
                                                                            <a href="#"
                                                                               wire:click.prevent="setSortDirection('desc')">{{ __('filter.desc') }}</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-search search-wrap" data-search="search">
                                <div class="card-body">
                                    <div class="search-content">
                                        <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em
                                                class="icon ni ni-arrow-left"></em></a>
                                        <input type="text" class="form-control border-transparent form-focus-none"
                                               placeholder="{{__('action.search')}}" wire:model.debounce.750ms="search">
                                        <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em>
                                        </button>
                                    </div>
                                </div>
                            </div><!-- .card-search -->
                        </div><!-- .card-inner -->
                        <div class="card-inner p-0">
                            <div class="nk-tb-list nk-tb-ulist">
                                <div class="nk-tb-item nk-tb-head">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="uid">
                                            <label class="custom-control-label" for="uid"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col"><span class="sub-text">{{ __('main.quiz.title') }}</span>
                                    </div>
                                    <div class="nk-tb-col"><span class="sub-text">{{ __('main.quiz.is_public') }}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-mb"><span
                                            class="sub-text">{{ __('main.quiz.language') }}</span></div>
                                    <div class="nk-tb-col tb-col-md"><span
                                            class="sub-text">{{ __('main.quiz.category') }}</span></div>
                                    <div class="nk-tb-col tb-col-lg"><span
                                            class="sub-text">{{ __('main.quiz.difficulty') }}</span></div>
                                    <div class="nk-tb-col tb-col-md"><span
                                            class="sub-text">{{ __('main.question.index') }}</span></div>

                                    <div class="nk-tb-col tb-col-xxl"><span
                                            class="sub-text">{{ __('main.quiz.duration') }}</span></div>
                                    <div class="nk-tb-col nk-tb-col-tools text-end"></div>
                                </div><!-- .nk-tb-item -->
                                @foreach($quizzes as $quiz)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="uid{{ $quiz->id }}">
                                                <label class="custom-control-label" for="uid{{ $quiz->id }}"></label>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span>{{ $quiz->title }}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span>
                                                @if($quiz->is_public)
                                                    <span class="badge badge-dim rounded-pill bg-primary badge-sm"
                                                          data-bs-toggle="tooltip" data-bs-placement="top"
                                                          title="{{ __('status.public') }}">
                                                        <i class="fas fa-star"></i>
                                                    </span>
                                                @else
                                                    <span class="badge badge-dim rounded-pill bg-danger badge-sm"
                                                          data-bs-toggle="tooltip" data-bs-placement="top"
                                                          title="{{ __('status.private') }}">
                                                        <i class="fas fa-lock"></i>
                                                    </span>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="nk-tb-col tb-col-mb">
                                            <i class="{{ $quiz->language->icon }}"></i>
                                            <span>{{ $quiz->language->title }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ $quiz->category->title }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg">
                                            <span>{{ $quiz->difficulty->title }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ $quiz->questions()->count() }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-xxl">
                                            <div class="text-center">
                                                <span
                                                    class="text-primary">{{ __('main.quiz.duration_min', ['value' => $quiz->duration]) }}</span>
                                            </div>
                                            @if(!is_null($quiz->start))
                                                <div class="text-center">
                                                    <i class="fas fa-clock"></i> {{ $quiz->start->format('d.m.Y H:i ') }}
                                                    <br>
                                                    <i class="fas fa-clock"></i> {{ $quiz->finish->format('d.m.Y H:i ') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                @can('view.quiz')
                                                    <li class="nk-tb-action-hidden">
                                                        <a href="{{ route('dashboard.quiz.show',['quiz' => $quiz->id ]) }}"
                                                           class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                                           data-bs-placement="top"
                                                           title="{{ __('main.question.index') }}">
                                                            <em class="icon ni ni-list-thumb-fill"></em>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('view.report')
                                                    <li class="nk-tb-action-hidden">
                                                        <a href="{{ route('dashboard.quiz.show',['quiz' => $quiz->id ]) }}"
                                                           class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                                           data-bs-placement="top"
                                                           title="{{ __('main.report.index') }}">
                                                            <em class="icon ni ni-star-fill"></em>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('edit.quiz')
                                                    <li class="nk-tb-action-hidden">
                                                        <a href="{{ route('dashboard.quiz.edit',['quiz' => $quiz->id ]) }}"
                                                           class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                                           data-bs-placement="top" title="{{ __('action.edit') }}">
                                                            <em class="icon ni ni-edit-fill"></em>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('delete.quiz')
                                                    <li class="nk-tb-action-hidden">
                                                        <a href="#" wire:click="deleteQuiz({{ $quiz }})"
                                                           class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                                           data-bs-placement="top" title="{{ __('action.delete') }}">
                                                            <em class="icon ni ni-trash-fill"></em>
                                                        </a>
                                                    </li>
                                                @endcan
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                           data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                @can('view.quiz')
                                                                    <li>
                                                                        <a href="{{ route('dashboard.quiz.show',['quiz' => $quiz->id]) }}">
                                                                            <em class="icon ni ni-list-thumb-fill"></em>
                                                                            <span>{{ __('main.question.index') }}</span>
                                                                        </a>
                                                                    </li>
                                                                @endcan
                                                                @can('view.report')
                                                                    <li>
                                                                        <a href="{{ route('dashboard.quiz.show',['quiz' => $quiz->id]) }}">
                                                                            <em class="icon ni ni-star-fill"></em>
                                                                            <span>{{ __('main.report.index') }}</span>
                                                                        </a>
                                                                    </li>
                                                                @endcan
                                                                @can('edit.quiz')
                                                                    <li>
                                                                        <a href="{{ route('dashboard.quiz.edit',['quiz' => $quiz->id]) }}">
                                                                            <em class="icon ni ni-edit-fill"></em>
                                                                            <span>{{ __('action.edit') }}</span>
                                                                        </a>
                                                                    </li>
                                                                @endcan
                                                                @can('delete.quiz')
                                                                    <li>
                                                                        <a href="#"
                                                                           wire:click.prevent="deleteQuiz({{ $quiz }})">
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
                        <div class="card-inner">
                            <div class="nk-block-between-md g-3">
                                <div class="g">
                                    {!! $quizzes->links() !!}
                                </div>
                                <div class="g">
                                    <div
                                        class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                        <div>Page</div>
                                        <div>
                                            <select class="form-select" wire:model="perPage" data-search="on"
                                                    data-dropdown="xs center">
                                                @for($i = 1;$i<=20;$i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
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

<form action="{{ route('dashboard.quiz.update',['quiz' => $quiz->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-8 col-sm-7 col-12">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <hr>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <x-html.input-component
                                name="title"
                                size="lg"
                                :value="$quiz->title"
                                label="{{ __('main.quiz.title') }}"
                                :required="true"
                                type-input="S"/>
                        </div>
                        <div class="col-md-6 col-sm-6 mb-3">
                            <x-html.input-component
                                name="mark"
                                size="lg"
                                type="number"
                                :value="$quiz->mark"
                                label="{{ __('main.quiz.mark') }}"
                                :required="true"
                                type-input="S"/>
                        </div>
                        <div class="col-md-6 col-sm-6 mb-3">
                            <x-html.input-component
                                name="duration"
                                size="lg"
                                type="number"
                                :value="$quiz->duration"
                                label="{{ __('main.quiz.duration') }}"
                                :required="true"
                                type-input="S"/>
                        </div>
                        <div class="col-md-6 col-sm-6 mb-3">
                            <x-html.input-component
                                name="start"
                                size="lg"
                                type="datetime-local"
                                :value="($quiz->start) ? $quiz->start->toDateTimeLocalString() : ''"
                                label="{{ __('main.quiz.start') }}"
                                :required="false"
                                type-input="S"/>
                        </div>
                        <div class="col-md-6 col-sm-6 mb-3">
                            <x-html.input-component
                                name="finish"
                                size="lg"
                                type="datetime-local"
                                :value="($quiz->finish) ? $quiz->finish->toDateTimeLocalString() : ''"
                                label="{{ __('main.quiz.finish') }}"
                                :required="false"
                                type-input="S"/>
                        </div>
                        <div class="col-12 mb-3">
                            <x-html.input-component
                                name="description"
                                size="lg"
                                :value="$quiz->description"
                                label="{{ __('main.quiz.description') }}"
                                :required="false"
                                type-input="S"/>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="g-3 align-center flex-wrap justify-center">
                                    <div class="g">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="show_answer" id="showAnswer" value="true" @if(old('show_answer',$quiz->show_answer)) checked @endif>
                                            <label class="custom-control-label" for="showAnswer">{{ __('main.quiz.show_answer') }}</label>
                                        </div>
                                    </div>
                                    @if(auth()->user()->hasAnyRole(\App\Support\Enums\RoleEnum::MODERATOR,\App\Support\Enums\RoleEnum::ADMIN))
                                        <div class="g">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" name="type" id="isPublic" value="true" wire:model.debounce="is_public">
                                                <label class="custom-control-label" for="isPublic">{{ __('main.quiz.is_public') }}</label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
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
                            <ul class="custom-control-group custom-control-vertical w-100">
                                @foreach($languages as $language)
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                            <input type="radio" class="custom-control-input" @if($language->id == old('language_id',$quiz->language_id)) checked @endif name="language_id" id="language{{ $language->id }}" value="{{ $language->id }}">
                                            <label class="custom-control-label" for="language{{ $language->id }}">
                                                <em class="{{ $language->icon }}"></em>
                                                <span class="mx-2">{{ $language->title }}</span>
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-12 mb-3">
                            <x-html.select-component
                                size="lg"
                                :collection="$categories"
                                name="category_id"
                                :value="$quiz->category_id"
                                label="{{ __('main.quiz.category') }}"
                                :required="true"
                                type-input="S"/>
                        </div>
                        <div class="col-12 mb-3">
                            <x-html.select-component
                                size="lg"
                                :collection="$difficulties"
                                :value="$quiz->difficulty_id"
                                name="difficulty_id"
                                label="{{ __('main.quiz.difficulty') }}"
                                :required="true"
                                type-input="S"/>
                        </div>
                        <div class="col-6 d-flex justify-end my-3">
                            <div class="form-group mt-2">
                                <a href="{{ route('dashboard.quiz.show',['quiz' => $quiz->id]) }}" class="btn btn-lg btn-outline-info">
                                    <i class="icon ni ni-list me-3"></i>{{ __('main.question.index') }}
                                </a>
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-end my-3">
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <i class="icon ni ni-edit me-3"></i>
                                    {{ __('action.edit') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@php
    /**
    * @var \App\Models\Category $category
    * @var \App\Models\Language $language
    */
@endphp

@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ __('main.category.index') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="row g-gs flex-row-reverse">
                        <div class="col-xxl-7">
                            <div class="card card-bordered card-stretch">
                                <div class="card-inner-group">
                                    <div class="card-inner position-relative card-tools-toggle">
                                        <div class="card-title-group">
{{--                                            <div class="card-tools">--}}
{{--                                                <div class="form-inline flex-nowrap gx-3">--}}
{{--                                                    <div class="form-wrap w-150px">--}}
{{--                                                        <select class="form-select js-select2" data-search="off" data-placeholder="Bulk Action">--}}
{{--                                                            <option value="">Bulk Action</option>--}}
{{--                                                            <option value="edit">Edit</option>--}}
{{--                                                            <option value="delete">Move To Trash</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="btn-wrap">--}}
{{--                                                        <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled">Apply</button></span>--}}
{{--                                                        <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>--}}
{{--                                                    </div>--}}
{{--                                                </div><!-- .form-inline -->--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <div class="card-inner p-0">
                                        <div class="nk-tb-list nk-tb-ulist">
                                            <div class="nk-tb-item nk-tb-head">
                                                <div class="nk-tb-col nk-tb-col-check">
                                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                                        <input type="checkbox" class="custom-control-input" id="uid">
                                                        <label class="custom-control-label" for="uid"></label>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="sub-text">{{ __('main.category.title') }}</span>
                                                </div>
                                                <div class="nk-tb-col tb-col-xxl">
                                                    <span class="sub-text">{{ __('main.category.translation') }}</span>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <span class="sub-text">{{ __('main.category.status') }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="sub-text">{{ __('main.category.quiz') }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="sub-text">{{ __('main.category.organization') }}</span>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-tools text-end"></div>
                                            </div>
                                            @foreach($categories as $category)
                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col nk-tb-col-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                                            <input type="checkbox" class="custom-control-input" id="category_{{$category->id}}">
                                                            <label class="custom-control-label" for="category_{{$category->id}}"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col">
                                                        <span>{{ $category->title }}</span>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-xxl">
                                                        <div class="text-ellipsis w-max-200px">
                                                            @foreach($languages as $language)
                                                                <i class="{{ $language->icon }}"></i>
                                                                @if($category->hasTranslation('title',$language->slug))
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                @else
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                @endif
                                                                <br/>
                                                           @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-sm">
                                                        <span>
                                                            @if($category->is_public)
                                                                <span class="badge badge-dim rounded-pill bg-primary badge-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('status.public') }}">
                                                                    <i class="fas fa-star"></i>
                                                                </span>
                                                            @else
                                                                <span class="badge badge-dim rounded-pill bg-danger badge-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('status.private') }}">
                                                                    <i class="fas fa-lock"></i>
                                                                </span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <div class="nk-tb-col">
                                                        <div>
                                                            <span>{{ $category->quizzes()->count() }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col">
                                                        <div>
                                                            <span>{{ optional($category->organization)->name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-1">
                                                            <li class="nk-tb-action-hidden" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('action.edit') }}">
                                                                <a href="" class="btn btn-trigger btn-icon" data-bs-toggle="modal" data-bs-target="#editCategory{{ $category->id }}" data-bs-placement="top" title="{{ __('action.edit') }}">
                                                                    <em class="icon ni ni-edit-fill"></em>
                                                                </a>
                                                            </li>
                                                            <li class="nk-tb-action-hidden" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('action.delete') }}">
                                                                <a href="#" onclick="event.preventDefault();document.getElementById('deleteCategory{{$category->id}}').submit();" class="btn btn-trigger btn-icon">
                                                                    <em class="icon ni ni-trash-fill"></em>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="drodown">
                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li>
                                                                                <a href="" data-bs-toggle="modal" data-bs-target="#editCategory{{ $category->id }}">
                                                                                    <em class="icon ni ni-edit-fill"></em>
                                                                                    <span>{{ __('action.edit') }}</span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#" data-bs-toggle="tooltip" title="{{ __('action.edit') }}" onclick="event.preventDefault();document.getElementById('deleteCategory{{$category->id}}').submit();">
                                                                                    <em class="icon ni ni-trash-fill"></em>
                                                                                    <span>{{ __('action.delete') }}</span>
                                                                                </a>
                                                                            </li>
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
                                                {!! $categories->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-5">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <h3 class="card-title">
                                        {{ __('main.category.add') }}
                                    </h3>
                                    <form action="{{ route('dashboard.category.store') }}" method="POST">
                                        @csrf
                                        <x-html.input-component name="title" label="{{ __('main.category.title') }}" type-input="G" :required="true"/>
                                        <x-html.select-component :collection="$languages" name="language" label="{{ __('main.category.language') }}" :required="true" type-input="G"/>
                                        @livewire('file-upload-component',['type' => 'category','name' => 'background','image' => old('background')])
                                        <div class="row g-3 align-center">
                                            <div class="col-12 d-flex justify-end">
                                                <div class="form-group mt-2">
                                                    <button type="submit" class="btn btn-lg btn-primary">{{ __('action.add') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Edit Modals--}}
    @foreach($categories as $category)
        <div class="modal fade" tabindex="-1" role="dialog" id="editCategory{{ $category->id }}">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-md">
                        <h5 class="modal-title">{{ __('main.category.edit') }}</h5>
                        <form action="{{ route('dashboard.category.update',['category' => $category->id]) }}" method="POST" class="mt-4">
                            @csrf
                            @method('PUT')
                            <div class="row g-gs">

                                <div class="col-md-6 col-12">
                                    @foreach($languages as $language)
                                        <div class="mb-2">
                                            <x-html.input-component
                                                name="title[{{ $language->slug }}]"
                                                value="{{ $category->getTranslation('title',$language->slug) }}"
                                                label="{{ __('main.category.title') }} ({{ $language->title }})"
                                                id="editTitle{{ $category->id }}"
                                                :required="true"
                                            />
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6 col-12">
                                    @livewire('file-upload-component',['type' => 'category','name' => 'background','image' => old('background',$category->background)])
                                </div><!-- .col -->
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">{{ __('action.edit') }}</button>
                                        </li>
                                        <li>
                                            <a href="#" class="link link-light" data-bs-dismiss="modal">{{ __('action.cancel') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('dashboard.category.destroy',['category' => $category]) }}" method="POST" class="d-none" id="deleteCategory{{ $category->id }}">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
@endsection

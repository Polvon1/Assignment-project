@php
    /**
 * @var \Illuminate\Pagination\LengthAwarePaginator $organizations
 * @var \App\Models\User $organization
 */
@endphp
@extends('dashboard.layouts.app')

@section('title',__('main.organization.index'))

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ __('main.organization.index') }}</h3>
                            <div class="nk-block-des text-soft">
                                <p>{{ __('main.organization.total', ['value' => $organizations->total()]) }}</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            @can('trash.organization')
                                <a href="{{ route('dashboard.organization.trash') }}" class="btn btn-icon btn-outline-dark d-md-none">
                                    <em class="icon ni ni-trash"></em>
                                </a>
                                <a href="{{ route('dashboard.organization.trash') }}" class="btn btn-outline-dark d-none d-md-inline-flex">
                                    <em class="icon ni ni-trash"></em>
                                    <span>{{ __('action.trashed') }}</span>
                                </a>
                            @endcan
                            @can('create.organization')
                                <a href="{{ route('dashboard.organization.create') }}"
                                   class="btn btn-icon btn-primary d-md-none">
                                    <em class="icon ni ni-plus"></em>
                                </a>
                                <a href="{{ route('dashboard.organization.create') }}"
                                   class="btn btn-primary d-none d-md-inline-flex">
                                    <em class="icon ni ni-plus"></em>
                                    <span>{{ __('main.organization.add') }}</span>
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
                                        {{--                                        <div class="form-inline flex-nowrap gx-3">--}}
                                        {{--                                            <div class="form-wrap w-150px">--}}
                                        {{--                                                <select class="form-select js-select2" data-search="off"--}}
                                        {{--                                                        data-placeholder="Bulk Action">--}}
                                        {{--                                                    <option value="">Bulk Action</option>--}}
                                        {{--                                                    <option value="pass">Send Password Reset</option>--}}
                                        {{--                                                    <option value="delete">Delete</option>--}}
                                        {{--                                                </select>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="btn-wrap">--}}
                                        {{--                                                <span class="d-none d-md-block"><button--}}
                                        {{--                                                        class="btn btn-dim btn-outline-light disabled">Apply</button></span>--}}
                                        {{--                                                <span class="d-md-none"><button--}}
                                        {{--                                                        class="btn btn-dim btn-outline-light btn-icon disabled"><em--}}
                                        {{--                                                            class="icon ni ni-arrow-right"></em></button></span>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
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
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-trigger btn-icon dropdown-toggle"
                                                       data-bs-toggle="dropdown">
                                                        <em class="icon ni ni-setting"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                        <ul class="link-check">
                                                            <li><span>{{ __('action.show') }}</span></li>
                                                            <li class="active"><a href="#">10</a></li>
                                                            <li><a href="#">20</a></li>
                                                            <li><a href="#">50</a></li>
                                                        </ul>
                                                        <ul class="link-check">
                                                            <li><span>Order</span></li>
                                                            <li class="active"><a href="#">DESC</a></li>
                                                            <li><a href="#">ASC</a></li>
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
                                            <a href="#" class="search-back btn btn-icon toggle-search"
                                               data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                            <input type="text" class="form-control border-transparent form-focus-none"
                                                   placeholder="{{ __('action.search') }}">
                                            <button class="search-submit btn btn-icon"><em
                                                    class="icon ni ni-search"></em></button>
                                        </div>
                                    </div>
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
                                        <div class="nk-tb-col"><span
                                                class="sub-text">{{ __('main.user.name') }}</span></div>
                                        <div class="nk-tb-col tb-col-xxl"><span
                                                class="sub-text">{{ __('main.user.username') }}</span></div>
                                        <div class="nk-tb-col tb-col-mb"><span
                                                class="sub-text">{{ __('main.user.phone') }}</span></div>
                                        <div class="nk-tb-col tb-col-lg"><span
                                                class="sub-text">{{ __('main.organization.user') }}</span></div>
                                        <div class="nk-tb-col nk-tb-col-tools text-end"></div>
                                    </div>
                                    @forelse($organizations as $organization)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" name="user_checkbox"
                                                           class="custom-control-input"
                                                           id="user_id_{{ $organization->id }}">
                                                    <label class="custom-control-label"
                                                           for="user_id_{{ $organization->id }}"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col">
                                                <a href="{{ route('dashboard.organization.show',['organization' => $organization->id]) }}">
                                                    <div class="user-card">
                                                        <div class="user-avatar  sm bg-primary-dim">
                                                            @if(is_null($organization->image))
                                                                <em class="icon ni ni-user-fill"></em>
                                                            @else
                                                                <img src="{{ asset($organization->image) }}"
                                                                     alt="">
                                                            @endif
                                                        </div>
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{ $organization->name }}</span>
                                                            <small>{{ $organization->email }}</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="nk-tb-col tb-col-xxl">
                                                <span>{{ $organization->username }}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-mb">
                                                <span>{{ $organization->phone }}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-lg">
                                                <span>0</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    @can('view.organization')
                                                        <li class="nk-tb-action-hidden">
                                                            <a href="{{ route('dashboard.organization.show',['organization' => $organization->id]) }}"
                                                               class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                                               data-bs-placement="top"
                                                               title="{{ __('action.show') }}">
                                                                <em class="icon ni ni-eye-fill"></em>
                                                            </a>
                                                        </li>
                                                    @endcan
                                                    @can('edit.organization')
                                                        <li class="nk-tb-action-hidden">
                                                            <a href="{{ route('dashboard.organization.edit',['organization' => $organization->id]) }}"
                                                               class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                                               data-bs-placement="top" title="{{ __('action.edit') }}">
                                                                <em class="icon ni ni-edit-fill"></em>
                                                            </a>
                                                        </li>
                                                    @endcan
                                                    @can('delete.organization')
                                                        <li class="nk-tb-action-hidden">
                                                            <a href=""
                                                               onclick="event.preventDefault();document.getElementById('userDelete{{$organization->id}}').submit();"
                                                               class="btn btn-trigger btn-icon"
                                                               data-bs-toggle="tooltip" data-bs-placement="top"
                                                               title="{{ __('action.delete') }}">
                                                                <em class="icon ni ni-trash-fill"></em>
                                                            </a>
                                                        </li>
                                                    @endcan
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                               data-bs-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    @can('view.organization')
                                                                        <li>
                                                                            <a href="{{ route('dashboard.organization.show',['organization' => $organization->id]) }}">
                                                                                <em class="icon ni ni-eye-fill"></em>
                                                                                <span>{{ __('action.show') }}</span>
                                                                            </a>
                                                                        </li>
                                                                    @endcan
                                                                    @can('edit.organization')
                                                                        <li>
                                                                            <a href="{{ route('dashboard.organization.edit',['organization' => $organization->id]) }}">
                                                                                <em class="icon ni ni-edit-fill"></em>
                                                                                <span>{{ __('action.edit') }}</span>
                                                                            </a>
                                                                        </li>
                                                                    @endcan
                                                                    @can('delete.organization')
                                                                        <li>
                                                                            <a onclick="event.preventDefault();document.getElementById('userDelete{{ $organization->id }}').submit();">
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
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <div class="card-inner">
                                <div class="nk-block-between-md g-3">
                                    <div class="g">
                                        {!! $organizations->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($organizations as $organization)
        <form action="{{ route('dashboard.organization.destroy',['organization' => $organization->id]) }}" method="POST"
              class="d-none" id="userDelete{{ $organization->id }}">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
@endsection

@php
    /**
* @var \App\Models\User $user
 */
@endphp
@extends('dashboard.layouts.app')

@section('title',__('main.system-user.edit'))

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ __('main.system-user.edit') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <form action="{{ route('dashboard.system.user.update',['user' => $user->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-8 col-sm-7 col-12">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner">
                                        <hr>
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <x-html.input-component
                                                    name="username"
                                                    size="lg"
                                                    label="{{ __('main.user.username') }}"
                                                    :required="true"
                                                    :value="$user->username"
                                                    type-input="V"/>
                                            </div>
                                            <div class="col-md-6 col-sm-6 mb-3">
                                                <x-html.input-component
                                                    name="email"
                                                    size="lg"
                                                    type="email"
                                                    label="{{ __('main.user.email') }}"
                                                    :required="true"
                                                    :value="$user->email"
                                                    type-input="V"/>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <livewire:password-generator-input-component
                                                    password="{{ old('password') }}"
                                                    :required="false"/>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-12 mb-3">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <div class="input-group input-group-lg">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text" for="phone">+998</label>
                                                            </div>
                                                            <input
                                                                type="text"
                                                                class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                                                id="phone"
                                                                name="phone"
                                                                value="{{ str($user->phone)->substr(3,9) }}"
                                                                placeholder="{{ __('main.user.phone') }}"
                                                                required
                                                            />
                                                        </div>
                                                    </div>
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-12 mb-3">
                                                @livewire('region-select-component',['region_id' => old('region_id',$user->region_id),'district_id' => old('district_id',$user->district_id),'required' => false])
                                            </div>
                                            <div class="col-12 justify-center mt-5">
                                                <ul class="custom-control-group">
                                                    @forelse($roles as $role)
                                                        <li>
                                                            <div class="custom-control custom-checkbox custom-control-pro no-control">
                                                                <input type="radio"
                                                                       class="custom-control-input"
                                                                       name="role_id"
                                                                       id="role_{{ $role->id }}"
                                                                       required
                                                                       value="{{ $role->id }}"
                                                                       @checked(optional($user->roles()->first())->id == $role->id)
                                                                >
                                                                <label class="custom-control-label" for="role_{{ $role->id }}">
                                                                    <em class="fas fa-user"></em>
                                                                    <span class="ps-2">@lang('role.'.$role->name)</span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-5 col-12">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner">
                                        <hr>
                                        <div class="row d-flex">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="g-5 align-center flex-wrap justify-start">
                                                        <div class="g d-block">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       name="verify_email" id="verify_email"
                                                                       @if(old('verify_email',$user->hasVerifiedEmail())) checked @endif>
                                                                <label class="custom-control-label"
                                                                       for="verify_email">{{ __('main.user.verify_email') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="g-5 align-center flex-wrap justify-start">
                                                        <div class="g d-block">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       name="verify_phone" id="verify_phone"
                                                                       @if(old('verify_phone',$user->hasVerifiedPhone())) checked @endif>
                                                                <label class="custom-control-label"
                                                                       for="verify_phone">{{ __('main.user.verify_phone') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="g-5 align-center flex-wrap justify-start">
                                                        <div class="g d-block">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       name="notification" id="notification"
                                                                       @if(old('notification',$user->notification)) checked @endif>
                                                                <label class="custom-control-label"
                                                                       for="notification">{{ __('main.user.notification') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                @livewire('file-upload-component',['type' => 'user','name' => 'image','image' => old('image',$user->image)])
                                            </div>
                                            <div class="col-12 d-flex justify-end my-3">
                                                <div class="form-group mt-2">
                                                    <button type="submit" class="btn btn-wider btn-primary px-5">
                                                        <em class="icon ni ni-edit me-3"></em>
                                                        <span>{{ __('action.edit') }}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

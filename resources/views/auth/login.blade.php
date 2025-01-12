@extends('auth.layouts.app')

@section('content')
    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
        <div class="brand-logo pb-4 text-center">
            <a href="{{ route('main.index') }}" class="logo-link">
                <img class="logo-light logo-img logo-img-lg" src="{{ asset('images/logo.png') }}" srcset="{{ asset('images/logo2x.png') }} 2x" alt="logo">
                <img class="logo-dark logo-img logo-img-lg" src="{{ asset('images/logo-dark.png') }}" srcset="{{ asset('images/logo-dark2x.png') }} 2x" alt="logo-dark">
            </a>
        </div>
        <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">{{ __('auth.login.title') }}</h4>
                        <div class="nk-block-des">
                            <p>{{ __('auth.login.description') }}</p>
                        </div>
                    </div>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="username">{{ __('auth.input.username.label') }}</label>
                        </div>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" id="username" name="username" placeholder="{{ __('auth.input.username.placeholder') }}">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password">{{ __('auth.input.password.label') }}</label>
                            @if(Route::has('password.request'))
                                <a class="link link-primary link-sm" href="{{ route('password.request') }}">{{ __('auth.forgot_password') }}</a>
                            @endif

                        </div>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" class="form-control form-control-lg @error('username') is-invalid @enderror" id="password" name="password" placeholder="{{ __('auth.input.password.placeholder') }}">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block">{{ __('auth.login.submit') }}</button>
                    </div>
                </form>
                <div class="form-note-s2 text-center pt-4">
                    {{ __('auth.new_user') }} <a href="{{ route('register') }}">{{ __('auth.create_user') }}</a>
                </div>
{{--                <div class="text-center pt-4 pb-3">--}}
{{--                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>--}}
{{--                </div>--}}
{{--                <ul class="nav justify-center gx-4">--}}
{{--                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>--}}
{{--                </ul>--}}
            </div>
        </div>
    </div>
    @include('auth.layouts.inc.footer')
@endsection

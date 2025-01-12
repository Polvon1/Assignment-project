@extends('landing.layouts.app')

@section('content')
    <!-- HERO -->
    <section class="bg-half-170 pb-0 bg-primary d-table w-100" style="background: url('{{ asset('landing/images/bg2.png') }}') center center;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="title-heading">
                        <h4 class="text-white-50">{!! config('app.name')!!}</h4>
                        <h4 class="heading text-white mb-3 title-dark">{!! __('landing.hero.title') !!}</h4>
                        <p class="para-desc text-white-50">{!! __('landing.hero.sub_title') !!}</p>
                        <div class="mt-4 pt-2">
                            <a href="#contact" class="btn btn-light">{{ __('landing.hero.get_started') }}</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-5 col-md-6 mt-5 mt-sm-0">
                    <img src="{{ asset('landing/images/hero1.png') }}" class="img-fluid" alt="">
                </div>
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <!-- HERO -->

    {{--HOW TO WORK--}}
    <section id="how_to_work" class="section">
        <div class="container-xxl">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h6 class="text-primary text-uppercase">{{ __('landing.how_to_work_box.top_title') }}</h6>
                        <h3 class="title mb-4 text-uppercase">{{ __('landing.how_to_work_box.title') }}</h3>
                        <p class="text-muted para-desc mx-auto mb-0">{{ __('landing.how_to_work_box.sub_title') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse(__('landing.how_to_work') as $one_how_to_work)
                    <div class="col-md pt-2">
                        <div class="card features feature-clean work-process bg-transparent process-arrow border-0 text-center">
                            <div class="icons text-primary text-center mx-auto">
                                <div class="" style="height: 65px;width: 65px;line-height: 65px;">
                                    <img src="{{ $one_how_to_work['img'] }}" class="w-100" alt="">

                                </div>
                                {{--                                <i class="{{ $one_how_to_work['icon'] }}"></i>--}}
                            </div>
                            <div class="card-body">
                                <h5 class="text-dark">{!! $one_how_to_work['title'] !!}</h5>
                                <p class="text-muted mb-0">{!! $one_how_to_work['description'] !!}</p>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div><!--end row-->
        </div>
    </section>
    {{--HOW TO WORK--}}

    {{--FEATURE--}}
    <section id="feature" class="section bg-light">
        <div class="container">
            <div class="row position-relative" id="counter" style="z-index: 1;">
                <div class="col-12">
                    <h3 class="title mb-4 text-center text-uppercase">{{ __('landing.feature_box.title') }}</h3>
                </div>
                @forelse(__('landing.feature') as $one_feature)
                    <div class="col-md-3 col-6 mt-4 pt-2">
                        <div class="counter-box text-center">
                            <img src="{{ $one_feature['icon'] }}" class="avatar avatar-small" alt="">
                            <h4 class="mb-0 mt-4">{{ $one_feature['title'] }}</h4>
                            <h6 class="counter-head text-muted">{{ $one_feature['description'] }}</h6>
                        </div><!--end counter box-->
                    </div>
                @empty
                @endforelse
            </div><!--end row-->
            {{--        <div class="feature-posts-placeholder bg-light"></div>--}}
        </div><!--end container-->
    </section>
    {{--FEATURE--}}

    {{--ABOUT--}}
    <section  class="section">
        <div id="test" class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h3 class="title mb-4 text-uppercase">{{ __('dashboard.quiz.index') }}</h3>
                        {{--                    <p class="text-muted para-desc mb-0 mx-auto">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>--}}
                    </div>
                </div>
            </div>
            @livewire('category-grid-component')
        </div>

        <!-- About Start -->
        <div id="about" class="container mt-100 mt-60">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
                            <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                                <div class="card-body p-0">
                                    <img src="{{ asset('landing/images/course/online/ab01_new.jpeg') }}" class="img-fluid" alt="work-image">
                                    <div class="overlay-work bg-dark"></div>
                                    <div class="content">
                                        <a href="javascript:void(0)" class="title text-white d-block fw-bold">{{ __('landing.about.box')[1] }}</a>
                                        {{--                                        <small class="text-light">IT & Software</small>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                                    <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                                        <div class="card-body p-0">
                                            <img src="{{ asset('landing/images/course/online/ab02_new.jpg') }}" class="img-fluid" alt="work-image">
                                            <div class="overlay-work bg-dark"></div>
                                            <div class="content">
                                                <a href="javascript:void(0)" class="title text-white d-block fw-bold">{{ __('landing.about.box')[0] }}</a>
                                                {{--                                                <small class="text-light">Engineering</small>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12 col-md-12 mt-4 pt-2">
                                    <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                                        <div class="card-body p-0">
                                            <img src="{{ asset('landing/images/course/online/ab03_new.jpg') }}" class="img-fluid" alt="work-image">
                                            <div class="overlay-work bg-dark"></div>
                                            <div class="content">
                                                <a href="javascript:void(0)" class="title text-white d-block fw-bold">{{ __('landing.about.box')[2] }}</a>
                                                {{--                                                <small class="text-light">C.A.</small>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div><!--end row-->
                </div><!--end col-->

                <div class="col-lg-6 col-md-6 mt-4 mt-lg-0 pt- pt-lg-0">
                    <div class="ms-lg-4">
                        <div class="section-title mb-4 pb-2">
                            <h1 class="title mb-4 text-uppercase">{{ __('landing.about.title') }}</h1>
                            {!! __('landing.about.content') !!}
                        </div>
                        <h5>{{ __('landing.about.for') }}</h5>
                        <ul class="list-unstyled text-muted">
                            @forelse(__('landing.about.for_elements') as $one_for_element)
                                <li class="mb-0">
                                <span class="text-primary h4 me-2">
                                    <i class="uil uil-check-circle align-middle"></i>
                                </span>
                                    {{ $one_for_element }}
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--ABOUT--}}

    {{--CONTACT--}}
    <section id="contact" class="section pt-5 mt-4">
        <div class="container mt-100 mt-60">
            <div class="row align-items-center">
                <div class="col-12">
                    <h1 class="title mb-4 text-center text-uppercase">{{ __('landing.application.title') }}</h1>
                </div>
                <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0 order-2 order-md-1">
                    <div class="card custom-form rounded border-0 shadow p-4">
                        <form action="{{ route('main.application') }}" method="POST" class="was-validated">
                            @csrf
                            <p id="error-msg" class="mb-0"></p>
                            <div id="simple-msg"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="first_name">{{ __('landing.application.first_name') }} <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input required name="first_name" id="first_name" type="text" class="form-control ps-5" placeholder="{{ __('landing.application.first_name') }} :">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="last_name">{{ __('landing.application.last_name') }} <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input required name="last_name" id="last_name" type="text" class="form-control ps-5" placeholder="{{ __('landing.application.last_name') }} :">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="organization">{{ __('landing.application.organization') }}</label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="star" class="fea icon-sm icons"></i>
                                            <input name="organization" id="organization" type="text" class="form-control ps-5" placeholder="{{ __('landing.application.organization') }} :">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="region_id">{{ __('landing.application.region') }}</label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="star" class="fea icon-sm icons"></i>
                                            <select name="region_id" id="region_id" class="form-control ps-5" required>
                                                <option value="">{{ __('landing.application.region') }}</option>
                                                @foreach(\App\Models\Region::all() as $region)
                                                    <option value="{{ $region->id }}">{{ $region->title }}</option>
                                                @endforeach
                                            </select>
                                            {{--                                            <input name="region_id" id="region" type="text" class="form-control ps-5" placeholder="{{ __('landing.application.region') }} :">--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="users">{{ __('landing.application.users') }}</label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="users" class="fea icon-sm icons"></i>
                                            <input name="users" id="users" type="number" class="form-control ps-5" placeholder="{{ __('landing.application.users') }} :">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="test_date">{{ __('landing.application.exam_date') }} <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="file-text" class="fea icon-sm icons"></i>
                                            <input required name="test_date" id="test_date" type="date" class="form-control ps-5" placeholder="{{ __('landing.application.exam_date') }} :">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="email">{{ __('landing.application.email') }} <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input required name="email" id="email" type="email" class="form-control ps-5" placeholder="{{ __('landing.application.email') }} :">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">{{ __('landing.application.phone') }} <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="phone" class="fea icon-sm icons"></i>
                                            <input required name="phone" id="phone" type="text" pattern="^\+998[0-9]{9}" value="+998" class="form-control ps-5" placeholder="{{ __('landing.application.phone') }} :">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <dib class="form-group">
                                        <label><input type="checkbox" required> {{ __('landing.application.privacy') }}</label>
                                    </dib>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" id="submit" name="send" class="btn btn-primary">{{ __('landing.application.send') }}</button>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form>
                    </div><!--end custom-form-->
                </div><!--end col-->

                <div class="col-lg-7 col-md-6 order-1 order-md-2">
                    <div class="text-center">
                        <img src="{{ asset('landing/icons/application-img.png') }}" class="w-75" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--CONTACT--}}
@endsection

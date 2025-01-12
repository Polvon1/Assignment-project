<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="Abzalkhujaa">
    <meta name="description" content="Get Test Platform">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Gettest.uz') }}</title>
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <meta property="og:image" content="{{ asset('images/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('vendor/design/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/design/fonts/InterFont/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/design/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/design/css/media.css') }}">

    <livewire:styles/>
    @yield('page-style')
</head>
<body>
<div id="app">
    <header class="header fixed">
        <nav class="navbar navbar-expand-md  py-0">
            <div class="container-lg header__container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('vendor/design/images/logo.svg') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" id="mobile_menu_btn"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <div class="sandwich">
                        <div class="sandwich__line sandwich__line--top"></div>
                        <div class="sandwich__line sandwich__line--middle"></div>
                        <div class="sandwich__line sandwich__line--bottom"></div>
                    </div>
                </button>

                <ul class="navbar-nav navbar__menu ms-lg-auto ms-auto me-auto">
                    <li class="nav-item active">
                        <a class="nav-link navbar__link" href="#">Как это работает</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar__link" href="#">Возможности</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar__link" href="#">Тесты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar__link" href="#">О проекте</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar__link" href="#">Подать заявку</a>
                    </li>

                </ul>

                <ul class="navbar-nav navbar__menu__small mr-auto align-items-center">
                    <li class="nav-item dropdown me-3">

                        <a class="btn navbar__link" href="#" role="button" id="dropdownMenuLink"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Русский
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class=" btn btn-sm button button--orange" href="#">Войти</a>
                    </li>

                </ul>

            </div>


            <div class="navbar__mobile__menu" id="navbar__mobile__menu">
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link navbar__link" href="#">Как это работает</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar__link" href="#">Возможности</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar__link" href="#">Тесты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar__link" href="#">О проекте</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar__link" href="#">Подать заявку</a>
                    </li>
                    <li class="nav-item">
                        <a class=" btn btn-sm button button--orange" href="#">Войти</a>
                    </li>
                </ul>
                <div class="navbar__mobile__menu__footer">© Digital Gov 2022. Все права защищены.</div>
            </div>
        </nav>
    </header>

    <div class="intro">
        <div class="container-lg intro__container h-100 ">
            <div class="row h-100 align-items-center no-gutters">
                <div class="col-lg-7">
                    <div class="d-flex justify-content-center">
                        <h1 class="intro__title">
                            <div class="intro__title_row">
                                <div class="intro__title_text">СИСТЕМА</div>
                                <div class="intro__title_online">
                                    <div class="intro__title_online-text">ОНЛАЙН</div>
                                </div>
                            </div>
                            <div class="intro__title_text">ТЕСТИРОВАНИЯ</div>
                        </h1>
                    </div>

                    <ul class="intro__list">
                        <li class="intro__list_item">
                            Кадры решают все. <br> Каков уровень знаний ваших сотрудников?
                        </li>
                        <li class="intro__list_item">
                            Создавайте тесты, запускайте тестирование и получайте объективную оценку знаний персонала
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center justify-content-sm-start">

                        <button class="btn button button--orange">
                            ХОЧУ УЗНАТЬ БОЛЬШЕ
                        </button>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="intro__form">
                        <h4 class="intro__form_title">
                            Оставьте
                            <div class="intro__form_apply">
                                <span class="intro__form_apply__text">заявку</span>

                            </div>
                            <br> и проводите тестирования
                        </h4>
                        <div class="form-group">

                            <div class="row">
                                <div class="col-lg-12 col-sm-6 col-md-6">
                                    <input type="text" class="form-control form__input mb-4"
                                           placeholder="Как вам обращаться">
                                </div>
                                <div class="col-lg-12 col-sm-6 col-md-6">
                                    <input type="text" class="form-control form__input mb-4"
                                           placeholder="Имя организации">
                                </div>
                                <div class="col-lg-12 col-sm-6 col-md-6">
                                    <input type="text" class="form-control form__input mb-4"
                                           placeholder="Количество тестируемых">
                                </div>
                                <div class="col-lg-12 col-sm-6 col-md-6">
                                    <input type="text" class="form-control form__input mb-4"
                                           placeholder="Дата тестирование">
                                </div>
                                <div class="col-lg-12 col-sm-6 col-md-6">
                                    <input type="text" class="form-control form__input mb-4"
                                           placeholder="Электронная почта">
                                </div>
                                <div class="col-lg-12 col-sm-6 col-md-6">
                                    <input type="text" class="form-control form__input mb-4" placeholder="+998">

                                </div>
                            </div>

                        </div>
                        <button class="btn button button--orange intro__form_button ">
                            ОТПРАВИТЬ ЗАЯВКУ
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="working">
        <div class="container">
            <h2 class="section__title">
                КАК ЭТО РАБОТАЕТ?
            </h2>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="working__card">
                        <div class="working__card_icon" style="background-color: #49CCF9;">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_28_279)">
                                    <path d="M40 16H32V16C30.8954 16 30 15.1046 30 14V6" stroke="white"
                                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path
                                        d="M12 16V10V10C12 7.79086 13.7909 6 16 6H30.344V6C31.4048 6.00023 32.422 6.4218 33.172 7.172L38.828 12.828V12.828C39.5782 13.578 39.9998 14.5952 40 15.656V38C40 40.2091 38.2091 42 36 42H16V42C13.7909 42 12 40.2091 12 38V36"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M15.762 22.6281V26.5361L18.834 28.4081" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path
                                        d="M22.6863 16H9.31368C7.48358 16 6 17.4836 6 19.3137V32.6863C6 34.5164 7.48358 36 9.31368 36H22.6863C24.5164 36 26 34.5164 26 32.6863V19.3137C26 17.4836 24.5164 16 22.6863 16Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_28_279">
                                        <rect width="48" height="48" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div class="working__card_title">
                            Подайте завяление и войдите в систему
                        </div>
                        <div class="working__card_desc">
                            Мы любим животных и стараемся поддерживать тех из них, кому не посчастливилось иметь
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="working__card">
                        <div class="working__card_icon" style="background-color: #00B884;">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_28_286)">
                                    <path
                                        d="M36 42H12V42C9.79086 42 8 40.2091 8 38V10V10C8 7.79086 9.79086 6 12 6H36V6C38.2091 6 40 7.79086 40 10V38V38C40 40.2091 38.2091 42 36 42V42Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M16 16H32" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M16 32H20" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M33.222 31.056L29.332 34.946L27 32.612" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16 24H32" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_28_286">
                                        <rect width="48" height="48" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>

                        </div>
                        <div class="working__card_title">
                            Добавьте свои тесты
                        </div>
                        <div class="working__card_desc">
                            Мы любим животных и стараемся поддерживать тех из них, кому не посчастливилось иметь
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="working__card">
                        <div class="working__card_icon" style="background-color: #7B68EE;">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_28_286)">
                                    <path
                                        d="M36 42H12V42C9.79086 42 8 40.2091 8 38V10V10C8 7.79086 9.79086 6 12 6H36V6C38.2091 6 40 7.79086 40 10V38V38C40 40.2091 38.2091 42 36 42V42Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M16 16H32" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M16 32H20" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M33.222 31.056L29.332 34.946L27 32.612" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16 24H32" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_28_286">
                                        <rect width="48" height="48" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>

                        </div>
                        <div class="working__card_title">
                            Проводите тестирование
                        </div>
                        <div class="working__card_desc">
                            Мы любим животных и стараемся поддерживать тех из них, кому не посчастливилось иметь
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="working__card">
                        <div class="working__card_icon" style="background-color: #F8A037;">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_28_286)">
                                    <path
                                        d="M36 42H12V42C9.79086 42 8 40.2091 8 38V10V10C8 7.79086 9.79086 6 12 6H36V6C38.2091 6 40 7.79086 40 10V38V38C40 40.2091 38.2091 42 36 42V42Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M16 16H32" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M16 32H20" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M33.222 31.056L29.332 34.946L27 32.612" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16 24H32" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_28_286">
                                        <rect width="48" height="48" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>

                        </div>
                        <div class="working__card_title">
                            Узнайте результаты
                        </div>
                        <div class="working__card_desc">
                            Мы любим животных и стараемся поддерживать тех из них, кому не посчастливилось иметь
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature">
        <div class="container">
            <h2 class="section__title">
                КАКИЕ <span>ВОЗМОЖНОСТИ</span> <br> ВЫ ПОЛУЧИТЕ
            </h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-5 ">
                    <div class="feature__card">
                        <div class="feature__card_icon" style="background-color: #F8A037;">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_33_327)">
                                    <path
                                        d="M22 6H12C10.4087 6 8.88258 6.63214 7.75736 7.75736C6.63214 8.88258 6 10.4087 6 12V30C6 31.5913 6.63214 33.1174 7.75736 34.2426C8.88258 35.3679 10.4087 36 12 36H16.014V40.8858C16.014 41.0953 16.0732 41.3005 16.1847 41.4779C16.2962 41.6552 16.4556 41.7975 16.6444 41.8882C16.8332 41.979 17.0438 42.0146 17.252 41.9909C17.4602 41.9672 17.6574 41.8852 17.821 41.7543L25.014 36H36C37.5913 36 39.1174 35.3679 40.2426 34.2426C41.3679 33.1174 42 31.5913 42 30V26"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M34.2064 5.11517C34.3716 4.78047 34.6271 4.49866 34.944 4.30161C35.261 4.10455 35.6268 4.00012 36 4.00012C36.3732 4.00012 36.739 4.10455 37.0559 4.30161C37.3729 4.49866 37.6284 4.78047 37.7935 5.11517L38.8111 7.17801C38.9546 7.46885 39.1666 7.72043 39.429 7.91108C39.6913 8.10172 39.9961 8.22571 40.317 8.27235L42.5933 8.60319C42.9625 8.65689 43.3093 8.8128 43.5946 9.05329C43.8798 9.29378 44.0921 9.60927 44.2074 9.9641C44.3228 10.3189 44.3366 10.6989 44.2472 11.0612C44.1579 11.4234 43.969 11.7535 43.702 12.014L42.0542 13.6212C41.8221 13.8476 41.6486 14.1269 41.5485 14.4352C41.4483 14.7435 41.4247 15.0715 41.4795 15.391L41.8683 17.6576C41.9313 18.0254 41.8902 18.4034 41.7496 18.7491C41.6091 19.0947 41.3746 19.3941 41.0727 19.6134C40.7709 19.8328 40.4137 19.9633 40.0415 19.9903C39.6694 20.0172 39.2971 19.9396 38.9668 19.766L36.9304 18.6957C36.6434 18.5449 36.3241 18.4661 36 18.4661C35.6758 18.4661 35.3565 18.5449 35.0696 18.6957L33.0332 19.766C32.7028 19.9396 32.3306 20.0173 31.9584 19.9903C31.5862 19.9634 31.229 19.8328 30.9272 19.6135C30.6253 19.3941 30.3908 19.0947 30.2502 18.7491C30.1097 18.4034 30.0686 18.0254 30.1316 17.6576L30.5204 15.391C30.5752 15.0715 30.5515 14.7435 30.4514 14.4352C30.3513 14.1269 30.1778 13.8476 29.9457 13.6212L28.298 12.014C28.0309 11.7535 27.842 11.4234 27.7527 11.0612C27.6634 10.6989 27.6772 10.3189 27.7926 9.9641C27.9079 9.60928 28.1202 9.2938 28.4054 9.05332C28.6907 8.81283 29.0375 8.65693 29.4067 8.60323L31.683 8.27239C32.0039 8.22575 32.3087 8.10176 32.571 7.91112C32.8334 7.72047 33.0454 7.46889 33.1889 7.17805L34.2064 5.11517Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M22 18H14" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M14 26H30" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_33_327">
                                        <rect width="48" height="48" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>

                        </div>
                        <div class="feature__card_title">
                            Шкалы баллов и процентов
                        </div>
                        <div class="feature__card_desc">
                            Создавайте собственные шкалы оценивания с баллам или процентами
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 ">
                    <div class="feature__card">
                        <div class="feature__card_icon" style="background-color: #7B68EE;">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_33_333)">
                                    <path
                                        d="M35.314 14.686C41.562 20.934 41.562 31.066 35.314 37.314C29.066 43.562 18.934 43.562 12.686 37.314C6.438 31.066 6.438 20.934 12.686 14.686C18.934 8.438 29.066 8.438 35.314 14.686Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M25 25.996C25 25.444 24.552 24.998 24 25C23.448 25.002 23 25.45 23 26.002C23 26.554 23.446 27 23.998 27C24.55 27 24.998 26.552 25 25.998"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M24 18V26" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M20 4H28" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M42 12L38 8L40 10L35.314 14.686" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_33_333">
                                        <rect width="48" height="48" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>

                        </div>
                        <div class="feature__card_title">
                            Время тестирования
                        </div>
                        <div class="feature__card_desc">
                            Ограничивайте время на прохождение тестирования
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 ">
                    <div class="feature__card">
                        <div class="feature__card_icon" style="background-color: #00B884;">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_35_341)">
                                    <path
                                        d="M38.042 24.09V10.09C38.042 7.88003 36.252 6.09003 34.042 6.09003H10.042C7.832 6.09003 6.042 7.88003 6.042 10.09V34.09C6.042 36.3 7.832 38.09 10.042 38.09H24.042"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M41.304 38.524L38.476 41.352C37.694 42.134 36.428 42.134 35.648 41.352L20.586 26.29C20.21 25.916 20 25.406 20 24.876V20.048H24.828C25.358 20.048 25.868 20.258 26.242 20.634L41.304 35.696C42.086 36.476 42.086 37.742 41.304 38.524V38.524Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M37.72 32.12L32.06 37.76" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_35_341">
                                        <rect width="48" height="48" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>


                        </div>
                        <div class="feature__card_title">
                            Редактор тестов с медиа
                        </div>
                        <div class="feature__card_desc">
                            Загружайте картинки, фотографии, видео или аудио прямо в текст задания
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 ">
                    <div class="feature__card">
                        <div class="feature__card_icon" style="background-color: #49CCF9;">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_36_347)">
                                    <path
                                        d="M38 18H10C7.79086 18 6 19.7909 6 22V38C6 40.2091 7.79086 42 10 42H38C40.2091 42 42 40.2091 42 38V22C42 19.7909 40.2091 18 38 18Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M11 12H37" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M14 6H34" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M24 26V34" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M20 30L24 34L28 30" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_36_347">
                                        <rect width="48" height="48" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>


                        </div>
                        <div class="feature__card_title">
                            Экспорт результатов
                        </div>
                        <div class="feature__card_desc">
                            Экспортируйте результаты тестирования в Excel
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tests">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="section__title mb-0">
                    ТЕСТЫ
                </h2>
                <a href="" class="tests__link">Все тесты</a>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 col-md-6">
                    <div class="tests__card">
                        <div class="tests__card_image">
                            <img src="{{ asset('vendor/design/images/test-1.jpg') }}" alt="" class="w-100">
                        </div>
                        <div class="tests__card_content">
                            <div class="tests__card_title">
                                Программирование
                            </div>
                            <div class="tests__card_desc">
                                Значимость этих проблем настолько очевидна, что укрепление и развитие структуры влечет
                                за собой процесс внедрения и модернизации...
                            </div>
                            <a href="#" class="tests__card_link">
                                Перейти к тесту
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="tests__card">
                        <div class="tests__card_image">
                            <img src="{{ asset('vendor/design/images/test-1.jpg') }}" alt="" class="w-100">
                        </div>
                        <div class="tests__card_content">
                            <div class="tests__card_title">
                                Программирование
                            </div>
                            <div class="tests__card_desc">
                                Значимость этих проблем настолько очевидна, что укрепление и развитие структуры влечет
                                за собой процесс внедрения и модернизации...
                            </div>
                            <a href="#" class="tests__card_link">
                                Перейти к тесту
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="tests__card">
                        <div class="tests__card_image">
                            <img src="{{ asset('vendor/design/images/test-1.jpg') }}" alt="" class="w-100">
                        </div>
                        <div class="tests__card_content">
                            <div class="tests__card_title">
                                Программирование
                            </div>
                            <div class="tests__card_desc">
                                Значимость этих проблем настолько очевидна, что укрепление и развитие структуры влечет
                                за собой процесс внедрения и модернизации...
                            </div>
                            <a href="#" class="tests__card_link">
                                Перейти к тесту
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="tests__card">
                        <div class="tests__card_image">
                            <img src="{{ asset('vendor/design/images/test-1.jpg') }}" alt="" class="w-100">
                        </div>
                        <div class="tests__card_content">
                            <div class="tests__card_title">
                                Программирование
                            </div>
                            <div class="tests__card_desc">
                                Значимость этих проблем настолько очевидна, что укрепление и развитие структуры влечет
                                за собой процесс внедрения и модернизации...
                            </div>
                            <a href="#" class="tests__card_link">
                                Перейти к тесту
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="tests__card">
                        <div class="tests__card_image">
                            <img src="{{ asset('vendor/design/images/test-1.jpg') }}" alt="" class="w-100">
                        </div>
                        <div class="tests__card_content">
                            <div class="tests__card_title">
                                Программирование
                            </div>
                            <div class="tests__card_desc">
                                Значимость этих проблем настолько очевидна, что укрепление и развитие структуры влечет
                                за собой процесс внедрения и модернизации...
                            </div>
                            <a href="" class="tests__card_link">
                                Перейти к тесту
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="tests__card">
                        <div class="tests__card_image">
                            <img src="{{ asset('vendor/design/images/test-1.jpg') }}" alt="" class="w-100">
                        </div>
                        <div class="tests__card_content">
                            <div class="tests__card_title">
                                Программирование
                            </div>
                            <div class="tests__card_desc">
                                Значимость этих проблем настолько очевидна, что укрепление и развитие структуры влечет
                                за собой процесс внедрения и модернизации...
                            </div>
                            <a href="" class="tests__card_link">
                                Перейти к тесту
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="about__image">
                        <img src="{{ asset('vendor/design/images/about_image.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="about__content">
                        <h2 class="section__title">
                            О ПРОЕКТЕ
                        </h2>
                        <div class="about__text">
                            Система онлайн тестирования – это профессиональный инструмент автоматизации процесса
                            тестирования и обработки результатов, который предназначен для решения широкого спектра
                            задач. Система дает возможность с минимальными затратами времени и финансовых
                            ресурсов объективно оценить знания и навыки большого количества сотрудников.
                        </div>
                        <button class="btn button button--orange">ЧИТАТЬ ПОДРОБНО</button>
                    </div>
                    <div class="position-relative">
                        <div class="about__content__list">
                            <div class="row">

                                <div class="col-lg-4 col-md-12">
                                    <div class="working__card">
                                        <div class="working__card_icon" style="background-color: #49CCF9;">
                                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_28_279)">
                                                    <path d="M40 16H32V16C30.8954 16 30 15.1046 30 14V6" stroke="white"
                                                          stroke-width="2" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path
                                                        d="M12 16V10V10C12 7.79086 13.7909 6 16 6H30.344V6C31.4048 6.00023 32.422 6.4218 33.172 7.172L38.828 12.828V12.828C39.5782 13.578 39.9998 14.5952 40 15.656V38C40 40.2091 38.2091 42 36 42H16V42C13.7909 42 12 40.2091 12 38V36"
                                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"/>
                                                    <path d="M15.762 22.6281V26.5361L18.834 28.4081" stroke="white"
                                                          stroke-width="2"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path
                                                        d="M22.6863 16H9.31368C7.48358 16 6 17.4836 6 19.3137V32.6863C6 34.5164 7.48358 36 9.31368 36H22.6863C24.5164 36 26 34.5164 26 32.6863V19.3137C26 17.4836 24.5164 16 22.6863 16Z"
                                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_28_279">
                                                        <rect width="48" height="48" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                        <div class="working__card_title">
                                            Минимальная зартрата времени
                                        </div>
                                        <div class="working__card_desc">
                                            Мы любим животных и стараемся поддерживать тех из них, кому не
                                            посчастливилось иметь
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="working__card">
                                        <div class="working__card_icon" style="background-color: #00B884;">
                                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_28_286)">
                                                    <path
                                                        d="M36 42H12V42C9.79086 42 8 40.2091 8 38V10V10C8 7.79086 9.79086 6 12 6H36V6C38.2091 6 40 7.79086 40 10V38V38C40 40.2091 38.2091 42 36 42V42Z"
                                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"/>
                                                    <path d="M16 16H32" stroke="white" stroke-width="2"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M16 32H20" stroke="white" stroke-width="2"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M33.222 31.056L29.332 34.946L27 32.612" stroke="white"
                                                          stroke-width="2"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M16 24H32" stroke="white" stroke-width="2"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_28_286">
                                                        <rect width="48" height="48" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </div>
                                        <div class="working__card_title">
                                            Добавьте свои тесты
                                        </div>
                                        <div class="working__card_desc">
                                            Мы любим животных и стараемся поддерживать тех из них, кому не
                                            посчастливилось иметь
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="working__card">
                                        <div class="working__card_icon" style="background-color: #7B68EE;">
                                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_28_286)">
                                                    <path
                                                        d="M36 42H12V42C9.79086 42 8 40.2091 8 38V10V10C8 7.79086 9.79086 6 12 6H36V6C38.2091 6 40 7.79086 40 10V38V38C40 40.2091 38.2091 42 36 42V42Z"
                                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"/>
                                                    <path d="M16 16H32" stroke="white" stroke-width="2"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M16 32H20" stroke="white" stroke-width="2"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M33.222 31.056L29.332 34.946L27 32.612" stroke="white"
                                                          stroke-width="2"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M16 24H32" stroke="white" stroke-width="2"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_28_286">
                                                        <rect width="48" height="48" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </div>
                                        <div class="working__card_title">
                                            Проводите тестирование
                                        </div>
                                        <div class="working__card_desc">
                                            Мы любим животных и стараемся поддерживать тех из них, кому не
                                            посчастливилось иметь
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="purpose">
        <div class="container purpose__container">
            <h2 class="section__title">
                Для кого <br> <span>предназначена</span> система?
            </h2>

            <div class="row">
                <div class="col-lg-4">
                    <div class="purpose__card">
                        <div class="purpose__card_number">
                            01
                        </div>
                        <div class="purpose__card_title">
                            Органы государственного и хозяйственного управления
                        </div>
                        <div class="purpose__card_desc">
                            Значимость этих проблем настолько очевидна, что укрепление и развитие структуры влечет за
                            собой процесс внедрения и модернизации форм развития.
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="purpose__card">
                        <div class="purpose__card_number">
                            02
                        </div>
                        <div class="purpose__card_title">
                            Органы государственного и хозяйственного управления
                        </div>
                        <div class="purpose__card_desc">
                            Значимость этих проблем настолько очевидна, что укрепление и развитие структуры влечет за
                            собой процесс внедрения и модернизации форм развития.
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="purpose__card">
                        <div class="purpose__card_number">
                            03
                        </div>
                        <div class="purpose__card_title">
                            Органы государственного и хозяйственного управления
                        </div>
                        <div class="purpose__card_desc">
                            Значимость этих проблем настолько очевидна, что укрепление и развитие структуры влечет за
                            собой процесс внедрения и модернизации форм развития.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="apply">
        <div class="container">
            <div class="apply__content">
                <div class="left">
                    <div class="apply__title">
                        Оставьте заявку чтобы провести тестирование
                    </div>
                    <button class="btn button button--orange">
                        ПОДАТЬ ЗАЯВЛЕНИЕ
                    </button>
                </div>
                <div class="right">
                    <img src="{{ asset('vendor/design/images/apply__image.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="faq">
        <div class="container faq_container">
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="section__title pe-0 pe-md-5">
                        <span>Ответы</span> на часто задаваемые вопросы
                    </h2>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="accordion " id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Как убедиться что вы работаете официально?
                                </button>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Вы можете проверить информацию о нашем учебном центре на официальном сайте
                                    </div>
                                </div>
                            </h2>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Я боюсь переводить деньги на обучения
                                </button>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Вы можете проверить информацию о нашем учебном центре на официальном сайте
                                    </div>
                                </div>
                            </h2>

                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                    Что такое онлайн тестирования?
                                </button>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                     aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Вы можете проверить информацию о нашем учебном центре на официальном сайте
                                    </div>
                                </div>
                            </h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <footer class="footer">
        <div class="footer__top">
            <div class="container footer__top_container">
                <div class="logo">
                    <a href="" class="logo_icon">
                        <img src="{{ asset('vendor/design/images/logo.svg') }}" alt="">
                    </a>
                    <div class="address">
                        Ташкент, 100011, улица Алишера Навои, 11
                    </div>
                </div>

                <div class="footer__nav">
                    <ul class="nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link navbar__link" href="#">Как это работает</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar__link" href="#">Возможности</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar__link" href="#">Тесты</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar__link" href="#">проекте</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar__link" href="#">Подать заявку</a>
                        </li>

                    </ul>
                </div>
                <div class="footer__contact">
                    <a href="tel:+998 90 000 00 00" class="nav-link ">+998 90 000 00 00</a>
                    <ul class="social">
                        <li class="social__item">
                            <a href="" class="social__link">
                                <svg width="13" height="20" viewBox="0 0 13 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1 8V12H4V19H8V12H11L12 8H8V6C8 5.73478 8.10536 5.48043 8.29289 5.29289C8.48043 5.10536 8.73478 5 9 5H12V1H9C7.67392 1 6.40215 1.52678 5.46447 2.46447C4.52678 3.40215 4 4.67392 4 6V8H1Z"
                                        stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                            </a>
                        </li>
                        <li class="social__item">
                            <a href="" class="social__link">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13 7L9 11L15 17L19 1L1 8L5 10L7 16L10 12" stroke="white"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                            </a>
                        </li>
                        <li class="social__item">
                            <a href="" class="social__link">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_224_868)">
                                        <path
                                            d="M17 5H7C4.79086 5 3 6.79086 3 9V15C3 17.2091 4.79086 19 7 19H17C19.2091 19 21 17.2091 21 15V9C21 6.79086 19.2091 5 17 5Z"
                                            stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10 9L15 12L10 15V9Z" stroke="white" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_224_868">
                                            <rect width="24" height="24" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>

                            </a>
                        </li>
                        <li class="social__item">
                            <a href="" class="social__link">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_224_872)">
                                        <path
                                            d="M16 4H8C5.79086 4 4 5.79086 4 8V16C4 18.2091 5.79086 20 8 20H16C18.2091 20 20 18.2091 20 16V8C20 5.79086 18.2091 4 16 4Z"
                                            stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path
                                            d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                                            stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.5 7.5V7.501" stroke="white" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_224_872">
                                            <rect width="24" height="24" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container footer__bottom_container">
                <div class="copyright">
                    ©2020-2022 Все права защищены. Online Test ®
                </div>
                <a href="mailto:info@smartgov.pro" class="email"> info@smartgov.pro</a>
            </div>

        </div>
    </footer>
</div>


<script src="{{ asset('vendor/design/libs/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('vendor/design/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/design/js/common.js') }}"></script>
<livewire:scripts/>
@yield('page-script')
</body>
</html>




